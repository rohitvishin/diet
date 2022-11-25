<?php

use Illuminate\Support\Facades\Route;

// Admin Panel Routes
Route::prefix("admin")->group(function(){

    Route::get('/admin', function () {
        return view('Admin/Auth/login');
    });
    Route::get('/user/{id}', function ($id) {
        return $id;
    });
    
 });
