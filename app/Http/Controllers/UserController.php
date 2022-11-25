<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Users extends Controller
{
    //
    public function getProjects(){
        $projects = DB::table('projects')->get(); 
        return view('user.index', ['projects' => $projects]);
    }
    public function getProjectDetails($id){
        $projects = DB::table('projects')->where('id',$id)->get(); 
        return view('user.index', ['projects' => $projects]);
    }
    public function getOrders(){
        $order = DB::table('order_history')->get(); 
        return view('user.index', ['users' => $order]);
    }
    public function getOrderDetails($id){
        $order = DB::table('order_history')->where('id',$id)->get(); 
        return view('user.index', ['users' => $order]);
    }
    
    
}
