<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RoutineController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AppointmentController;

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

Route::get('/', [HomeController::class, 'index'])->name('pages.home');
Route::get('/departments', [HomeController::class, 'depts'])->name('pages.dept');
Route::get('/schedules', [HomeController::class, 'schedules'])->name('pages.schedules');
Route::get('/routines', [HomeController::class, 'routines'])->name('pages.routines');
Route::get('/appointments', [HomeController::class, 'appointments'])->name('pages.appointments');
Route::get('/doctors', [HomeController::class, 'doctors'])->name('pages.doc');
Route::get('/contact', function () {
    return view('pages.contact');
})->name('pages.contact');
Route::get('/about', function () {
    return view('pages.about');
})->name('pages.about');
Route::get('/shop', function () {
    return view('pages.shop');
})->name('pages.shop');

Route::post('/search',[HomeController::class, 'search'])->name('search');
Route::post('/search_date',[HomeController::class, 'search_date'])->name('search.date');
Route::get('/home1', function(){
    return view('home1');
});
// Route::post('/authenticate', [UserController::class, 'authenticate'])->name('login');


Route::prefix('admin')->name('admin.')->middleware(['auth','user-role:admin'])->group(function(){
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });

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
        Route::get('/create', [ScheduleController::class, 'create'])->name('schedule.create');
        Route::post('/store', [ScheduleController::class, 'store'])->name('schedule.store');
        Route::get('/edit/{schedule}', [ScheduleController::class, 'edit'])->name('schedule.edit');
        Route::put('/update/{schedule}', [ScheduleController::class, 'update'])->name('schedule.update');
        Route::delete('/delete/{schedule}', [ScheduleController::class, 'destroy'])->name('schedule.destroy');
        Route::get('/appointments/{id}', [ScheduleController::class, 'view_appointments'])->name('schedule.appointments');
    });

    Route::prefix('routine')->group(function() {
        Route::get('/', [RoutineController::class, 'index'])->name('routine.index');
        Route::get('/create', [RoutineController::class, 'create'])->name('routine.create');
        Route::post('/store', [RoutineController::class, 'store'])->name('routine.store');
        Route::get('/edit/{routine}', [RoutineController::class, 'edit'])->name('routine.edit');
        Route::put('/update/{routine}', [RoutineController::class, 'update'])->name('routine.update');
        Route::delete('/delete/{routine}', [RoutineController::class, 'destroy'])->name('routine.destroy');
    });

    Route::resource('appointments', AppointmentController::class)->names([
        'index' => 'appointment.index',
        'create' => 'appointment.create',
        'store' => 'appointment.store',
        'show' => 'appointment.show',
        'edit' => 'appointment.edit',
        'update' => 'appointment.update',
        'destroy' => 'appointment.destroy',
    ]);
    Route::post('/appointments/{id}/cancel', [AppointmentController::class, 'cancel'])->name('appointment.cancel');

    Route::prefix('bookings')->name('bookings.')->group(function(){
        Route::get('/bookings', [BookingController::class, 'index'])->name('index');
    });

    Route::resource('patients', PatientController::class);
});

// Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
