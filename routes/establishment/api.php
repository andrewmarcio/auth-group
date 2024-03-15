<?php

use Illuminate\Support\Facades\Route;
use Presentation\Controllers\Establishment\EstablishmentController;

Route::apiResource('establishments', EstablishmentController::class);
