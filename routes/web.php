<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


Route::get('',[UsersController::class,'loginPage'])->name('login.user');
Route::post('/users/doLogin',[UsersController::class,'doLogin'])->name('users.Login');
Route::get('/users/admin/',[UsersController::class,'dashboard'])->name('users.dashboard');  
Route::get('/users/admin/ecole',[UsersController::class,'ecoleView'])->name('users.dashboard.ecole');  




Route::post('/users/addEcole',[UsersController::class,'addEcole'])->name('users.addEcole');
Route::get('/users/admin/ecole/modif/{id}',[UsersController::class,'editEcole'])->name('users.ecole.modif');  
Route::post('/users/EditEcole',[UsersController::class,'editEcolePost'])->name('editEcole.Poste');
