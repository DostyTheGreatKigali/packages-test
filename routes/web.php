<?php

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

use App\Http\Controllers\UsersController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('users', 'UsersController@index');
Route::get('users-list', 'UsersController@usersList');

Route::get('users', [UsersController::class, 'index']);
Route::get('users-list', [UsersController::class, 'usersList']);

