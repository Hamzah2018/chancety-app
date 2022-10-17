<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\{SettingController,CustomerController,DashboardController,CategoryController,SubCategoryController,ProductController};
use App\Http\Controllers\Page\ProductPageController;

use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('home');
// });
// Auth::routes();
// 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']
Route::get('/', [HomeController::class, 'index'])->name('selection');

// Route::group(['namespace' => 'Auth'],function (){ });

Route::group(['namespace' => 'Auth','localeSessionRedirect','localizationRedirect','Auth:admin'],function (){

    Route::get('/login/{type}' ,[loginController::class,'loginForm'])->middleware('guest')->name('login.show');

    Route::post('/login',[LoginController::class,'login'])->name('login');

     Route::get('/logout/{type}',[loginController::class,'logout'])->name('logout');

    });

    Route::prefix('page')->group(function () {
        Route::get('/product',[ProductPageController::class,'cat']);
        Route::get('/product/show/{id}',[ProductPageController::class,'show'])->name('page.sub_show');

    });

    Route::group(
        [
            'middleware' => [ 'auth:admin']
        ], function () {
        Route::prefix('admin')->group(function () {
        Route::resource('customer', CustomerController::class);
        // Route::resource('customer', CustomerController::class);
        Route::group(['prefix' => 'customers', 'as' => 'customers.'], function () {
        Route::get('data/datatables', [CustomerController::class, 'datatable'])->name('datatable');
        // Route::post('activate/{id}', [CustomerController::class, 'operations'])->name('active');
    });
    Route::resource('catogray', CategoryController::class);
    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('data/datatables', [CategoryController::class, 'datatable'])->name('datatable');
        // Route::post('activate/{id}', [CategoryController::class, 'operations'])->name('active');
    });
    //  admin..category
    Route::get('/dashboard',[DashboardController::class,'index']);
    Route::resource('setting', SettingController::class);

    Route::resource('sub-catogray', SubCategoryController::class);
    Route::resource('product', ProductController::class);

    // [CustomerController::class, 'datatable']
    });
    Route::get('/catogray/{id}',[ProductController::class,'getsubcat']);
    Route::get('/dashboard',[HomeController::class, 'dashboard'])->name('dashboard'); });
// Route::resource('/', CustomerController::class);
// admin setting , custumor route
// Route::prefix('admin')->group(function () {
// Route::resource('customer', CustomerController::class);
// Route::resource('setting', SettingController::class);

// });
Route::post('Upload_attachment', [CustomerController::class,'Upload_attachment'])->name('Upload_attachment');
// Route::get('Download_attachment/{fname}/{filename}', [CustomerController::class,'Download_attachment'])->name('Download_attachment');
Route::post('Delete_attachment', [CustomerController::class, 'Delete_attachment'])->name('Delete_attachment');



// Route::get('/dashboard', 'HomeControllerindex')->name('dashboard');

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

// Route::get('admin/login', [AdminLoginController::class, 'showLoginForm']);
// Route::post('admin/login', [AdminLoginController::class, 'login'])->name('admin.login');

// Route::get('customer/login', [CustomerLoginController::class, 'showLoginForm']);
// Route::post('customer/login', [CustomerLoginController::class, 'login'])->name('customer.login');

// Route::group(["prefix" => "admin", "middleware" => "assign.guard:admin,
// admin/login"],function(){
//    Route::get("dashboard" , function() {
//       return view("admin.home");
//      });
// });
// Route::group(["prefix" => "customer", "middleware" => "assign.guard:customer,
// customer/login"],function(){
//    Route::get("dashboard" , function() {
//       return view("customer.home");
//      });
// });
