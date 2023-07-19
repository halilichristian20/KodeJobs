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

//Common Resource Routes/Naming
//index - Show all data -> listings || Route::get();
//show - Show single data -> listing || Route::get();
//create - Show form to create new -> listing  || Route::get();
//store - Store data -> new listing || Route::post()
//edit - show form to edit data 
//update - Update data -> listing || Route::put(); Route::patch();
//destroy - Delete a data -> listing     Route::delete();

//All listings
Route::get('/', [ListingController::class, 'index']);

//Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

//Store Listing data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

//Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Manage Listings
Route::get("/listings/manage", [ListingController::class, "manage"])->middleware("auth");

//Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Create New User
Route::post('/users', [UserController::class, 'store']);

//Log out User
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Show login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Log in User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);



//Common Resource Routes/Naming
//index - Show all data -> listings || Route::get();
//show - Show single data -> listing || Route::get();
//create - Show form to create new -> listing || Route::get();
//store - Store data -> new listing || Route::post();
//edit - Show form to edit data || Route::put();, Route::patch();
//update - Updating data -> listing
//destroy - Delete a data -> listing || Route::delete();