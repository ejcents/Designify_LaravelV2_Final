<?php

use App\Http\Controllers\DesignController;

Route::get('/', [DesignController::class, 'index']);
Route::resource('designs', DesignController::class);

