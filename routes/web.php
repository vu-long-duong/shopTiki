<?php

use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\Client\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\All\LanguageController;
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


Route::get('/', [DashboardController::class, 'index'])->name('client-dashboard');

Route::get('auth/{provider}', [SocialController::class, 'redirectToProvider'])->name('social-auth');
Route::get('auth/{provider}/callback', [SocialController::class, 'handleProviderCallback']);

Route::get('/locale/{locale}', [LanguageController::class, 'changeLocale']);
////admin

Route::middleware(['locale'])->group(function () {
    Route::post('admin/user/create', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('admin/users', [UserController::class, 'show'])->name('admin.users.show');
    Route::get('admin/user/{id}', [UserController::class, 'oneUser'])->name('admin.users.oneshow');
    Route::put('admin/user/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('admin/users/{id}', [UserController::class, 'destroy']);
    Route::get('admin/users/search', [UserController::class, 'search']);
    
    Route::get('/dashboard', function () {
        return view('admin.layouts.app');
    });
});



