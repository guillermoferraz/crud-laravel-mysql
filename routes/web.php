<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\MyfileController;


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

Route::resource('file', FileController::class)->middleware('auth');
Route::resource('settings', SettingController::class)->middleware('auth');
Route::resource('myfiles', MyfileController::class)->middleware('auth');

Route::get('/home', [FileController::class, 'index'])->name('home');
Route::get('/settings', [SettingController::class, 'index'])->name('setting');
Route::get('/myfiles', [MyfileController::class, 'index'])->name('myfiles');

Auth::routes(['reset'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=> 'auth'], function(){
    Route::get('/home', [FileController::class, 'index'])->name('home');
    Route::get('/settings', [SettingController::class, 'index'])->name('setting');
    Route::get('/myfiles', [MyfileController::class, 'index'])->name('myfiles');

});
