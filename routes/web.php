<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CLientController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FamilyProductController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ResetPasswordController;

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
Route::get('/forgetPassword', [ResetPasswordController::class, 'forgetPassword'])->name('forgetPassword');
Route::post('/sendMailReset', [ResetPasswordController::class, 'sendMailReset'])->name('sendMailReset');

Route::get('/resetPassword/{token}/{email}', [ResetPasswordController::class, 'resetPassword'])->name('resetPassword');
Route::post('/resetPasswordUser/{user}', [ResetPasswordController::class, 'resetPasswordUser'])->name('resetPasswordUser');

//Route::get('/resetPassword', [loginController::class, 'resetPassword'])->name('resetPassword');

Route::middleware(['auth'])->group(function(){
    Route::middleware(['CheckAdm'])->group(function(){
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

        //Collaborators
        Route::get('/createdCollaborator', [UserController::class, 'create'])->name('createdCollaborator');
        Route::get('/showCollaborator', [UserController::class, 'showCollaborator'])->name('showCollaborator');
        Route::get('/destroyCollaborator/{id}', [UserController::class, 'destroy'])->name('destroyCollaborator');
        Route::get('/editCollaborator/{id}', [UserController::class, 'edit'])->name('editCollaborator');
        Route::post('/collaboratorStore', [UserController::class, 'store'])->name('collaboratorStore');
        Route::put('/collaboratorEdit/{id}', [UserController::class, 'update'])->name('collaboratorEdit');
        Route::get('/seeCollaborator/{id}', [UserController::class, 'seeCollaborator'])->name('seeCollaborator');
        Route::any('/searchCollaborator', [UserController::class, 'searchCollaborator'])->name('searchCollaborator');

        //Clients
        Route::get('/createdClient', [CLientController::class, 'create'])->name('createdClient');
        Route::post('/clientStore', [CLientController::class, 'store'])->name('clientStore');
        Route::get('/showClients', [ClientController::class, 'showClients'])->name('showClients');
        Route::any('/searchClient', [ClientController::class, 'searchClient'])->name('searchClient');
        Route::get('/editClient/{id}', [ClientController::class, 'edit'])->name('editClient');
        Route::put('/clientEdit/{id}', [ClientController::class, 'update'])->name('clientEdit');
        Route::get('/destroyClient/{id}', [ClientController::class, 'destroy'])->name('destroyClient');
        Route::get('/seeClient/{id}', [ClientController::class, 'seeClient'])->name('seeClient');

        //Documents
        Route::get('/showClientDocument', [ClientController::class, 'viewClientDocument'])->name('showClientDocument');
        Route::any('/searchClientsActive', [ClientController::class, 'clientActive'])->name('searchClientsActive');
        Route::get('/formDocument/{id}', [DocumentController::class, 'index'])->name('formDocument');
        Route::post('/documentStore/{idClient}', [DocumentController::class, 'store'])->name('documentStore');
        Route::get('/download/{link}', [DocumentController::class, 'download'])->name('download');
        Route::get('/destroyDocument/{id}', [DocumentController::class, 'destroy'])->name('destroyDocument');
        Route::get('/showDocumentsVanquished', [DocumentController::class, 'showDocumentsVanquished'])->name('showDocumentsVanquished');
        Route::any('/searchClientsActiveDocument', [DocumentController::class, 'searchClientsActiveDocument'])->name('searchClientsActiveDocument');

        //FamilyProducts
        Route::get('/createFamily', [FamilyProductController::class, 'create'])->name('createFamily');
        Route::post('/storeFamily', [FamilyProductController::class, 'store'])->name('storeFamily');
        Route::get('/showFamily', [FamilyProductController::class, 'show'])->name('showFamily');
        Route::get('/destroyFamily/{id}', [FamilyProductController::class, 'destroy'])->name('destroyFamily');
        Route::get('/editFamily/{id}', [FamilyProductController::class, 'edit'])->name('editFamily');
        Route::put('/familyEdit/{id}', [FamilyProductController::class, 'update'])->name('familyEdit');
        Route::any('/searchFamily', [FamilyProductController::class, 'searchFamily'])->name('searchFamily');

        //Products
        Route::get('createProduct', [ProductsController::class, 'create'])->name('createProduct');
        Route::post('/storeProduct', [ProductsController::class, 'store'])->name('storeProduct');
        Route::get('/showProducts', [ProductsController::class, 'showProductsFamily'])->name('showProducts');
        Route::get('/destroyProduct/{id}', [ProductsController::class, 'destroy'])->name('destroyProduct');
        Route::get('/editProduct/{id}', [ProductsController::class, 'edit'])->name('editProduct');
        Route::put('/productEdit/{id}', [ProductsController::class, 'update'])->name('productEdit');
        Route::any('/searchProduct', [ProductsController::class, 'searchProduct'])->name('searchProduct');
        // Route::get('/editDocument/{idUser}/{idDocument}', function($idUser, $idDocument){
        //     return [DocumentController::class, 'edit', compact($idUser, $idDocument)];
        // });
    });
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
