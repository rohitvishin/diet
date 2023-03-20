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
    Route::get('/profile', [DevController::class, 'getProfile'])->name('profile');

    Route::post('/addAppointment',[DevController::class,'addAppointment']);
    Route::get('/appointments', [DevController::class, 'Appointments'])->name('appointments');
    Route::post('/getClientName', [DevController::class, 'getClientName']);
    Route::post('/getLabTestName', [DevController::class, 'getLabTestName']);
    Route::post('/getProductName', [DevController::class, 'getProductName']);
    Route::get('/consultation', [DevController::class, 'Consultation']);
    Route::get('/package_plan', [DevController::class, 'packagePlan']);

    Route::get('/consultation2/{type}/{user_id}/{page}/{submenu}', [DevController::class, 'Consultation2']);

    Route::get('/startAppointment/{patient_name}/{page}/{submenu?}', [DevController::class, 'startAppointment']);
    Route::post('/save_followup_data', [DevController::class, 'saveFollowupData']);
    Route::post('/edit_followup_data', [DevController::class, 'editFollowupData']);
    Route::post('/delete_followup_data', [DevController::class, 'deleteFollowupData']);
    Route::post('/update_diet_chart_template_data', [DevController::class, 'updateDietChartTemplate']);

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
    Route::post('/getTemplateData', [DevController::class, 'getTemplateData']);
    Route::post('/dietTemplatePost', [DevController::class, 'dietTemplatePost']);
    Route::post('/updateDietTemplateStatus', [DevController::class, 'updateDietTemplateStatus']);
    Route::post('/updateDietChartTemplateMaster', [DevController::class, 'updateDietChartTemplateMaster']);

    Route::get('/productMaster', [DevController::class, 'ProductMasterList']);
    Route::post('/productMasterPost', [DevController::class, 'productMasterPost']);
    Route::post('/updateProductMasterStatus', [DevController::class, 'updateProductMasterStatus']);
    
    
    Route::post('/update_diet_recall_data', [DevController::class, 'updateDietRecallData']);



    // Consultation Pages Function POST
    Route::post('/save_basic_details',[DevController::class,'UpdateBasicDetails']);
    Route::post('/save_medical_histories',[DevController::class,'UpdateMedicalHistories']);
    Route::post('/save_remarks',[DevController::class,'UpdateRemarks']);
    Route::post('/save_documents',[DevController::class,'UpdateDocuments']);
    Route::get('/downloadFile/{filename}/{documentName}',[DevController::class,'DownloadFile']);
    Route::post('/save_package',[DevController::class,'save_package']);
    Route::post('/save_product_payment',[DevController::class,'save_product_payment']);
    Route::get('/download_invoice/{id}/{client_id}',[DevController::class,'downloadInvoice']);
    Route::get('/view_invoice/{id}/{client_id}',[DevController::class,'viewInvoice']);
    Route::get('/view_product_invoice/{id}/{client_id}',[DevController::class,'viewProductInvoice']);
    Route::get('/download_product_invoice/{id}/{client_id}',[DevController::class,'downloadProductInvoice']);
    Route::get('/export_diet_chart/{id}',[DevController::class,'export_diet_chart']);
    Route::get('/print_diet_chart/{id}',[DevController::class,'print_diet_chart']);
    
    Route::post('/addClient',[DevController::class,'addClient']);
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