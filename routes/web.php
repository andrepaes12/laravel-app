<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// rota para o relacionamento User::Address
Route::resource('users', UserController::class);
Route::resource('addresses', AddressController::class);
Route::resource('posts', PostController::class);
Route::resource('categories', CategoryController::class);
Route::resource('mails', MailController::class);

Route::get('/', function () {
    return view('welcome');
});
