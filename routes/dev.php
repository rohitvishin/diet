<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DevController;
use Illuminate\Support\Facades\Auth;

// dev panel Routes
Route::prefix("client")->group(function(){
    
    // register
    Route::get('register', function () {
        return view('dev.Auth.register');
    })->name('register');

    Route::post('register', [DevController::class, 'register']);
    
    // login
    Route::get('/', function () {
        return view('dev.Auth.login');
    })->name("login");
    Route::post('/login',[DevController::class,'login']);
    Route::get('/login',function(){
        return redirect()->route("login");
    });

    // logout
    Route::get('logout',function(){
        session()->flush();
        return redirect()->route("login");
    })->name('logout');

    // authentication require to access these routes
    Route::middleware('devauth')->group(function(){
        Route::view('/home', 'dev.home')->name('home');
        Route::view('/table', 'dev.tables.table');
        Route::view('/profile', 'dev.Account.profile')->name('profile');
        
        // account
        Route::get('/user', function () {
            return Auth::guard('dev')->user();
        });
        
        Route::view('list-project','dev.Project.list')->name('list-project');
    });
 });
