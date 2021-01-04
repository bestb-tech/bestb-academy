<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;


Route::get('{path}', HomeController::class)->where('path', '(.*)');
