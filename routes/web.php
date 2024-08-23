<?php

use App\Http\Controllers\Auth\SocialController;
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


Route::get('/', function () {
    return view('home');
});

Route::get('auth/{provider}', [SocialController::class, 'redirectToProvider'])->name('google-auth');
Route::get('auth/{provider}/callback', [SocialController::class, 'handleProviderCallback'])->name('google-auth-callback');

// Route::get('/dashboard', function () {
//     return view('admin.dashboard.dashboard');
// });

Route::get('/dashboard', function () {
    return view('admin.layouts.app');
});

Route::get('/admin/users', function () {
    return view('admin.user.index');
});

