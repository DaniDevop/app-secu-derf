<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


Route::get('',[UsersController::class,'loginPage'])->name('login.user');
Route::post('/users/doLogin',[UsersController::class,'doLogin'])->name('users.Login');
Route::get('/users/admin/',[UsersController::class,'dashboard'])->name('users.dashboard');  