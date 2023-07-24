<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\HomeController;


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
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login-process', [AuthController::class, 'login_process'])->name('login.process'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('registration-process', [AuthController::class, 'registration_process'])->name('register.process'); 

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('activity-log', ActivityLogController::class);
    
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard'); 
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');    
});

Route::get('test', function () {
    echo "hi";exit;
});
Route::get('/', [HomeController::class, 'index']);
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('product-details/{slug}', [HomeController::class, 'product_details'])->name('product.details');


// Clear application all:
Route::get('/clear-all', function() {
    Artisan::call('cache:clear');
	Artisan::call('route:cache');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');
    echo "cache route config view cleared!";
});
