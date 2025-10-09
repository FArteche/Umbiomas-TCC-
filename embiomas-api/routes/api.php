<?php

use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('v1/login', [AuthController::class, 'login']);

Route::middleware('auth:sacntum')->group(function () {
    Route::post('v1/logout', [AuthController::class, 'logout']);
    Route::get('v1/user', function (Request $request) {
        return $request->user();
    });
});
