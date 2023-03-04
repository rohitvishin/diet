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
Route::get('/',[DevController::class, 'dashboard'])->name("login");

Route::post('/login', [DevController::class, 'login']);

Route::get('/login', function () {return redirect()->route("login");});

// logout
Route::get('logout', function () {
    session()->flush();
    return redirect()->route("login");
})->name('logout');

// authentication require to access these routes
Route::middleware('devauth')->group(function(){
    
Route::get('/home', [DevController::class, 'dashboard'])->name('home');
// Route::view('/dashboard', [DevController::class,'dashbaord'])->name('home');
Route::get('/profile', [DevController::class, 'getProfile'])->name('profile');

Route::post('/addAppointment',[DevController::class,'addAppointment']);
Route::get('/appointments', [DevController::class, 'Appointments'])->name('appointments');
Route::post('/getClientName', [DevController::class, 'getClientName']);
Route::get('/consultation', [DevController::class, 'Consultation']);
Route::get('/consultation2/{type}/{user_id}/{page}/{submenu}', [DevController::class, 'Consultation2']);

Route::get('/startAppointment/{patient_name}/{page}/{submenu?}', [DevController::class, 'startAppointment']);
Route::post('/save_followup_data', [DevController::class, 'saveFollowupData']);
Route::post('/edit_followup_data', [DevController::class, 'editFollowupData']);

Route::get('/medicalMaster', [DevController::class, 'MedicalMasterList']);
Route::get('/labMaster', [DevController::class, 'LabMasterList']);
Route::get('/activityMaster', [DevController::class, 'ActivityMasterList']);
Route::get('/clientList', [DevController::class, 'ClientList']);

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


// Consultation Pages Function POST
Route::post('/save_basic_details',[DevController::class,'UpdateBasicDetails']);
Route::post('/save_remarks',[DevController::class,'UpdateRemarks']);
Route::post('/save_documents',[DevController::class,'UpdateDocuments']);
Route::get('/downloadFile/{filename}/{documentName}',[DevController::class,'DownloadFile']);

// account
Route::get('/user', function () {
    return Auth::guard('dev')->user();
});

// get Routes
Route::view('/dashboard', 'dev.dashboard')->name('dashboard');
Route::view('/packages', 'dev.packages')->name('packages');
Route::view('/reports', 'dev.reports')->name('reports');
Route::view('/mydata', 'dev.mydata')->name('mydata');
Route::view('/mytemplate', 'dev.mytemplate')->name('mytemplate');
Route::view('/sendpromotion', 'dev.sendpromotion')->name('sendpromotion');
Route::view('/sendreminder', 'dev.sendreminder')->name('sendreminder');

// post Routes

Route::view('list-project', 'dev.Project.list')->name('list-project');
});