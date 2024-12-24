<?php

use App\Http\Controllers\Api\DniLetterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/dniCalculator', [DniLetterController::class, 'index'])->name('index');