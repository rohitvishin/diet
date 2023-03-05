<?php

namespace App\Http\Controllers;

use App\Models\ActivityMaster;
use App\Models\Appointment;
use App\Models\Dev;
use App\Models\MedicalMaster;
use App\Models\LabMaster;
use App\Models\PackageMaster;
use App\Models\FoodMaster;
use App\Models\DietTemplateMaster;
use App\Models\Medical_history;
use App\Models\MedicalHistory;
use App\Models\ProductMaster;
use App\Models\User;
use App\Models\Remarks;
use App\Models\Documents;
use App\Models\Anthropometric_data;
use App\Models\Exercise_data;
use App\Models\diet_chart_data;
use App\Models\diet_followed_data;
use App\Models\lab_data;
use App\Models\medicine_data;
use App\Models\PackagePayment;
use App\Models\PaymentEmi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\db;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Support\Facades\Storage;

class DevController extends Controller
{
    public function hello(){
        return "hey from dev controller";
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);
        if (!Auth::guard('dev')->attempt($credentials)) {
            return response()->json([
                'message' => 'Invalid Username or password',
                'type' => 'error',
            ], 401);
        }

        return response()->json([
            'message' => 'Welcome',
            'type' => 'success',
        ]);
    }

    public function register(Request $request){
        
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:devs',
            'username' => 'required|string|unique:devs',
            'password' => 'required|string|',
            'c_password' => 'required|same:password',
            'mobile' => 'required|string',
        ]);

        $user = new Dev([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'mobile' => $request->mobile,
            'username' => $request->username,
            'register_ip' => $request->ip(), // need to make it dynamic
            'wallet' => 0,
            'status' => 1,
        ]);

        if ($user->save()) {
            return response()->json(['type' => 'success', 'message' => 'user registered']);
        } else {
            return response()->json(['type' => 'error', 'message' => 'invalid data']);
        }
    }

    public function save_user(Request $request)
    {
        if($request->input('client_id')>0){
            $data=$request->validate([
                'name' => 'required|string',
                'referrer' => 'required|string',
                'email' => 'required|string|email',
                'mobile' => 'required|string',
                'address' => 'required|string',
                'gender' => 'required|string',
                'city' => 'required|string',
                'state' => 'required|string',
                'pincode' => 'required|string',
                'dob' => 'required|string',
                'age' => 'required|string',
                'maritalstatus' => 'required|string',
                'purpose' => 'required|string',
            ]);
            $update=User::where('id',$request->input('client_id'))->update($data);
            if($update) {
                return response()->json(['type' => 'success', 'message' => 'Client Updated']);
            } else {
                return response()->json(['type' => 'error', 'message' => 'Oops! Process Failed']);
            }            
        }else{
            $data=$request->validate([
                'name' => 'required|string',
                'referrer' => 'required|string',
                'email' => 'required|string|email|unique:users',
                'mobile' => 'required|string|unique:users',
                'address' => 'required|string',
                'gender' => 'required|string',
                'city' => 'required|string',
                'state' => 'required|string',
                'pincode' => 'required|string',
                'dob' => 'required|string',
                'age' => 'required|string',
                'maritalstatus' => 'required|string',
                'purpose' => 'required|string',
            ]);
            $user = new User($data);
            if ($user->save()) {
                return response()->json(['type' => 'success', 'message' => 'Client Added']);
            } else {
                return response()->json(['type' => 'error', 'message' => 'Oops! Process Failed']);
            }
        }
        
    }

    public function get_user($mobile){
        $data=User::where('mobile',$mobile)->first();
        echo $data;        
    }

    public function dashboard(){

        if(!Auth::guard('dev')->user()){
            $data['url'] = 'login';
            return view('dev.Auth.login', $data);
        }
        else{
        $data['clientData'] = User::take(10)->orderBy('id', 'desc')->get();
        $data['appointMentData'] = Appointment::orderBy('appointment_date', 'desc')->take(10)->get();
        $data['todayAppointment'] = Appointment::where('appointment_date', date('Y-m-d'))->orderBy('appointment_date', 'desc')->take(10)->get();
        $data['payemntData'] = array();
        $data['pendingPayment'] = array();
        $data['url'] = 'dashboard';
        
        return view('dev.home', $data);
        }
    }

    public function ClientList(){
        $data['clientData'] = User::orderBy('id','desc')->get();
        $data['url'] = 'client_list';
        return view('dev.clients.clients', $data);
    }

    public function Consultation(Request $request){
        $lastType_id = MedicalMaster::select('type_id')->latest()->first()['type_id'];
        $data = [];
        for ($i = 0; $i < $lastType_id; $i++) {
            $data['data'][$i] = MedicalMaster::where('type_id', $i + 1)->get();
        }
        return view('dev.consultant.consultation',$data);
    }

    public function startAppointment($mobile = '', $page = 'basic_details', $subpage = 'anthropometric'){
        $data = []; 
        $data['user_data'] = [];
        $data['user_id'] = 0;
        $data['mobile'] = $mobile;
        
        if($mobile != ''){

            $res = User::where('mobile', $mobile)->first();
            if($res != ''){
                $data['user_id'] = $res['id'];
                $res = $this->getDataAccordingToPageName($data['user_id'], $page, $subpage);
                $data['user_data'] = $res['user_data'];
                $data['data'] = $res['data'] ?? '';
            }
        }
        
        $data['url'] = $page;
        $data['suburl'] = $subpage;

        return view('dev.consultant.pages.'.$page, $data);
        
    }


    public function getDataAccordingToPageName($userid, $page, $subpage){

        $data['user_data'] = [];
        
        if($page == 'basic_details')
            $data['user_data'] = User::where('id', $userid)->first();
            
        else if($page == 'medical_info'){
            $lastType_id = MedicalMaster::select('type_id')->latest()->first()['type_id'];
            for ($i = 0; $i < $lastType_id; $i++) {
                $data['data'][$i] = MedicalMaster::where('type_id', $i + 1)->get();
            }
            $data['user_data'] = User::where('id', $userid)->first();
        }
        else if($page == 'package_payment')
            $data['user_data'] = User::where('id', $userid)->first();
        else if($page == 'diet_chart'){
            $data['user_data'] = diet_chart_data::where('client_id', $userid)->orderBy('diet_chart_date','desc')->get();
            $data['data'] = DietTemplateMaster::orderBy('created_at', 'desc')->get();
        }
        else if($page == 'remark')
            $data['user_data'] = Remarks::where('client_id', $userid)->orderBy('remark_date','desc')->get();
        else if($page == 'follow_up'){
            if($subpage == 'anthropometric')
                $data['user_data'] = Anthropometric_data::where('client_id', $userid)->get()->toArray();
            else if($subpage == 'exercise')
                $data['user_data'] = Exercise_data::where('client_id', $userid)->get()->toArray();
            else if($subpage == 'diet_followed')
                $data['user_data'] = diet_followed_data::where('client_id', $userid)->get()->toArray();
            else if($subpage == 'lab_data'){
                $user_data = lab_data::where('client_id', $userid)->get()->toArray();
                if($user_data)
                    $data['user_data'] = $this->UpdateUserLabData($userid, $user_data);
            }
            else if($subpage == 'medication')
                $data['user_data'] = medicine_data::where('client_id', $userid)->get()->toArray();
                
        }
        else if($page == 'documents')
            $data['user_data'] = Documents::where('client_id', $userid)->orderBy('document_date','desc')->get();

        return $data;
    }

    public function UpdateUserLabData($userid, $user_data){
        $labData = LabMaster::all()->toArray();
        $userDetails = User::select('age','gender')->where('id', $userid)->get()->toArray()[0];
        
        foreach($user_data as $key => $singleLab){
            $labMasterKey = array_search($singleLab['test_name_id'], array_column($labData, 'id'));
            $singleLabMaster = $labData[$labMasterKey];
            $cond = $singleLabMaster['subject'];
            $value = $singleLabMaster['subject_value'];
            $action = $singleLabMaster['subject_value_action'];

            if($cond != 0)
                $userValue = $userDetails[$cond];
            
            $matchCondition = 1;
            if($cond == 'gender')
                $matchCondition =  $userValue == $value;
            else if($action == 0 && $cond != 0  && $cond == 'age')
                $matchCondition =  $userValue < $value;
            else if($action == 1 && $cond != 0  && $cond == 'age')
                $matchCondition = $userValue > $value;
            else if($action == 2 && $cond != 0  && $cond == 'age'){
                $valueArr = explode('-',$value);
                $matchCondition = ($userValue > $value[0] && $userValue < $value[1]);
            }

            
            if($matchCondition){
                $result = ($singleLab['test_result'] > $singleLabMaster['result_low_range'] && $singleLab['test_result'] < $singleLabMaster['result_high_range']);

            if($result)
                $user_data[$key]['test_color'] = 'success';
            else
                $user_data[$key]['test_color'] = 'danger';
                
            }else
                $user_data[$key]['test_color'] = 'danger';
        }
        return $user_data;
    }
    
    public function MedicalMasterList(){
        $data['lastType_id'] = MedicalMaster::select('type_id')->latest()->first()['type_id'];
        $data['data'] = MedicalMaster::orderBy('id', 'desc')->get();
        $data['forSelect'] = MedicalMaster::select('type_id','type')->groupBy('type_id','type')->get();
        $data['url'] = 'medical_master';
        return view('dev.masters.medicalmaster', $data);
    }

    public function ActivityMasterList(){
        $data['data'] = ActivityMaster::orderBy('id', 'desc')->get();
        $data['url'] = 'activity_master';
        return view('dev.masters.activitymaster', $data);
    }

    public function LabMasterList(){
        $data['data'] = LabMaster::orderBy('created_at', 'desc')->get();
        $data['url'] = 'lab_master';
        return view('dev.masters.labmaster', $data);
    }

    public function getProfile(){
        $data['user'] = Dev::where('id',Auth::guard('dev')->user()->id)->first();
        $data['url'] = 'profile';
        return view('dev.profile.profile', $data);
    }

    public function Appointments(){
        $data['appointments'] = Appointment::orderBy('appointment_date', 'desc')->get()->toArray();
        $data['json'] = [];
        foreach($data['appointments'] as $singleAppointment){
            $newData['title'] = 'Appointment With '.$singleAppointment['client_name'] ;
            $newData['start'] = date('Y-m-d\TH:i:s', strtotime($singleAppointment['appointment_date'].' '.$singleAppointment['start_time']));
            $newData['end'] = date('Y-m-d\TH:i:s', strtotime($singleAppointment['appointment_date'].' '.$singleAppointment['end_time']));
            $newData['url'] = url('startAppointment/'.$singleAppointment['client_mobile'].'/basic_details/main');
            array_push($data['json'], $newData); 
        }
        
        $data['url'] = 'appointments';
        return view('dev.appointment',$data);
    }
    
    public function getClientName(Request $request){
        $data = User::where('name','like', '%'.$request->param.'%')->get()->toArray();
        if(count($data) > 0){
            $html = '';
            foreach($data as $singleName){
                $html .= "<p class='autocomplete-div' data-id=".$singleName['id']." data-mobile='".$singleName['mobile']."' onclick='setClientName(this)'>".$singleName['name'].'</p>';
            }
        }
        return response()->json([
            'html' => $html,
        ], 200);
    }

    public function getLabTestName(Request $request){
        $data = LabMaster::where('test_name','like','%'.$request->param.'%')->get()->toArray();
        $html = '';
        if(count($data) > 0){
            $html = '';
            foreach($data as $singleName){
                $bracketText = $singleName['subject'] != 0 ? '('.($singleName['subject'] != 0 ? $singleName['subject']: '').'- '.($singleName['subject_value'] != 0 ? ($singleName['subject_value_action'] == 0 ? 'less Than' : ($singleName['subject_value_action'] == 1 ? 'Greater Than' : ($singleName['subject_value_action'] == 2 ? 'Between' : '') )) : '').'- '.($singleName['subject_value'] != 0 ? $singleName['subject_value']: '').')' : '';
                $html .= "<p class='autocomplete-div' data-id=".$singleName['id']." onclick='setLabName(this)'>".$singleName['test_name'].$bracketText.'</p>';
            }
        }
        return response()->json([
            'html' => $html,
        ], 200);
            
    }

    public function updateProfile(Request $request){
        $profile = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'mobile' => 'required',
        ]);
        if(Dev::where('id',Auth::guard('dev')->user()->id)->update($profile)){
            return response()->json([
                'message' => 'Profile Updated Successfully',
                'type' => 'success',
            ]);
        }
        else{
            return response()->json([
                'message' => 'Opps! Update Failed',
                'type' => 'error',
            ], 401);
        }
    }
    
    public function addAppointment(Request $request){
        
        $client_id = '';
        $client_mobile = '';

        $appointment = $request->validate([
            'appointment_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);

        if($request->client_id != 0){
            $request->validate([
                'client_name' => 'required|string',
                'client_id' => 'required|numeric',
                'client_mobile' => 'required|numeric',
            ]);
            $user = User::where('id',$request->client_id)->get();

            if($user->isEmpty())
            return response()->json([
                'message' => 'Invalid Access, User Not Found',
                'type' => 'success',
            ]);

            $client_id = $request->client_id;
            $client_mobile = $request->client_mobile;
            $client_name = $request->client_name;
        }
        else{
            $request->validate([
                'new_client_name' => 'required|string',
                'new_client_mobile' => 'required|numeric',
            ]);

            $data['name'] = $request->new_client_name;
            $data['mobile'] = $request->new_client_mobile;
            $user = new User($data);
            $user->save();
            
            $client_id = $user->id;
            $client_mobile = $request->new_client_mobile;
            $client_name = $request->new_client_name;
        }
        
        $appointment['client_id']= $client_id;
        $appointment['client_mobile']= $client_mobile;
        $appointment['client_name']= $client_name;
        $appointment['status'] = 1;
        
        $addAppoint = Appointment::create($appointment);
        
        if($addAppoint->save()){
            return response()->json([
                'message' => 'Appointment Added',
                'type' => 'success',
            ]);
        }
        else{
            return response()->json([
                'message' => 'Opps! Process Failed',
                'type' => 'error',
            ], 401);
        }
    }

    public function addMedicalMaster(Request $request){
        $medicine = $request->validate([
            'type_id' => 'required',
            'type' => 'required|string',
            'name' => 'required|string',
        ]);
        $medicine['status']=1;
        $addMedicine=MedicalMaster::create($medicine);
        if($addMedicine->save()){
            return response()->json([
                'message' => 'Medicine Added',
                'type' => 'success',
            ]);
        }
        else{
            return response()->json([
                'message' => 'Opps! Process Failed',
                'type' => 'error',
            ], 401);
        }
    }
    
    public function updateMedicalMaster(Request $request){
        $type_id = $request->validate([
            'type_id' => 'required',
        ]);
        $status=MedicalMaster::where('id',$type_id)->first();
        if($status['status']==0)
        $update=MedicalMaster::where('id',$type_id)->update(['status'=>1]);
        else
        $update=MedicalMaster::where('id',$type_id)->update(['status'=>0]);
        if($update){
            return response()->json([
                'message' => 'Type updated',
                'type' => 'success',
                'status'=>$status['status']
            ]);
        }
        else{
            return response()->json([
                'message' => 'Opps! Process Failed',
                'type' => 'error',
            ], 401);
        }
    }

    public function addActivityMaster(Request $request){
        $activity = $request->validate([
            'name' => 'required|string',
        ]);
        $activity['status']=1;
        $addMActivity=ActivityMaster::create($activity);
        if($addMActivity->save()){
            return response()->json([
                'message' => 'Activity Added',
                'type' => 'success',
            ]);
        }
        else{
            return response()->json([
                'message' => 'Opps! Process Failed',
                'type' => 'error',
            ], 401);
        }
    }

    public function updateActivityMaster(Request $request){
            $type_id = $request->validate([
                'type_id' => 'required',
            ]);
            $status=ActivityMaster::where('id',$type_id)->first();
            if($status['status']==0)
            $update=ActivityMaster::where('id',$type_id)->update(['status'=>1]);
            else
            $update=ActivityMaster::where('id',$type_id)->update(['status'=>0]);
            if($update){
                return response()->json([
                    'message' => 'Activity updated',
                    'type' => 'success',
                    'status'=>$status['status']
                ]);
            }
            else{
                return response()->json([
                    'message' => 'Opps! Process Failed',
                    'type' => 'error',
                ], 401);
        }
    }

    public function addLabMaster(Request $request){

        // dd($request->all());
        $data = $request->validate([
            'test_type' => 'required',
            'test_name' => 'required',
            'subject' => 'required',
            'subject_value_action' => 'required',
            'result_low_range' => 'required',
            'result_high_range' => 'required',
            'unit' => 'required',
        ]);

        $data['subject_value'] = -1;
        
        if($request->subject != 0){
            $subject_value = $request->validate([
                'subject_value' => 'required'
            ]);
            $data['subject_value'] = $subject_value['subject_value'];
        }

        $addLabMaster=LabMaster::create($data);
        if($addLabMaster->save()){
            return response()->json([
                'message' => 'Lab Master Added',
                'type' => 'success',
            ]);
        }
        else{
            return response()->json([
                'message' => 'Opps! Process Failed',
                'type' => 'error',
            ], 401);
        }
    }

    public function updateLabMaster(Request $request){
        $id = $request->validate([
            'id' => 'required',
        ]);
        $status=LabMaster::where('id',$id)->first();
        if($status['status']==0)
        $update=LabMaster::where('id',$id)->update(['status'=>1]);
        else
        $update=LabMaster::where('id',$id)->update(['status'=>0]);
        if($update){
            return response()->json([
                'message' => 'Type updated',
                'type' => 'success',
                'status'=>$status['status']
            ]);
        }
        else{
            return response()->json([
                'message' => 'Opps! Process Failed',
                'type' => 'error',
            ], 401);
        }
    }

    public function PackageMasterList(){
        $data['data'] = PackageMaster::orderBy('id', 'desc')->get();
        $data['url'] = 'package_master';
        return view('dev.masters.packagemaster', $data);
    }

    public function packagePost(Request $request){
        $package = $request->validate([
            'plan_name' => 'required',
            'duration' => 'required|string',
            'discount' => 'required|string',
            'amount' => 'required|string',
            'currency' => 'required|string',
            'tax' => 'required|string',
        ]);
        
        $package['status'] = 1;
        
        if($request->processAction == 'add'){
            $package['created_at']= date('d-m-Y H:i:s');
            $addPackage=PackageMaster::create($package);
        }
        else if($request->processAction == 'edit'){
            $package['updated_at'] = date('Y-m-d H:i:s');
            
            $id = $request->validate([
                'id' => 'required',
            ]);

            $addPackage = PackageMaster::where('id', $request->id)->update($package);
        }

        if($request->processAction == 'edit' ?  $addPackage : $addPackage->save()){
            return response()->json([
                'message' => 'Package '.($request->processAction == 'edit' ?  'Updated' : 'Added'),
                'type' => 'success',
            ]);
        }
        else{
            return response()->json([
                'message' => 'Opps! Process Failed',
                'type' => 'error',
            ], 401);
        }
    }

    public function updatePackageStatus(Request $request){
        $type_id = $request->validate([
            'type_id' => 'required',
        ]);
        $status=PackageMaster::where('id',$type_id)->first();
        $newStatus = $status['status'] == 0 ? 1 : 0;
        $update = PackageMaster::where('id',$type_id)->update(['status'=> $newStatus]);
        
        if($update){
            return response()->json([
                'message' => 'Activity updated',
                'type' => 'success',
                'status'=>$newStatus
            ]);
        }
        else{
            return response()->json([
                'message' => 'Opps! Process Failed',
                'type' => 'error',
            ], 401);
        }
    }

    public function FoodMasterList(){
        $data['data'] = FoodMaster::orderBy('id', 'desc')->get();
        $data['url'] = 'food_master';
        return view('dev.masters.foodmaster', $data);
    }

    public function foodMasterPost(Request $request){
        $food = $request->validate([
            'food_name' => 'required',
            'calories' => 'required|string',
            'protein' => 'required|string',
            'carbs' => 'required|string',
            'fats' => 'required|string',
            'fiber' => 'required|string'
        ]);
        
        $food['status'] = 1;
        
        if($request->processAction == 'add'){
            $food['created_at']= date('d-m-Y H:i:s');
            $addFood=FoodMaster::create($food);
        }
        else if($request->processAction == 'edit'){
            $food['updated_at'] = date('Y-m-d H:i:s');
            
            $id = $request->validate([
                'id' => 'required',
            ]);

            $addFood = FoodMaster::where('id', $request->id)->update($food);
        }

        if($request->processAction == 'edit' ?  $addFood : $addFood->save()){
            return response()->json([
                'message' => 'Food '.($request->processAction == 'edit' ?  'Updated' : 'Added'),
                'type' => 'success',
            ]);
        }
        else{
            return response()->json([
                'message' => 'Opps! Process Failed',
                'type' => 'error',
            ], 401);
        }
    }

    public function updateFoodMasterStatus(Request $request){
        $type_id = $request->validate([
            'type_id' => 'required',
        ]);
        
        $status=FoodMaster::where('id',$type_id)->first();

        $newStatus = $status['status'] == 0 ? 1 : 0;
        $update = FoodMaster::where('id',$type_id)->update(['status'=> $newStatus]);
        
        if($update){
            return response()->json([
                'message' => 'Food updated',
                'type' => 'success',
                'status'=> $newStatus
            ]);
        }
        else{
            return response()->json([
                'message' => 'Opps! Process Failed',
                'type' => 'error',
            ], 401);
        }
    }

    public function DietTemplateMasterList(){
        $data['user_data'] = DietTemplateMaster::orderBy('id', 'desc')->get()->toArray();
        $data['url'] = 'diet_template_master';
        return view('dev.masters.diettemplatemaster', $data);
    }

    public function ProductMasterList(){
        $data['data'] = ProductMaster::orderBy('id', 'desc')->get();
        $data['url'] = 'product_master';
        return view('dev.masters.productmaster', $data);
    }
    
    public function productMasterPost(Request $request){
        $product = $request->validate([
            'product_name' => 'required',
            'unit' => 'required|string',
            'amount' => 'required|string',
            'qty' => 'required|numeric',
            'discount' => 'required|string',
            
        ]);

        $request->validate([
            'processAction' => 'required'
        ]);
        
        $product['status'] = 1;
        
        if($request->processAction == 'add'){
            $product['created_at']= date('d-m-Y H:i:s');
            $addProductMaster=ProductMaster::create($product);
        }
        else if($request->processAction == 'edit'){
            $product['updated_at'] = date('Y-m-d H:i:s');
            
            $id = $request->validate([
                'id' => 'required',
            ]);

            $addProductMaster = ProductMaster::where('id', $request->id)->update($product);
        }
        else{
            return response()->json([
                'message' => 'Opps! Process Failed',
                'type' => 'error',
            ], 401);
        }

        if($request->processAction == 'edit' ?  $addProductMaster : $addProductMaster->save()){
            return response()->json([
                'message' => 'Product '.($request->processAction == 'edit' ?  'Updated' : 'Added'),
                'type' => 'success',
            ]);
        }
        else{
            return response()->json([
                'message' => 'Opps! Process Failed',
                'type' => 'error',
            ], 401);
        }
    }

    public function updateProductMasterStatus(Request $request){
        $type_id = $request->validate([
            'type_id' => 'required',
        ]);
        
        $status=ProductMaster::where('id',$type_id)->first();

        $newStatus = $status['status'] == 0 ? 1 : 0;
        $update = ProductMaster::where('id',$type_id)->update(['status'=> $newStatus]);
        
        if($update){
            return response()->json([
                'message' => 'Product updated',
                'type' => 'success',
                'status'=> $newStatus
            ]);
        }
        else{
            return response()->json([
                'message' => 'Opps! Process Failed',
                'type' => 'error',
            ], 401);
        }
    }

    // Consultation Update Functions
    public function UpdateBasicDetails(Request $request)
    {
        $data=$request->validate([
            'name' => 'required|string',
            'referrer' => 'required|string',
            'email' => 'required|string|email',
            'mobile' => 'required|string',
            'profession' => 'required|string',
            'working_hours' => 'required|string',
            'social_media' => 'required|string',
            'mobile' => 'required|string',
            'address' => 'required|string',
            'gender' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'pincode' => 'required|string',
            'dob' => 'required|string',
            'age' => 'required|string',
            'maritalstatus' => 'required|string',
            'purpose' => 'required|string',
        ]);

        

        if($request->input('purpose') == 'other'){
            $request->validate([
                'purpose_other' => 'required|string'
            ]);
        }

        $data['purpose_other'] = $request->input('purpose_other');
            
        if($request->input('client_id') > 0){
            $data['updated_at'] = date('Y-m-d H:i:s');
            $response=User::where('id',$request->input('client_id'))->update($data);
        }else{
            $data['created_at'] = date('Y-m-d H:i:s');
            $response = new User($data);
        }

        
        if($request->input('client_id') == 0 ? $response->save() : $response)
            return response()->json(['type' => 'success', 'message' => 'Basic Details Updated']);
        else
            return response()->json(['type' => 'error', 'message' => 'Oops! Process Failed']);
        
    }

    public function saveFollowupData(Request $request){
        
        // dd($request->all());
        $data = $request->all();
        unset($data['id']);
        unset($data['type']);
        unset($data['process']);

        if($request->type == 'anthro')
            $response = Anthropometric_data::insert($data);

        else if($request->type == 'exercise'){
            unset($data['exercise_date']);
            unset($data['client_id']);
            
            if($request->exercise_date == '')
                return response()->json(['type' => 'error', 'message' => 'All Feilds Are Mandatory']);

            foreach($data['exercise'] as $key => $singleExercise){
                if($singleExercise['exercise_name'] == '' || $singleExercise['exercise_unit'] == '' || $singleExercise['exercise_duration'] == '')
                    return response()->json(['type' => 'error', 'message' => 'All Feilds Are Mandatory']);
                $data['exercise'][$key]['exercise_date'] = $request->exercise_date;
                $data['exercise'][$key]['client_id'] = $request->client_id;
            }
            $response = Exercise_data::insert($data['exercise']);
        }
        else if($request->type == 'diet_followed')
            $response = diet_followed_data::insert($data);
        
        else if($request->type == 'lab'){
            $data = $request->validate([
                'lab_test_date' => 'required',
                'test_name' => 'required',
                'test_result' => 'required',
                'client_id' => 'required',
                'test_name_id' => 'required',
            ]);
            
            $response = lab_data::insert($data);
        }
        else if($request->type == 'medicine')
            $response = medicine_data::insert($data);
        

        if($response)
            return response()->json(['type' => 'success', 'message' => ucwords($request->type).' Added']);
        else
            return response()->json(['type' => 'error', 'message' => 'Oops! Process Failed']);
        
    }

    public function editFollowupData(Request $request){
        $data = $request->all();
        unset($data['type']);
        unset($data['id']);
        unset($data['client_id']);

        $where = ['id' => $request->id, 'client_id' => $request->client_id];
        if($request->type == 'anthro')
            $response = Anthropometric_data::where($where)->update($data);
        else if($request->type == 'exercise'){
            
            $nwedata = [];
            $newdata['exercise_date'] = $data['exercise_date'];
            $newdata['exercise_name'] = $data['exercise'][0]['exercise_name'];
            $newdata['exercise_unit'] = $data['exercise'][0]['exercise_unit'];
            $newdata['exercise_duration'] = $data['exercise'][0]['exercise_duration'];
            
            if($newdata['exercise_date'] == '' || $newdata['exercise_name'] == '' || $newdata['exercise_unit'] == '' || $newdata['exercise_duration'] == '')
                return response()->json(['type' => 'error', 'message' => 'All Feilds Are Mandatory']);

            $response = Exercise_data::where($where)->update($newdata);
        }
        else if($request->type == 'diet_followed'){
            $response = diet_followed_data::where($where)->update($data);
        }
        else if($request->type == 'lab'){
            $data = $request->validate([
                'lab_test_date' => 'required',
                'test_name' => 'required',
                'test_result' => 'required',
                'client_id' => 'required',
                'test_name_id' => 'required',
            ]);
            
            $response = lab_data::where($where)->update($data);
        }
        else if($request->type == 'medicine'){
            $response = medicine_data::where($where)->update($data);
        }

        if($response)
            return response()->json(['type' => 'success', 'message' => ucwords($request->type).' Updated']);
        else
            return response()->json(['type' => 'error', 'message' => 'Oops! Process Failed']);
    }

    public function deleteFollowupData(Request $request){

        $data = $request->validate([
            'id' => 'required',
            'client_id' => 'required'
        ]);

        
        if($request->type == 'anthro')
            $response = Anthropometric_data::where($data)->delete();

        else if($request->type == 'exercise')
            $response = Exercise_data::where($data)->delete();

        else if($request->type == 'diet_followed')
            $response = diet_followed_data::where($data)->delete();

        else if($request->type == 'lab')
            $response = lab_data::where($data)->delete();
        
        else if($request->type == 'medicine')
            $response = medicine_data::where($data)->delete();        

        if($response)
            return response()->json(['type' => 'success', 'message' => ucwords($request->type).' Added']);
        else
            return response()->json(['type' => 'error', 'message' => 'Oops! Process Failed']);
    }


    public function UpdateRemarks(Request $request){
        $data=$request->validate([
            'remark_date' => 'required|string',
            'remark' => 'required|string',
            'client_id' => 'required|string',
        ]);

        if($request->input('process') == 'update'){
            $request->validate([
                'id' => 'required|string'
            ]);
        }
            
        if($request->input('process') == 'update'){
            $data['updated_at'] = date('Y-m-d H:i:s');
            $response = Remarks::where(['id' => $request->input('id'), 'client_id' => $request->input('client_id')])->update($data);
        }else{
            $data['created_at'] = date('Y-m-d H:i:s');
            $response = new Remarks($data);
        }
        
        if($request->input('process') == 'add' ? $response->save() : $response)
            return response()->json(['type' => 'success', 'message' => 'Remarks Updated']);
        else
            return response()->json(['type' => 'error', 'message' => 'Oops! Process Failed']);
    }

    public function updateDietChartTemplate(Request $request){

        if($request->process == 'delete'){
            $request->validate([
                'id' => 'required',
                'client_id' => 'required',
            ]);

            $user = diet_chart_data::where(['id' => $request->id, 'client_id' => $request->client_id]);

            if($user->delete())
                return response()->json(['type' => 'success', 'message' => 'Diet template Deleted']);
            else
                return response()->json(['type' => 'error', 'message' => 'Oops! Process Failed']);

        }
        
        $data=$request->validate([
            'diet_chart_date' => 'required|string',
            'plan_name' => 'required|string',
            'plan_intro' => 'required|string',
            'diet_chart_template' => 'required|string',
            'client_id' => 'required|string',
        ]);

        if($request->input('process') == 'update'){
            $request->validate([
                'id' => 'required|string'
            ]);
        }
            
        if($request->process == 'update'){
            $data['updated_at'] = date('Y-m-d H:i:s');
            $response = diet_chart_data::where(['id' => $request->id, 'client_id' => $request->client_id])->update($data);
        }else{
            $data['created_at'] = date('Y-m-d H:i:s');
            $response = new diet_chart_data($data);
        }
        
        if($request->process == 'add' ? $response->save() : $response)
            return response()->json(['type' => 'success', 'message' => 'Diet Template '.($request->process == 'add' ? 'Added' : 'Updated')]);
        else
            return response()->json(['type' => 'error', 'message' => 'Oops! Process Failed']);
    }

    public function UpdateDocuments(Request $request){

        $data = $request->validate([
            'document_date' => 'required|string',
            'document_name' => 'required|string',
            'client_id' => 'required|string',
        ]);
        
        if($request->file('document')) {
            $request->validate([
                'document' => 'required|mimes:csv,txt,xlx,xls,pdf,png,jpg,JPEG,PNG|max:2048'
            ]);

            $fileName = time().'_'.$data['client_id'].'_'.$request->file('document')->getClientOriginalName();
            Storage::putFileAs('photos', $request->file('document'), $fileName, 'public');
            Storage::url($fileName);
            // $path = $request->file('document')->store('avatars');
            $data['document_url'] = $fileName;
        }

        $data['created_at'] = date('Y-m-d H:i:s');
        $response = new Documents($data);
        if($response->save())
            return response()->json(['type' => 'success', 'message' => 'Documents Updated']);
        else
            return response()->json(['type' => 'error', 'message' => 'Oops! Process Failed']);
    }

    public function DownloadFile($filename = '', $documentName = ''){
        
        $info = pathinfo(storage_path().'photos/'.$filename);
        $ext = $info['extension'];
        return Storage::download('photos/'.$filename, $documentName.'.'.$ext);
        if($filename != ''){
            Storage::download('/files/'.trim($filename));
        }
    }
    
    public function packagePlan(){
        $packageMaster=packageMaster::where('status',1)->get();
        echo $packageMaster;
    }

    public function save_package(Request $request){
        $package_data = $request->validate([
            'package_id'=> 'required',
            'final_amt'=> 'required',
            'start_date'=> 'required',
            'confirmation_date'=> 'required',
            'transaction_id'=> 'required',
            'no_emi'=> 'required',
            'payment_method'=> 'required',
            'down_payment'=> 'required'
        ]);

        // user id and appoitment ID
        $package_data['user_id']=1;
        $package_data['appointment_id']=1;

        $package_data['dev_id']=Auth::guard('dev')->user()->id;
        $save=new PackagePayment($package_data);
        if($save->save()){
            $no_emi=$request->no_emi;
            for($i=0;$i<$no_emi;$i++){
                $payment_emi=array(
                    'dev_id'=>Auth::guard('dev')->user()->id,
                    
                    // user id and appoitment ID
                    'user_id'=>1,
                    'appointment_id'=>1,
                    'pay_id'=>$save->id,
                    'emi_amt'=>$request->i_amount[$i],
                    'emi_date'=>$request->i_date[$i]
                );
                $emi_save=new PaymentEmi($payment_emi);
                $emi_save->save();
            }
            //for each emi here
            return response()->json(['type' => 'success', 'message' => 'Payment Added']);

        }else{
            return response()->json(['type' => 'error', 'message' => 'Oops! Process Failed']);
        }
    }
}