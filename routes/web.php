<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

// Membuat route sesuai dengan controller yang kita gunakan
// Route berikut dapat mendeklarasikan beberapa route resource 
// seperti create, show, update, delete dan lain-lain 
// yang ada di controller yang kita panggil
Route::resource('/post', PostController::class);