<?php

use Illuminate\Support\Facades\Route;
use Presentation\Controllers\Organization\OrganizationController;

Route::apiResource('organizations', OrganizationController::class);
