<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\orangTuaController;
use App\Http\Controllers\StudentListController;
use App\Http\Controllers\TeacherListController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return redirect()->route('register');
});
Route::get('/students', [FrontendController::class, 'students'])->name('students');
// route::inertia('/kelas', 'frontend/Kelas') ->name('kelas');

route::middleware('auth')->group(function(){
    route::resource('siswa', SiswaController::class);
    route::resource('kelas', KelasController::class);
    route::resource('guru', GuruController::class);
    route::resource('list', ListController::class);
    route::resource('studentList', StudentListController::class);
    route::resource('teacherList', TeacherListController::class);
    route::resource('orangTua', orangTuaController::class);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
