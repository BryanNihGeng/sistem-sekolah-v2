<?php

use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MajorController;

use App\Http\Controllers\SchoolClass\IndexController as SchoolClassIndexController;
use App\Http\Controllers\SchoolClass\CreateController as SchoolClassCreateController;
use App\Http\Controllers\SchoolClass\StoreController as SchoolClassStoreController;
use App\Http\Controllers\SchoolClass\ShowController as SchoolClassShowController;
use App\Http\Controllers\SchoolClass\EditController as SchoolClassEditController;
use App\Http\Controllers\SchoolClass\UpdateController as SchoolClassUpdateController;
use App\Http\Controllers\SchoolClass\DestroyController as SchoolClassDestroyController;

Route::get('/', function () {
    return view('welcome');
});

// Authentication
Route::get('/login', [AuthController::class, 'loginView'])->name('login-view')->middleware('guest');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login-post')->middleware('guest');
Route::get('/register', [AuthController::class, 'registerView'])->name('register-view')->middleware('guest');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register-post')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


Route::name('teachers.')->middleware(['role:teacher', 'auth'])->prefix('teachers')->group(function () {

    Route::get('/', [TeacherController::class, 'index'])->name('index');

    Route::get('/{id}', [TeacherController::class, 'show'])->name('show')->whereNumber('id');

    Route::get('/create', [TeacherController::class, 'create'])->name('create');

    Route::get('/{id}/edit', [TeacherController::class, 'edit'])->name('edit');

    Route::post('/', [TeacherController::class, 'store'])->name('store');

    Route::put('/{id}', [TeacherController::class, 'update'])->name('update');

    Route::delete('/{id}', [TeacherController::class, 'destroy'])->name('destroy');
});

Route::name('students.')->middleware(['role:teacher,student', 'auth'])->prefix('students')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('index');
    Route::get('/create', [StudentController::class, 'create'])->name('create');
    Route::post('/', [StudentController::class, 'store'])->name('store');
    Route::get('/{student}', [StudentController::class, 'show'])->name('show');
    Route::get('/{student}/edit', [StudentController::class, 'edit'])->name('edit');
    Route::put('/{student}', [StudentController::class, 'update'])->name('update');
    Route::delete('/{student}', [StudentController::class, 'destroy'])->name('destroy');
});

Route::name('classes.')->middleware(['role:teacher', 'auth'])->prefix('classes')->group(function () {
    Route::get('/', SchoolClassIndexController::class)->name('index');
    Route::get('/create', SchoolClassCreateController::class)->name('create');
    Route::post('/', SchoolClassStoreController::class)->name('store');
    Route::get('/{id}', SchoolClassShowController::class)->name('show');
    Route::get('/{id}/edit', SchoolClassEditController::class)->name('edit');
    Route::put('/{id}', SchoolClassUpdateController::class)->name('update');
    Route::delete('/{id}', SchoolClassDestroyController::class)->name('destroy');
});

Route::resource('majors', MajorController::class)->middleware(['role:teacher', 'auth']);
