<?php
use App\Http\Controllers\DevController;
use Illuminate\Support\Facades\Route;

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
// register
Route::get('register', function () {
    return view('dev.Auth.register');
})->name('register');

Route::post('register', [DevController::class, 'register']);

// login
Route::get('/', function () {
    return view('dev.Auth.login');
})->name("login");

Route::post('/login', [DevController::class, 'login']);

Route::get('/login', function () {return redirect()->route("login");});

// logout
Route::get('logout', function () {
    session()->flush();
    return redirect()->route("login");
})->name('logout');

// authentication require to access these routes
Route::middleware('devauth')->group(function(){
Route::view('/home', 'dev.home')->name('home');
Route::get('/profile', [DevController::class,'getProfile'])->name('profile');
Route::view('/appointment', 'dev.appointment')->name('appointment');
Route::get('/consultation', [DevController::class, 'Consultation']);
Route::get('/medicalMaster', [DevController::class, 'MedicalMasterList']);
Route::get('/labMaster', [DevController::class, 'LabMasterList']);
Route::get('/activityMaster', [DevController::class, 'ActivityMasterList']);
Route::view('/clients', 'dev.clients.clients')->name('clients');

Route::get('/packageMaster', [DevController::class, 'PackageMasterList']);
Route::post('/packagePost', [DevController::class, 'packagePost']);
Route::post('/updatePackageStatus', [DevController::class, 'updatePackageStatus']);

Route::get('/foodMaster', [DevController::class, 'FoodMasterList']);
Route::post('/foodPost', [DevController::class, 'foodMasterPost']);
Route::post('/updateFoodMasterStatus', [DevController::class, 'updateFoodMasterStatus']);

Route::get('/dietTemplateMaster', [DevController::class, 'DietTemplateMasterList']);
Route::post('/dietTemplatePost', [DevController::class, 'dietTemplatePost']);
Route::post('/updateDietTemplateStatus', [DevController::class, 'updateDietTemplateStatus']);

Route::get('/productMaster', [DevController::class, 'ProductMasterList']);
Route::post('/productMasterPost', [DevController::class, 'productMasterPost']);
Route::post('/updateProductMasterStatus', [DevController::class, 'updateProductMasterStatus']);

// account
Route::get('/user', function () {
    return Auth::guard('dev')->user();
});

// get Routes
Route::view('/dashboard', 'dev.dashboard')->name('dashboard');
Route::view('/appointments', 'dev.appointment')->name('appointment');
Route::view('/packages', 'dev.packages')->name('packages');
Route::view('/reports', 'dev.reports')->name('reports');
Route::view('/mydata', 'dev.mydata')->name('mydata');
Route::view('/mytemplate', 'dev.mytemplate')->name('mytemplate');
Route::view('/myprofile', 'dev.myprofile')->name('myprofile');
Route::view('/sendpromotion', 'dev.sendpromotion')->name('sendpromotion');
Route::view('/sendreminder', 'dev.sendreminder')->name('sendreminder');

// post Routes

Route::view('list-project', 'dev.Project.list')->name('list-project');
});