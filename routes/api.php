<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController; // import the BlogController
// public routes
Route::get('/blogs', [BlogController::class, 'index']); // in BlogController, call the index method