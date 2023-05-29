<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
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
// Route::get('/departments', [DepartmentController::class, 'index'])->name('pages.dept');
// Route::get('/doctors', [DoctorController::class, 'index'])->name('pages.doctors');
Route::get('/contact', function () {
    return view('pages.contact');
})->name('pages.contact');
Route::get('/login', function () {
    return view('pages.login');
})->name('pages.login');


Route::resource('doctors', DoctorController::class)->names([
    'index' => 'doctors.index',
    'create' => 'doctors.create',
    'store' => 'doctors.store',
    'show' => 'doctors.show',
    'edit' => 'doctors.edit',
    'update' => 'doctors.update',
    'destroy' => 'doctors.destroy',
]);;
Route::resource('departments', DepartmentController::class)->names([
    'index' => 'dept.index',
    'create' => 'dept.create',
    'store' => 'dept.store',
    'show' => 'dept.show',
    'edit' => 'dept.edit',
    'update' => 'dept.update',
    'destroy' => 'dept.destroy',
]);;
