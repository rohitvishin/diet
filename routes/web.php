<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/', function(){
    return "index";
});
Route::get('/test', function(){
    return "index";
});
Route::get('login',function(){
    return 'login page';
});
Route::get('projects', [Users::class, 'getProjects']);
Route::get('projects/{id}', [Users::class, 'getProjectDetails']);
Route::group(['middleware' => 'auth:api'], function() {
    Route::get('user', [AuthController::class, 'user']);
    Route::get('logout', [AuthController::class, 'logout']);
    
});