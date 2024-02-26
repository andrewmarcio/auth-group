<?php

use Illuminate\Support\Facades\Route;
use Presentation\Controllers\Organization\OrganizationController;

Route::prefix('organizations')->group(function () {
    Route::apiResource('/', OrganizationController::class)->parameters([
        "" => "id",
    ]);
});
