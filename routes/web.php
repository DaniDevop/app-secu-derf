<?php

use App\Http\Controllers\AffectationController;
use App\Http\Controllers\AgentStagiareController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


Route::get('',[UsersController::class,'loginPage'])->name('login.user');

// Services


Route::post('/users/doLogin',[UsersController::class,'doLogin'])->name('users.Login');
 
Route::middleware([ 'user.auth'])->group(function () {
    Route::get('/dashboard', fn() => 'Welcome!');
    Route::get('/users/admin/',[UsersController::class,'dashboard'])->name('users.dashboard');  
    Route::get('/users/admin/ecole',[UsersController::class,'ecoleView'])->name('users.dashboard.ecole');  
    
    
    
    
    
    
    Route::post('/users/addEcole',[UsersController::class,'addEcole'])->name('users.addEcole');
    Route::get('/users/admin/ecole/modif/{id}',[UsersController::class,'editEcole'])->name('users.ecole.modif');  
    Route::post('/users/EditEcole',[UsersController::class,'editEcolePost'])->name('editEcole.Poste');
    Route::get('/users/admin/services',[ServiceController::class,'ServicesView'])->name('users.ServicesView');  
    Route::post('/users/admin/addservices',[ServiceController::class,'addservice'])->name('addservice.users');  
    Route::get('/users/admin/services/modif/{id}',[ServiceController::class,'editServices'])->name('users.services.editServices');  
    Route::post('/users/admin/Modificationservices',[ServiceController::class,'editServicesPost'])->name('editServicesPost.users');
    // Stagiare
    
    
    Route::get('/users/admin/stagiare',[AgentStagiareController::class,'index'])->name('users.agent.index');  
    Route::post('/users/admin/stagiare/addStagiare',[AgentStagiareController::class,'addAgentStagiare'])->name('users.addAgent.Stagiare');  
    Route::get('/users/admin/stagiare/edit/{id}',[AgentStagiareController::class,'editAgentStagiare'])->name('users.editAgentStagiare');  
    Route::post('/users/admin/stagiare/EditAgent',[AgentStagiareController::class,'EditAgentStagiareModif'])->name('users.EditgentStagiare');
    
    // Affectation 
    
    Route::get('/users/admin/affection/agent',[AffectationController::class,'index'])->name('users.affectation.agent');  
    Route::post('/users/admin/affection/agent/ecole',[AffectationController::class,'addAffectation'])->name('users.affectation.addAffectation');  
    Route::get('/users/admin/affection/agent{edit}',[AffectationController::class,'editAffectation'])->name('users.editAffectationt.agent');  
    
    Route::post('/users/admin/affection/agent/ecole/edit',[AffectationController::class,'EditAffectationAgent'])->name('users.EditAffectation.Agent');  
});




