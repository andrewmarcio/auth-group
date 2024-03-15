<?php

use Illuminate\Support\Facades\Route;
use Presentation\Controllers\SalesGroup\SalesGroupController;

Route::apiResource('sales-groups', SalesGroupController::class);
