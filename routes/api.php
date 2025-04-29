<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController; // import the BlogController
// public routes
Route::get('/blogs', [BlogController::class, 'index']); // in BlogController, call the index method
Route::post('/add-blog', [BlogController::class, 'store']);
// Get a specific blog by ID
Route::get('/blog/{id}', [BlogController::class, 'show']);
// Update a specific blog
Route::post('/update-blog', [BlogController::class, 'update']);
// Delete a specific blog
Route::post('/delete-blog', [BlogController::class, 'destroy']);
