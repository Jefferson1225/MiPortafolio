<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Project;
use App\Http\Controllers\API\ProjectController;

Route::get('/', function () {
    return Inertia::render('Portafolio');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');




require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
