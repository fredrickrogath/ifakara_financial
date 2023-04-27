<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    /*
    |--------------------------------------------------------------------------
    | ALL USER PASSWORD IS 123456789, LOGIN WITH EMAIL FROM DATABASE ACCORDING TO ROLES.
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    | ROLES ARE DEFINED IN USER MODEL AT THE DOWN SIDE...FUNDI ADEVO THE DR
    |--------------------------------------------------------------------------
    */
    /*
    |--------------------------------------------------------------------------
    | FAKE DATA GENERATING ROUTE
    |--------------------------------------------------------------------------
    */
    // App\Models\User::factory()->count(100)->create();
    // App\Models\Post::factory()->count(1000)->create();
    /*
    |--------------------------------------------------------------------------
    | END OF FAKE DATE GENERATING ROUTE
    |--------------------------------------------------------------------------
    */
    if (Auth::check()) {
        return redirect('/dashboard');
    } else {
        return redirect('/login');
    }
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    'verified',
])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | MAIN ROUTE FOR DETERMINING ROUTES PATH BASEED ON USER ROLE
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'DetermineUserRole'])->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | ROUTES FOR THE BISHOP
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'bishop', 'middleware' => 'is_bishop', 'as' => 'bishop.'], function () {
        Route::get('/dashboard', [\App\Http\Controllers\Bishop\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/schools', [\App\Http\Controllers\Bishop\DashboardController::class, 'schools'])->name('schools');
        Route::get('/documents', [\App\Http\Controllers\Bishop\DashboardController::class, 'documents'])->name('documents');
        Route::get('/uploads', [\App\Http\Controllers\Bishop\DashboardController::class, 'uploads'])->name('uploads');
        Route::get('/invoices', [\App\Http\Controllers\Bishop\DashboardController::class, 'invoices'])->name('invoices');
        // Route::get('/account', [\App\Http\Controllers\Bishop\DashboardController::class, 'account'])->name('account');
        Route::get('/internal_office', [\App\Http\Controllers\Bishop\DashboardController::class, 'internal_office'])->name('internal_office');
    });



    /*
    |--------------------------------------------------------------------------
    | ROUTES FOR THE ACADEMIC
    |--------------------------------------------------------------------------
    */
    
    Route::group(['prefix' => 'academic', 'middleware' => 'is_academic', 'as' => 'academic.'], function () {
        Route::get('/pageSix', [\App\Http\Controllers\Academic\DashboardController::class, 'pageSix'])->name('pageSix');
        Route::get('/pageOne', [\App\Http\Controllers\Academic\DashboardController::class, 'pageOne'])->name('pageOne');
        Route::get('/pageTwo', [\App\Http\Controllers\Academic\DashboardController::class, 'pageTwo'])->name('pageTwo');
        Route::get('/pageFour', [\App\Http\Controllers\Academic\DashboardController::class, 'pageFour'])->name('pageFour');
        Route::get('/pageFive', [\App\Http\Controllers\Academic\DashboardController::class, 'pageFive'])->name('pageFive');
        Route::get('/dashboard', [\App\Http\Controllers\Academic\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/pageThree', [\App\Http\Controllers\Academic\DashboardController::class, 'pageThree'])->name('pageThree');
        Route::get('/pageSeven', [\App\Http\Controllers\Academic\DashboardController::class, 'pageSeven'])->name('pageSeven');
    });



    /*
    |--------------------------------------------------------------------------
    | ROUTES FOR THE SECRETARY
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'secretary', 'middleware' => 'is_secretary', 'as' => 'secretary.'], function () {
        
        Route::post('/dispatch-secretary-event', function () {
            event(new \App\Events\NewPostPublished('data'));
        });
        
        Route::get('/dashboard', [\App\Http\Controllers\Secretary\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/schools', [\App\Http\Controllers\Secretary\DashboardController::class, 'schools'])->name('schools');
        Route::get('/uploads', [\App\Http\Controllers\Secretary\DashboardController::class, 'uploads'])->name('uploads');
        Route::get('/reports', [\App\Http\Controllers\Secretary\DashboardController::class, 'reports'])->name('reports');
        // Route::get('/account_office', [\App\Http\Controllers\Secretary\DashboardController::class, 'account_office'])->name('account_office');
        // Route::get('/invoice_school', [\App\Http\Controllers\Secretary\DashboardController::class, 'invoice_school'])->name('invoice_school');
        // Route::get('/invoice_create', [\App\Http\Controllers\Secretary\DashboardController::class, 'invoice_create'])->name('invoice_create');
        // Route::get('/invoice_incoming', [\App\Http\Controllers\Secretary\DashboardController::class, 'invoice_incoming'])->name('invoice_incoming');
        // Route::get('/invoice_pending', [\App\Http\Controllers\Secretary\DashboardController::class, 'invoice_pending'])->name('invoice_pending');
        // Route::get('/invoice_reports', [\App\Http\Controllers\Secretary\DashboardController::class, 'invoice_reports'])->name('invoice_reports');

    });



    /*
    |--------------------------------------------------------------------------
    | ROUTES FOR THE ACCOUNTANT
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'accountant', 'middleware' => 'is_accountant', 'as' => 'accountant.'], function () {
        Route::get('/dashboard', [\App\Http\Controllers\Accountant\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/invoice_school', [\App\Http\Controllers\Accountant\DashboardController::class, 'invoice_school'])->name('invoice_school');
        Route::get('/invoice_create', [\App\Http\Controllers\Accountant\DashboardController::class, 'invoice_create'])->name('invoice_create');
        Route::get('/invoice_incoming', [\App\Http\Controllers\Accountant\DashboardController::class, 'invoice_incoming'])->name('invoice_incoming');
        Route::get('/invoice_pending', [\App\Http\Controllers\Accountant\DashboardController::class, 'invoice_pending'])->name('invoice_pending');
        Route::get('/invoice_reports', [\App\Http\Controllers\Accountant\DashboardController::class, 'invoice_reports'])->name('invoice_reports');
        Route::get('/charts_of_accounts', [\App\Http\Controllers\Accountant\DashboardController::class, 'charts_of_accounts'])->name('charts_of_accounts');
        Route::get('/invoices', [\App\Http\Controllers\Accountant\DashboardController::class, 'invoices'])->name('invoices');
        Route::get('/accepeted_requisitions', [\App\Http\Controllers\Accountant\DashboardController::class, 'accepeted_requisitions'])->name('accepeted_requisitions');
        Route::get('/rejected_requisitions', [\App\Http\Controllers\Accountant\DashboardController::class, 'rejected_requisitions'])->name('rejected_requisitions');
        Route::get('/starred_requisitions', [\App\Http\Controllers\Accountant\DashboardController::class, 'starred_requisitions'])->name('starred_requisitions');
        Route::get('/deleted_requisitions', [\App\Http\Controllers\Accountant\DashboardController::class, 'deleted_requisitions'])->name('deleted_requisitions');
    //     Route::get('/pageSeven', [\App\Http\Controllers\Accountant\DashboardController::class, 'pageSeven'])->name('pageSeven');

        Route::get('/getChartOfAccounts', [\App\Http\Controllers\Accountant\Invoice\ChatOfAccountController::class, 'getChartOfAccounts'])->name('getChartOfAccounts');
        Route::post('/addChartOfAccounts', [\App\Http\Controllers\Accountant\Invoice\ChatOfAccountController::class, 'addChartOfAccounts'])->name('addChartOfAccounts');
        Route::post('/updateChartOfAccount', [\App\Http\Controllers\Accountant\Invoice\ChatOfAccountController::class, 'updateChartOfAccount'])->name('updateChartOfAccount');
        Route::post('/deleteChartOfAccounts', [\App\Http\Controllers\Accountant\Invoice\ChatOfAccountController::class, 'deleteChartOfAccounts'])->name('deleteChartOfAccounts');
    });


    /*
    |--------------------------------------------------------------------------
    | ROUTES FOR THE PROCUREMENT
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'procurement', 'middleware' => 'is_procurement', 'as' => 'procurement.'], function () {

        /*
        |--------------------------------------------------------------------------
        | NAVIGATIONS
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', [\App\Http\Controllers\Procurement\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/tools', [\App\Http\Controllers\Procurement\DashboardController::class, 'tools'])->name('tools');
        Route::get('/invoice', [\App\Http\Controllers\Procurement\DashboardController::class, 'invoice'])->name('invoice');
        Route::get('/uploads', [\App\Http\Controllers\Procurement\DashboardController::class, 'uploads'])->name('uploads');
        Route::get('/reports', [\App\Http\Controllers\Procurement\DashboardController::class, 'reports'])->name('reports');

        /*
        |--------------------------------------------------------------------------
        | TOOLS
        |--------------------------------------------------------------------------
        */

        Route::post('/add_tool', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'add_tool'])->name('add_tool');
        Route::post('/addBrokenTool', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'addBrokenTool'])->name('addBrokenTool');
        Route::get('/get_tools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'get_tools'])->name('get_tools');
        Route::get('/getBrokenTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'getBrokenTools'])->name('getBrokenTools');
        Route::get('/getStarredTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'getStarredTools'])->name('getStarredTools');
        Route::get('/getTrashedTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'getTrashedTools'])->name('getTrashedTools');
        Route::post('/updateTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'updateTools'])->name('updateTools');
        Route::post('/deleteTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'deleteTools'])->name('deleteTools');
        Route::post('/restoreTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'restoreTools'])->name('restoreTools');
        Route::post('/permanentDeleteTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'permanentDeleteTools'])->name('permanentDeleteTools');
        Route::post('/starredTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'starredTools'])->name('starredTools');
        Route::get('/headDashboardGetTools', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'headDashboardGetTools'])->name('headDashboardGetTools');

        Route::get('/getSellersList', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'getSellersList'])->name('getSellersList');
        Route::post('/addSeller', [\App\Http\Controllers\Procurement\Tools\ToolsController::class, 'addSeller'])->name('addSeller');

        /*
        |--------------------------------------------------------------------------
        | INVOICES
        |--------------------------------------------------------------------------
        */

        Route::get('/getTools', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'getTools'])->name('getTools');
        Route::get('/getSellers', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'getSellers'])->name('getSellers');
        Route::post('/addInvoice', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'addInvoice'])->name('addInvoice');
        Route::get('/getInvoices', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'getInvoices'])->name('getInvoices');
        Route::post('/getInvoiceView', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'getInvoiceView'])->name('getInvoiceView');
        Route::get('/getStarredInvoices', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'getStarredInvoices'])->name('getStarredInvoices');
        Route::get('/getTrashedInvoices', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'getTrashedInvoices'])->name('getTrashedInvoices');
        Route::post('/updateInvoice', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'updateInvoice'])->name('updateInvoice');
        Route::post('/restoreInvoice', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'restoreInvoice'])->name('restoreInvoice');
        Route::post('/permanentDeleteInvoice', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'permanentDeleteInvoice'])->name('permanentDeleteInvoice');
        Route::post('/starredInvoice', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'starredInvoice'])->name('starredInvoice');
        Route::post('/deleteInvoice', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'deleteInvoice'])->name('deleteInvoice');
        Route::post('/starredInvoices', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'starredInvoices'])->name('starredInvoices');
        Route::post('/submitInvoice', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'submitInvoice'])->name('submitInvoice');
        Route::get('/headDashboardGetInvoices', [\App\Http\Controllers\Procurement\Invoice\InvoiceController::class, 'headDashboardGetInvoices'])->name('headDashboardGetInvoices');


        /*
        |--------------------------------------------------------------------------
        | UPLOADS
        |--------------------------------------------------------------------------
        */

        Route::post('/upload', [\App\Http\Controllers\Procurement\Upload\UploadController::class, 'upload'])->name('upload');
        Route::get('/getUploads', [\App\Http\Controllers\Procurement\Upload\UploadController::class, 'getUploads'])->name('getUploads');
        Route::get('/getNewUploads', [\App\Http\Controllers\Procurement\Upload\UploadController::class, 'getNewUploads'])->name('getNewUploads');
        Route::get('/getTrashedUploads', [\App\Http\Controllers\Procurement\Upload\UploadController::class, 'getTrashedUploads'])->name('getTrashedUploads');
        Route::post('/restoreUpload', [\App\Http\Controllers\Procurement\Upload\UploadController::class, 'restoreUpload'])->name('restoreUpload');
        Route::post('/permanentDeleteUpload', [\App\Http\Controllers\Procurement\Upload\UploadController::class, 'permanentDeleteUpload'])->name('permanentDeleteUpload');
        Route::post('/deleteUpload', [\App\Http\Controllers\Procurement\Upload\UploadController::class, 'deleteUpload'])->name('deleteUpload');
        Route::get('/headDashboardGetUploads', [\App\Http\Controllers\Procurement\Upload\UploadController::class, 'headDashboardGetUploads'])->name('headDashboardGetUploads');
    });

    /*
    |--------------------------------------------------------------------------
    | ROUTES FOR THE INTERNAL AUDITOR
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'internal_auditor', 'middleware' => 'is_internal_auditor', 'as' => 'internal_auditor.'], function () {
        Route::get('/dashboard', [\App\Http\Controllers\InternalAuditor\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/schools', [\App\Http\Controllers\InternalAuditor\DashboardController::class, 'schools'])->name('schools');
        Route::get('/staffs', [\App\Http\Controllers\InternalAuditor\DashboardController::class, 'staffs'])->name('staffs');
        Route::get('/reports', [\App\Http\Controllers\InternalAuditor\DashboardController::class, 'reports'])->name('reports');
        // Route::get('/pageFour', [\App\Http\Controllers\InternalAuditor\DashboardController::class, 'pageFour'])->name('pageFour');
        // Route::get('/pageFive', [\App\Http\Controllers\InternalAuditor\DashboardController::class, 'pageFive'])->name('pageFive');
        // Route::get('/pageThree', [\App\Http\Controllers\InternalAuditor\DashboardController::class, 'pageThree'])->name('pageThree');
        // Route::get('/pageSeven', [\App\Http\Controllers\InternalAuditor\DashboardController::class, 'pageSeven'])->name('pageSeven');
    });

});






/*
|--------------------------------------------------------------------------
| ROTES FOR TESTING DURING DEVELOPMENT
|--------------------------------------------------------------------------
*/


    Route::get('/trigger/{data}', function ($data) {
    echo "<p>You have sent $data</p>";
    event(new App\Events\NewPostPublished($data));
    });

    Route::get('storagee/', function($fileName){
        return Storage::disk('public')->url('storage/systemFiles/images/1.jpg');
    });

    //Add fake users for testing
    Route::get('/add/users', function () {
    // dd(\App\Models\User::with(['posts' => function($query) {
    //     // $query->orderBy('id','desc');
    // }])->get()->first());

    // dd(\App\Models\Post::with(['user' => function($query) {
    //     // $query->orderBy('id','desc');
    // }])->get()->first());

    // App\Models\User::factory()->count(100)->create();
    });

    
    //Route for getting more posts on the scroll component
    Route::middleware(['auth:sanctum', 'verified'])->get('/posts', function () {
        return Response::json([
            'data' => Post::paginate(9)
        ], 201);
    })->name('posts');