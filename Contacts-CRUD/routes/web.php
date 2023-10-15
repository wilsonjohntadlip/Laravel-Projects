<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;

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


// Route::get()
// Route::post()
// Route::put()
// Route::patch()
// Route::delete()
// Route::options()

// Common Routes naming
// index - show all data or contacts
// show - show single data or contact
// create - show a from to add a new user
// store - store a data
// edit - show a form to edit a data
// update - update a data
// destroy - delete a data



Route::get('/', [ContactController::class, 'index'])->middleware('auth');

Route::get('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('userlogin', [UserController::class, 'userlogin']);

Route::post('/logout', [UserController::class, 'logout']);

Route::post('/store', [UserController::class, 'store']);



// // USER ROUTES
// Route::post('/register', [UserController::class, 'register']);


// // CONTACT ROUTES
// Route::get('/contact/{id}', [ContactController::class, 'show']);