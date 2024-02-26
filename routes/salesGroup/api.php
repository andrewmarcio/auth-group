<?php

use Illuminate\Support\Facades\Route;
use Presentation\Controllers\SalesGroup\SalesGroupController;

Route::prefix('sales-groups')->group(function () {
    Route::apiResource('/', SalesGroupController::class)->parameters([
        "" => "id",
    ]);
});
