<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('todo', TodoController::class);

Route::get('/config-clear', function() {
    Artisan::call('config:clear');
    return "Cache is cleared";
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/view-clear', function() {
    Artisan::call('view:clear');
    return "Cache is cleared";
});

Route::get('/route-clear', function() {
    Artisan::call('route:clear');
    return "Cache is cleared";
});
