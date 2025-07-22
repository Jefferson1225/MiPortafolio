<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\SkillController;
use App\Http\Controllers\Api\ContactInfoController;
use App\Http\Controllers\Api\SettingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas públicas (para mostrar en el portafolio)
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{project}', [ProjectController::class, 'show']);
Route::get('/skills', [SkillController::class, 'index']);
Route::get('/contact-info', [ContactInfoController::class, 'index']);
Route::get('/settings', [SettingController::class, 'index']);

// Rutas protegidas (para el admin panel)
Route::middleware('auth')->group(function () {
    // Projects CRUD completo
    Route::post('/projects', [ProjectController::class, 'store']);
    Route::put('/projects/{project}', [ProjectController::class, 'update']);
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy']);
    
    // Skills CRUD completo
    Route::post('/skills', [SkillController::class, 'store']);
    Route::get('/skills/{skill}', [SkillController::class, 'show']);
    Route::put('/skills/{skill}', [SkillController::class, 'update']);
    Route::delete('/skills/{skill}', [SkillController::class, 'destroy']);
    
    // Contact Info CRUD completo
    Route::post('/contact-info', [ContactInfoController::class, 'store']);
    Route::get('/contact-info/{contactInfo}', [ContactInfoController::class, 'show']);
    Route::put('/contact-info/{contactInfo}', [ContactInfoController::class, 'update']);
    Route::delete('/contact-info/{contactInfo}', [ContactInfoController::class, 'destroy']);
    
    // Settings CRUD completo
    Route::post('/settings', [SettingController::class, 'store']);
    Route::get('/settings/{setting}', [SettingController::class, 'show']);
    Route::put('/settings/{setting}', [SettingController::class, 'update']);
    Route::delete('/settings/{setting}', [SettingController::class, 'destroy']);
});