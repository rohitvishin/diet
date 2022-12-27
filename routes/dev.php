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

    Route::get('/login', function(){ return redirect()->route("login"); } );

    // logout
    Route::get('logout',function(){
        session()->flush();
        return redirect()->route("login");
    })->name('logout');

    // authentication require to access these routes
    // Route::middleware('devauth')->group(function(){
        Route::view('/home', 'dev.home')->name('home');
        Route::view('/table', 'dev.tables.table');
        Route::view('/profile', 'dev.profile.profile')->name('profile');
        Route::view('/appointment', 'dev.appointment')->name('appointment');
        Route::view('/consultation', 'dev.consultant.consultation')->name('consultation');
        
        // account
        Route::get('/user', function () {
            return Auth::guard('dev')->user();
        });

        // get Routes
        Route::view('/dashboard', 'dev.dashboard')->name('dashboard');
        Route::view('/appointments', 'dev.appointment')->name('appointment');
        Route::view('/clients', 'dev.clients')->name('clients');
        Route::view('/packages', 'dev.packages')->name('packages');
        Route::view('/reports', 'dev.reports')->name('reports');
        Route::view('/mydata', 'dev.mydata')->name('mydata');
        Route::view('/mytemplate', 'dev.mytemplate')->name('mytemplate');
        Route::view('/myprofile', 'dev.myprofile')->name('myprofile');
        Route::view('/sendpromotion', 'dev.sendpromotion')->name('sendpromotion');
        Route::view('/sendreminder', 'dev.sendreminder')->name('sendreminder');

        // post Routes
        




        Route::view('list-project','dev.Project.list')->name('list-project');
    // });
 });
