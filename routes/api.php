<?php

use App\Http\Controllers\cadastroController;
use App\Http\Controllers\NotaFiscalController;
use App\Http\Controllers\testesController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// endpoint cadastro
Route::prefix('/user')->group(function () {
    Route::post('cadastro', [UserController::class, 'create']);
});

// endpoint CRUD notas fiscais
Route::prefix('/nota')->group(function () {
    Route::post('criar', [NotaFiscalController::class, 'create'])->middleware('auth.basic');
});
