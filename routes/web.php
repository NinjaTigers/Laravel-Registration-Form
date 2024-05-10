<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocaleController;

Route::get('/', function () {
        return view('welcome');
    })->middleware('setLocale');

Route::post('/register', [UserController::class, 'register']);

Route::get('/{lang}', [LocaleController::class,'locale']);