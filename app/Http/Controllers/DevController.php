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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\db;

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
    public function dashboard(Request $request){
    }

    public function Consultation(Request $request){
        $lastType_id = MedicalMaster::select('type_id')->latest()->first()['type_id'];
        $data = [];
        for ($i = 0; $i < $lastType_id; $i++) {
            $data['data'][$i] = MedicalMaster::where('type_id', $i + 1)->get();
        }
        return view('dev.consultant.consultation',$data);
    }

    public function MedicalMasterList(){
        $data['lastType_id'] = MedicalMaster::select('type_id')->latest()->first()['type_id'];
        $data['data'] = MedicalMaster::orderBy('id', 'desc')->get();
        $data['forSelect'] = MedicalMaster::select('type_id','type')->groupBy('type_id','type')->get();
        return view('dev.masters.medicalmaster', $data);
    }

    public function ActivityMasterList(){
        $data['data'] = ActivityMaster::orderBy('id', 'desc')->get();
        return view('dev.masters.activitymaster', $data);
    }

    public function LabMasterList(){
        $data['data'] = LabMaster::orderBy('id', 'desc')->get();
        return view('dev.masters.labmaster', $data);
    }

    public function getProfile(){
        $user = Dev::where('id',Auth::guard('dev')->user()->id)->first();
        return view('dev.profile.profile',['user'=>$user]);
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
        $appointment = $request->validate([
            'customer_name' => 'required|string',
            'customer_mobile' => 'required|string',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);
        $appointment['doc_id']=Auth::guard('dev')->user()->id;
        $appointment['status']=0;
        $isExisting=User::where('mobile',$appointment['customer_mobile'])->count();
        if($isExisting==0){
            DB::insert('insert into users (name, mobile) values (?, ?)', [$appointment['customer_name'],$appointment['customer_mobile']]);
        }
        $addAppoint=Appointment::create($appointment);
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
        $data = $request->validate([
            'test_type' => 'required',
            'test_name' => 'required',
            'subject' => 'required',
            'subject_value_action' => 'required',
            'result_low_range' => 'required',
            'result_high_range' => 'required',
            'unit' => 'required',
        ]);
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
        $data['data'] = DietTemplateMaster::orderBy('id', 'desc')->get();
        return view('dev.masters.diettemplatemaster', $data);
    }

    public function ProductMasterList(){
        $data['data'] = ProductMaster::orderBy('id', 'desc')->get();
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
    public function saveMedicalHistory(Request $request){
        $questions=$request->validate([
            'ques1'=> 'required',
            'ques2'=> 'required',
            'ques3'=> 'required',
            'ques4'=> 'required',
            'ques5'=> 'required',
            'ques6'=> 'required',
            'ques7'=> 'required',
            'ques8'=> 'required',
            'ques9'=> 'required',
            'ques10'=> 'required',
            'ques11'=> 'required',
            'ques12'=> 'required',
            'ques13'=> 'required',
        ]);
        foreach($questions as $key=>$ques){
            $data[]=array(
                'doctor_id'=>Auth::guard('dev')->user()->id,
                'user_id'=>$request->input('mobile'),
                'question_id'=>$key+1,
                'answer'=>$ques
            );
        }
        $status=MedicalHistory::where('user_id',$request->input('mobile'))->first();
        if($status){
            $saveQuestion=new MedicalHistory($data);
            if($saveQuestion->save()){
                return response()->json([
                    'message' => 'Question updated',
                    'type' => 'success',
                    'status'=> $newStatus
                ]);
            }
        }else{
            return response()->json([
                'message' => 'Product updated',
                'type' => 'success',
                'status'=> $newStatus
            ]);
        }
        
    }
}