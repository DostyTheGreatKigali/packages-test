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
use App\Http\Controllers\CountdownController;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('users', 'UsersController@index');
// Route::get('users-list', 'UsersController@usersList');

Route::get('users', [UsersController::class, 'index']);
Route::get('users-list', [UsersController::class, 'usersList']);

Route::get('countdown', [CountdownController::class, 'index']);

Route::get('users-editable', [UsersController::class, 'index_for_editables']);

Route::post('users-update', [UsersController::class, 'update']);

Route::get('users-modal', [UsersController::class, 'getModalWithForm']);
Route::post('users-modal', [UsersController::class, 'postFromModal']);


Route::get('users-custom-paginate', [UsersController::class, 'paginateData']);
// Route::post('users-modal', [UsersController::class, 'postFromModal']);




