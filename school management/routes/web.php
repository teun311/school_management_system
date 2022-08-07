<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AdminCourseController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\AdminStudentController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.home.home');
    })->name('dashboard');
});
Route::get('/',[WebController::class,'index'])->name('home');
Route::get('/course-detail/{id}',[WebController::class,'detail'])->name('course-detail');
Route::get('/enroll-now/{id}',[WebController::class,'enroll'])->name('enroll-now');
Route::post('/new-enroll/{id}',[WebController::class,'newEnroll'])->name('new-enroll');


Route::get('/user-login',[AuthController::class,'login'])->name('user-login');
Route::post('/new-login',[AuthController::class,'newLogin'])->name('new-login');
Route::post('/user-logout',[AuthController::class,'logout'])->name('user-logout');
Route::post('/student-logout',[AuthController::class,'studentLogout'])->name('student-logout');

Route::get('/user-register',[AuthController::class,'register'])->name('user-register');
Route::post('/new-registration',[AuthController::class,'newRegistration'])->name('new-registration');




//student dash board
Route::middleware(['student'])->group(function (){
    Route::get('/student-dashboard',[StudentDashboardController::class,'index'])->name('student-dashboard');
    Route::get('/student-profile',[StudentDashboardController::class,'profile'])->name('student-profile');
    Route::post('/update-student-profile/{id}',[StudentDashboardController::class,'updateProfile'])->name('update-student-profile');
    Route::get('/change-password',[StudentDashboardController::class,'changePassword'])->name('change-password');
    Route::post('/update-student-password/{id}',[StudentDashboardController::class,'updatePassword'])->name('update-student-password');
});


//Teacher Dash
Route::middleware(['teacher'])->get('/teacher-dashboard',[TeacherDashboardController::class,'index'])->name('teacher-dashboard');
Route::middleware(['teacher'])->get('/add-subject',[SubjectController::class,'index'])->name('add-subject');
Route::middleware(['teacher'])->post('/new-subject',[SubjectController::class,'create'])->name('new-subject');
Route::middleware(['teacher'])->get('/manage-subject',[SubjectController::class,'manage'])->name('manage-subject');

Route::middleware(['teacher'])->get('/approved-course',[SubjectController::class,'approved'])->name('approved-course');
Route::middleware(['teacher'])->get('/enrolled-student/{id}',[SubjectController::class,'enrolledStudent'])->name('enrolled-student');


//Route::middleware(['auth:sanctum','verified'])->get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
// ADmin Dash user
Route::middleware(['auth:sanctum','verified','superAdmin'])->get('/add-user',[UserController::class,'index'])->name('add-user');
Route::middleware(['auth:sanctum','verified','superAdmin'])->post('/new-user',[UserController::class,'create'])->name('new-user');
Route::middleware(['auth:sanctum','verified','superAdmin'])->get('/manage-user',[UserController::class,'manage'])->name('manage-user');
Route::middleware(['auth:sanctum','verified','superAdmin'])->get('/edit-user/{id}',[UserController::class,'edit'])->name('edit-user');
Route::middleware(['auth:sanctum','verified','superAdmin'])->post('/update-user/{id}',[UserController::class,'update'])->name('update-user');
Route::middleware(['auth:sanctum','verified','superAdmin'])->get('/delete-user/{id}',[UserController::class,'delete'])->name('delete-user');
// Admin Dash teacher
Route::middleware(['auth:sanctum','verified'])->get('/add-teacher', [TeacherController::class,'index'])->name('add-teacher');
Route::middleware(['auth:sanctum','verified'])->post('/new-teacher', [TeacherController::class,'create'])->name('new-teacher');
Route::middleware(['auth:sanctum','verified'])->get('/manage-teacher', [TeacherController::class,'manage'])->name('manage-teacher');
Route::middleware(['auth:sanctum','verified'])->get('/edit-teacher/{id}', [TeacherController::class,'edit'])->name('edit-teacher');
Route::middleware(['auth:sanctum','verified'])->post('/update-teacher/{id}', [TeacherController::class,'update'])->name('update-teacher');
Route::middleware(['auth:sanctum','verified'])->get('/delete-teacher/{id}', [TeacherController::class,'delete'])->name('delete-teacher');

Route::middleware(['auth:sanctum','verified'])->get('/manage-course', [AdminCourseController::class,'manage'])->name('manage-course');
Route::middleware(['auth:sanctum','verified'])->get('/view-detail/{id}', [AdminCourseController::class,'detail'])->name('view-detail');
Route::middleware(['auth:sanctum','verified'])->get('/update-status/{id}', [AdminCourseController::class,'upadteStatus'])->name('update-status');
//admin-student module
Route::middleware(['auth:sanctum','verified'])->get('/manage-student', [AdminStudentController::class,'manageStudent'])->name('manage-student');
Route::middleware(['auth:sanctum','verified'])->get('/manage-student-course', [AdminStudentController::class,'manageStudentCourse'])->name('manage-student-course');
Route::middleware(['auth:sanctum','verified'])->get('/student-status/{id}', [AdminStudentController::class,'updateStatus'])->name('student-status');
Route::middleware(['auth:sanctum','verified'])->get('/update-enroll-status/{id}', [AdminStudentController::class,'updateEnrollStatus'])->name('update-enroll-status');

