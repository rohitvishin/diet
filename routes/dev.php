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
    Route::middleware('devauth')->group(function(){
        // Route::view('/home', 'dev.home')->name('home');
        Route::view('/table', 'dev.tables.table');
        Route::view('/profile', 'dev.profile.profile')->name('profile');
        Route::view('/appointment', 'dev.appointment')->name('appointment');
        Route::get('/consultation', [DevController::class, 'Consultation']);
        
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
        Route::get('/profile', [DevController::class,'getProfile'])->name('profile');
        Route::view('/sendpromotion', 'dev.sendpromotion')->name('sendpromotion');
        Route::view('/sendreminder', 'dev.sendreminder')->name('sendreminder');
        Route::get('/medicalMaster', [DevController::class, 'MedicalMasterList']);
        Route::get('/activityMaster', [DevController::class, 'ActivityMasterList']);
        Route::get('/labMaster', [DevController::class, 'LabMasterList']);
        Route::get('/get_user/{mobile}',[DevController::class,'get_user']);


        // post Routes
        Route::post('/updateProfile',[DevController::class,'updateProfile']);        
        Route::post('/addAppointment',[DevController::class,'addAppointment']);
        Route::post('/addMedicalMaster',[DevController::class,'addMedicalMaster']);
        Route::post('/updateMedicalMaster',[DevController::class,'updateMedicalMaster']);
        Route::post('/addActivityMaster',[DevController::class,'addActivityMaster']);
        Route::post('/updateActivityMaster',[DevController::class,'updateActivityMaster']);
        Route::post('/addLabMaster',[DevController::class,'addLabMaster']);
        Route::post('/updateLabMaster',[DevController::class,'updateLabMaster']);
        Route::post('/save_user',[DevController::class,'save_user']);
        


        Route::view('list-project','dev.Project.list')->name('list-project');
    });
 });