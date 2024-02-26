<?php

use Illuminate\Support\Facades\Route;
use Presentation\Controllers\Establishment\EstablishmentController;

Route::prefix('establishments')->group(function () {
    Route::apiResource('/', EstablishmentController::class)->parameters([
        "" => "id",
    ]);
});
