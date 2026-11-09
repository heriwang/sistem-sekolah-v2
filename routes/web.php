<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MajorController;

use App\Http\Controllers\SchoolClass\IndexController;
use App\Http\Controllers\SchoolClass\CreateController;
use App\Http\Controllers\SchoolClass\StoreController;
use App\Http\Controllers\SchoolClass\ShowController;
use App\Http\Controllers\SchoolClass\EditController;
use App\Http\Controllers\SchoolClass\UpdateController;
use App\Http\Controllers\SchoolClass\DestroyController;

Route::get('/', function () {
    return view('welcome');
});

// Authentication
Route::get('/login', [AuthController::class, 'loginView'])->name('login-view')->middleware('guest');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login-post')->middleware('guest');
Route::get('/register', [AuthController::class, 'registerView'])->name('register-view')->middleware('guest');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register-post')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


Route::prefix('teachers')->middleware('role:teacher','auth')->name('teachers.')->group(function () {

    Route::get('/', [TeacherController::class, 'index'])->name('index');

    Route::get('/create', [TeacherController::class, 'create'])->name('create');

    Route::post('/', [TeacherController::class, 'store'])->name('store');

    Route::get('/{teacher}', [TeacherController::class, 'show'])->name('show');

    Route::get('/{teacher}/edit', [TeacherController::class, 'edit'])->name('edit');

    Route::put('/{teacher}', [TeacherController::class, 'update'])->name('update');

    Route::delete('/{teacher}', [TeacherController::class, 'destroy'])->name('destroy');
});



Route::prefix('students')->name('students.')->middleware(['role:student,teacher', 'auth'])->group(function () {

    Route::get('/', [StudentController::class, 'index'])->name('index');

    Route::get('/create', [StudentController::class, 'create'])->name('create');

    Route::post('/', [StudentController::class, 'store'])->name('store');

    Route::get('/{student}', [StudentController::class, 'show'])->name('show');

    Route::get('/{student}/edit', [StudentController::class, 'edit'])->name('edit');

    Route::put('/{student}', [StudentController::class, 'update'])->name('update');

    Route::delete('/{student}', [StudentController::class, 'destroy'])->name('destroy');
});


Route::prefix('classes')->middleware('role:teacher','auth')->name('classes.')->group(function () {

    Route::get('/', IndexController::class)->name('index');

    Route::get('/create', CreateController::class)->name('create');

    Route::post('/', StoreController::class)->name('store');

    Route::get('/{id}', ShowController::class)->name('show');

    Route::get('/{id}/edit', EditController::class)->name('edit');

    Route::put('/{id}', UpdateController::class)->name('update');

    Route::delete('/{id}', DestroyController::class)->name('destroy');
});



Route::resource('majors', MajorController::class)->middleware('role:teacher','auth');