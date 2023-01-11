<?php

namespace App\Http\Controllers;

use App\Models\ActivityMaster;
use App\Models\Appointment;
use App\Models\Dev;
use App\Models\MedicalMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DevController extends Controller
{
    public function hello()
    {
        return "hey from dev controller";
    }

    public function login(Request $request)
    {
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

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'username' => 'required|string|unique:users',
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

    public function dashboard(Request $request)
    {
    }

    public function Consultation(Request $request)
    {
        $lastType_id = MedicalMaster::select('type_id')->latest()->first()['type_id'];
        $data = [];
        for ($i = 0; $i < $lastType_id; $i++) {
            $data['data'][$i] = MedicalMaster::where('type_id', $i + 1)->get();
        }
        return view('dev.consultant.consultation',$data);
    }

    public function MedicalMasterList()
    {
        $data['lastType_id'] = MedicalMaster::select('type_id')->latest()->first()['type_id'];
        $data['data'] = MedicalMaster::orderBy('id', 'desc')->get();
        $data['forSelect'] = MedicalMaster::select('type_id','type')->groupBy('type_id','type')->get();
        return view('dev.masters.medicalmaster', $data);
    }

    public function ActivityMasterList()
    {
        $data['data'] = ActivityMaster::orderBy('id', 'desc')->get();
        return view('dev.masters.activitymaster', $data);
    }
    public function getProfile(){
        $user=Dev::where('id',Auth::guard('dev')->user()->id)->first();
        return view('dev.profile.profile',['user'=>$user]);
    }
    public function updateProfile(Request $request)
    {
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
            'client' => 'required|string',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
            
        ]);
        $appointment['doc_id']=Auth::guard('dev')->user()->id;
        $appointment['status']=0;
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
}