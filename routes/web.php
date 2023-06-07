<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DepartmentController;

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
    return view('pages.home');
})->name('pages.home');
Route::get('/departments', [DepartmentController::class, 'index'])->name('pages.dept');
Route::get('/doctors', [DoctorController::class, 'index'])->name('pages.doc');
Route::get('/contact', function () {
    return view('pages.contact');
})->name('pages.contact');
Route::get('/login', function () {
    return view('pages.login');
})->name('pages.login');
Route::post('/authenticate', [UserController::class, 'authenticate'])->name('login');


Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::resource('doctors', DoctorController::class)->names([
        'index' => 'doctor.index',
        'create' => 'doctor.create',
        'store' => 'doctor.store',
        'show' => 'doctor.show',
        'edit' => 'doctor.edit',
        'update' => 'doctor.update',
        'destroy' => 'doctor.destroy',
    ]);

    Route::resource('departments', DepartmentController::class)->names([
        'index' => 'department.index',
        'create' => 'department.create',
        'store' => 'department.store',
        'show' => 'department.show',
        'edit' => 'department.edit',
        'update' => 'department.update',
        'destroy' => 'department.destroy',
    ]);

    Route::prefix('schedules')->group(function() {
        Route::get('/', [ScheduleController::class, 'index'])->name('schedule.index');

    });

    
});

Route::post('/logout', [UserController::class, 'logout'])->name('logout');