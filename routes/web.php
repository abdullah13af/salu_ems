<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;

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
    return view('index', ['page_title' => 'Home']);
});

Route::get('/dashboard', function () {
    return view('index', ['page_title' => 'Home']);
});

require __DIR__.'/auth.php';

// resources general routes
Route::resource('/batches', BatchController::class);
Route::resource('/departments', DepartmentController::class);
Route::resource('/teachers', TeacherController::class);
Route::resource('/students', StudentController::class);
Route::resource('/subjects', SubjectController::class);