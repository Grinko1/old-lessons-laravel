<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;





Auth::routes();

Route::get('{page}', 'IndexController')->where('page', '.*');
