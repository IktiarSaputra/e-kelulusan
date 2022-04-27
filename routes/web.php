<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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
    return view('index');
})->name('welcome');

Route::get('/search', [StudentController::class, 'search'])->name('student.search');

Route::get('/download', [StudentController::class, 'download'])->name('download.format');

Route::get('/cetak_skl/{nisn}', [StudentController::class, 'cetak'])->name('cetak.skl');;

Auth::routes([
    'register' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/setting', [App\Http\Controllers\SettingController::class, 'index'])->name('setting');
Route::post('/setting/{id}', [App\Http\Controllers\SettingController::class, 'update'])->name('setting.update');
Route::resource('student', StudentController::class);
Route::get('/student/delete/{id}', [StudentController::class, 'destroy'])->name('student.delete');
Route::post('import', [StudentController::class, 'import'])->name('import');
