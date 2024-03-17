<?php

use App\Http\Controllers\AbsenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/create', [AbsenController::class, 'create']);
Route::get('/send', [AbsenController::class, 'sendMessage']);
