<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Main landing page route (will be handled by frontend)
Route::get('/', function () {
    return view('landing');
});

// Admin panel routes
Route::prefix('admin')->group(function () {
    Route::get('/login', function () {
        return view('admin-login');
    });
    
    Route::get('/{any}', function () {
        return view('admin');
    })->where('any', '.*');
});

// Catch-all route for SPA frontend
Route::get('/{any}', function () {
    return view('landing');
})->where('any', '^(?!api|admin).*$');
