<?php

use App\Http\Controllers\MajorController;
use App\Http\Controllers\SchoolClass\IndexController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Manajemen Siswa


Route::name('students.')->prefix('students')->group(function() {
    // Haalaman daftar siswa (Action)
    Route::get('/', [StudentController::class, 'index'])->name('index');
    
    Route::get('/{id}', function(string $id) {
        return "Menampilkan detail siswa dengan ID: {$id}";
    })->name('show');
});

// Manajemen Kelas
Route::name('classes.')->prefix('classes')->group(function() {
    // Haalaman daftar siswa (Invoke)
    Route::get('/', IndexController::class)->name('index');
    
    Route::get('/{id}', function(string $id) {
        return "Menampilkan detail siswa dengan ID: {$id}";
    })->name('show');
});


// Manajemen Jurusan (Resource)
Route::resource('majors', MajorController::class);