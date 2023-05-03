<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/departments', function () {
    return view('pages.departments');
})->name('pages.dept');
Route::get('/doctors', function () {
    return view('pages.doctors');
})->name('pages.doctors');
Route::get('/contact', function () {
    return view('pages.contact');
})->name('pages.contact');
Route::get('/login', function () {
    return view('pages.login');
})->name('pages.login');
