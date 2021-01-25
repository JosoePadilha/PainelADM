<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

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


Route::get('/', [loginController::class, 'index'])->name('/');
Route::post('/login', [loginController::class, 'login'])->name('login');
Route::get('/forgetPassword', [loginController::class, 'forgetPassword'])->name('forgetPassword');

Route::middleware(['auth'])->group(function(){
    Route::middleware(['CheckAdm'])->group(function(){
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
        Route::get('/createdCollaborator', [UserController::class, 'create'])->name('createdCollaborator');
        Route::get('/showCollaborator', [UserController::class, 'showCollaborator'])->name('showCollaborator');
        Route::get('/destroyCollaborator/{id}', [UserController::class, 'destroy'])->name('destroyCollaborator');
        Route::get('/editCollaborator/{id}', [UserController::class, 'edit'])->name('editCollaborator');
        Route::post('/collaboratorStore', [UserController::class, 'store'])->name('collaboratorStore');
        Route::put('/collaboratorEdit/{id}', [UserController::class, 'update'])->name('collaboratorEdit');
        Route::any('/searchCollaborator', [UserController::class, 'searchCollaborator'])->name('searchCollaborator');
    });
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});
