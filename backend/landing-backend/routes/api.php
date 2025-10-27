<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Api\LandingPageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SettingsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public API routes for frontend
Route::prefix('v1')->group(function () {
    // Landing page data
    Route::get('/landing/sections', [LandingPageController::class, 'getSections']);
    Route::get('/landing/settings', [LandingPageController::class, 'getSettings']);
    Route::get('/landing/full', [LandingPageController::class, 'getFullPage']);
    Route::post('/contact', [LandingPageController::class, 'contact']);
    
    // Authentication routes
    Route::post('/auth/login', [AuthController::class, 'login']);
    Route::post('/auth/register', [AuthController::class, 'register']);
});

// Protected admin routes
Route::prefix('v1/admin')->middleware('auth:sanctum')->group(function () {
    // Authentication
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::get('/auth/user', [AuthController::class, 'user']);
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/overview', [DashboardController::class, 'overview']);
    
    // Sections management
    Route::apiResource('sections', SectionController::class);
    Route::post('/sections/reorder', [SectionController::class, 'updateOrder']);
    
    // Settings management
    Route::get('/settings', [SettingsController::class, 'index']);
    Route::post('/settings', [SettingsController::class, 'store']);
    Route::put('/settings/{setting}', [SettingsController::class, 'update']);
    Route::delete('/settings/{setting}', [SettingsController::class, 'destroy']);
    Route::post('/settings/bulk-update', [SettingsController::class, 'bulkUpdate']);
    Route::get('/settings/group/{group}', [SettingsController::class, 'getByGroup']);
    Route::post('/settings/initialize', [SettingsController::class, 'initializeDefaultSettings']);
});

// Fallback route for SPA
Route::fallback(function () {
    return response()->json([
        'success' => false,
        'message' => 'API route not found'
    ], 404);
});