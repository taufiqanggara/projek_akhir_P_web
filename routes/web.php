<?php

use App\Http\Controllers\mahasiswacontroler;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

// Route::get('/', function () {return view('welcome');});

// sudah berfungsi untuk tampil pasword dan layar utama

Route::get('/',[LoginController::class,'showLoginForm'])->name('loginadmin');
Route::get('login',[LoginController::class,'showLoginForm'])->name('loginadmin');

Route::post('loginproses',[LoginController::class,'login'])->name('loginadmin2');



Route::resource('mahasiswa',mahasiswacontroler::class);


