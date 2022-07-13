<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new Listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update Listing
// destroy - Delete Listing

// All listings
Route::get('/', [ListingController::class, 'index']);

// Show crate form
/**
 * static similar structured routing should right first otherwise it will bring 404
 */
//Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store Listing Data
//Route::post('/listings', [ListingController::class, 'store']);

// Show Edit Form
//Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update listing
//Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete listing
//Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Route middleware group
Route::middleware(['auth'])->group(function () {
    Route::get('/listings/create', [ListingController::class, 'create']);
    Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);
    Route::post('/listings', [ListingController::class, 'store']);
    Route::put('/listings/{listing}', [ListingController::class, 'update']);
    Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);
});

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Single listings
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show Register create form
// We can use again middleware group but it's focus on both practice
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create new user
Route::post('/users', [UserController::class, 'store']);

// Log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);







