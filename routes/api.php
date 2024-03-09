<?php

use App\Http\ApiV1\Modules\Users\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('user/{id}', [UserController::class, 'get']);
Route::post('user', [UserController::class, 'create']);
