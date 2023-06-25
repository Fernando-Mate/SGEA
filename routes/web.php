<?php

use App\Http\Controllers\EscalaController;
use App\Http\Controllers\UserController;
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

//ROUTAS DO USER
Route::post('/addFuncionario', [UserController::class, 'storeFuncionario'])->name('addFuncionario');
Route::post('/addAdmin', [UserController::class, 'storeAdmin'])->name('addAdmin');
Route::get('/funcionario', [UserController::class, 'index'])->name('funcionario');
Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('deleteUser');
Route::put('/update/{id}', [UserController::class, 'update'])->name('updateUser');

//ROUTAS DAS ESCALAS
Route::post('/addEscala', [EscalaController::class, 'storeEscala'])->name('addEscala');
Route::put('/update', [EscalaController::class, 'update'])->name('updateEscala');

//Alocação
Route::post('/usuarios/{usuario}/departamentos/add', [UserController::class, 'addToEscala'])->name('usuarios.departamentos.add');
Route::post('/usuarios/{usuario}/departamentos/remove', [UserController::class, 'removeFromEscala'])->name('usuarios.departamentos.remove');
