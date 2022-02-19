<?php

use App\Http\Controllers\Api\LojaController;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource("login", LoginController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource("user", UserController::class);
    Route::apiResource("loja", LojaController::class);
    Route::apiResource("produto", ProdutoController::class);
});
