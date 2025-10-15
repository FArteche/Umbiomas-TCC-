<?php

use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\BiomaController;

Route::prefix('v1')->group(function () {
    Route::get('biomas', [BiomaController::class, 'index']);
    Route::get('biomas/{bioma}', [BiomaController::class, 'show']);
});
