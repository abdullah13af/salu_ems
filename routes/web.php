<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherSubjectController;
use App\Models\Department;
use App\Models\Subject;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    if(Auth::check())
        return view('index', ['page_title' => 'Home']);
    return view('auth.login');
});

Route::get('/dashboard', function () {
    if(Auth::check())
        return view('index', ['page_title' => 'Home']);
    return view('auth.login');
});
// // teachers depenedent dropdown start
// Route::get('get_teachers/{id}', function ($id) {
//     $teachers = DB::table('users')
//                 ->join('teachers', 'users.id', 'teachers.user_id')
//                 ->select('teachers.id', 'users.name')
//                 ->where('teachers.department_id', '=', $id)
//                 ->get();
//     return response()->json($teachers);
// });
// // teachers depenedent dropdown end
// subjects depenedent dropdown start
Route::get('get_subjects/{id}', function ($id) {
    $subjects = Subject::where('department_id', '=', $id)->get();
    return response()->json($subjects);
});
// subjects depenedent dropdown end

require __DIR__.'/auth.php';

// resources general routes
Route::resource('/batches', BatchController::class);
Route::resource('/departments', DepartmentController::class);
Route::resource('/teachers', TeacherController::class);
Route::resource('/students', StudentController::class);
Route::resource('/subjects', SubjectController::class);
Route::resource('/teachers_subjects', TeacherSubjectController::class);

