<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\dashboard;
use App\Http\Controllers\frontend\usercontroller;
use App\Http\Controllers\PostController;

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
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', [dashboard::class,'dash']);
// Route::view('/dashboard','admin.dashboard.dashboard');
Route::get('/dashboard/user', [usercontroller::class,'all']);
Route::get('/dashboard/user/add', [usercontroller::class,'add']);
Route::post('/dashboard/user/store', [usercontroller::class,'store']);
Route::get('/dashboard/user/read/{id}', [usercontroller::class,'read']);
Route::get('/dashboard/user/edit/{id}', [usercontroller::class,'edit']);
Route::post('/dashboard/edit_image/{id}', [usercontroller::class,'editImg']);
Route::post('/dashboard/user/update', [usercontroller::class,'update']);
Route::get('/dashboard/user/delete/{id}', [usercontroller::class,'delete']);
Route::get('/dashboard/edit_image/{id}', [usercontroller::class,'readImg']);
Route::post('/dashboard/edit_image/update', [usercontroller::class,'editImg']);

// resource controller
Route::resource('/dashboard/post', PostController::class);




require __DIR__.'/auth.php';
