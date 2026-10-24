<?php

use App\Http\Controllers\BaleController;
use Illuminate\Support\Facades\Route;

Route::prefix('bale')->post('/', BaleController::class);
