<?php

use App\Http\Controllers\SalesGroup\SalesGroupController;
use Illuminate\Support\Facades\Route;

Route::prefix('sales-groups')->group(function () {
    Route::apiResource('/', SalesGroupController::class)->parameters([
        "" => "id",
    ]);
});
