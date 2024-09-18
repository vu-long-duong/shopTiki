<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\Client\DashboardController as ClientDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\All\DocumentController;
use App\Http\Controllers\All\ImportController;
use App\Http\Controllers\All\LanguageController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [ClientDashboardController::class, 'index'])->name('client-dashboard');

//đăng nhập bằng gg, fb, github
Route::get('auth/{provider}', [SocialController::class, 'redirectToProvider'])->name('social-auth');
Route::get('auth/{provider}/callback', [SocialController::class, 'handleProviderCallback']);

//auth
Route::post('auth/register', [AuthController::class, 'register'])->name('auth.register');

Route::get('/locale/{locale}', [LanguageController::class, 'changeLocale'])->name('language');


//test
Route::get('/{data_storage}/uploadfile', [DocumentController::class, 'createDocument']);
Route::get('/{data_storage}/uploadimage', [DocumentController::class, 'uploadImage']);
Route::get('/{data_storage}/list', [DocumentController::class, 'listDocument']);
//end test

//api
Route::get('import-address', [ImportController::class, 'importAddress'])->name('import');
Route::get('/get-cities', [UserController::class, 'getCities'])->name('get.cities');
Route::get('/get-districts/{cityId}', [UserController::class, 'getDistricts'])->name('get.districts');
Route::get('/get-wards/{districtId}', [UserController::class, 'getWards'])->name('get.wards');


////admin
Route::middleware(['locale'])->group(function () {
    Route::post('admin/user/create', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('admin/user/{id}', [UserController::class, 'oneUser'])->name('admin.users.oneshow');
    Route::put('admin/user/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('admin/user/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('admin/users/search', [UserController::class, 'search']);
    

    Route::get('admin/get-header/{table}', [AdminDashboardController::class, 'getHeaderTable'])->name('admin.getheader');

    Route::get('/dashboard', function () {
        return view('admin.layouts.app');
    });
});



