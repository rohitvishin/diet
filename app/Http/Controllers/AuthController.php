<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use Validator;

class AuthController extends Controller
{
  /**
  * Create user
  *
  * @param  [string] name
  * @param  [string] email
  * @param  [string] password
  * @param  [string] password_confirmation
  * @return [string] message
  */
  public function register(Request $request)
  {
    $request->validate([
      'name' => 'required|string',
      'email' => 'required|string|email|unique:users',
      'username' => 'required|string|unique:users',
      'password' => 'required|string|',
      'c_password'=>'required|same:password',
      'mobile' => 'required|string',
    ]);

    $user = new User([
      'name' => $request->name,
      'password' =>  bcrypt($request->password),
      'email' => $request->email,
      'mobile' => $request->mobile,
      'username' => $request->username,
      'register_ip' => '168.192.1.92', // need to make it dynamic
      'status' => 1,
    ]);
    if($user->save()){
      return redirect('/dev');
    }else{
      return response()->json(['error'=>'Provide proper details']);
    }
  }
  public function login(Request $request)
  {
    $request->validate([
      'username' => 'required|string',
      'password' => 'required|string'
    ]);
    $credentials = request(['username', 'password']);
    if(!Auth::guard('dev')->attempt($credentials))
      return response()->json([
        'message' => 'Unauthorized',
        'status'=>0
      ], 401);
      $user = Auth::guard('dev')->user();
   // return redirect('/dev/home');
    return response()->json([
      'user'=>$user
    ], 401);
  }
  public function hello()
  {
    return "hey";
  }

  public function logout(Request $request)
  {
    Auth::logout();
    return response()->json([
      'message' => 'Successfully logged out'
    ]);
  }

  
}