<?php

use App\Http\Controllers\Organization\OrganizationController;
use Illuminate\Support\Facades\Route;

Route::prefix('organizations')->group(function () {
    Route::apiResource('/', OrganizationController::class)->parameters([
        "" => "id",
    ]);
});
