<?php
use Modules\User\Http\Controllers\UserController;

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

// Route::prefix('user')->group(function() {
//     Route::get('/', 'UserController@index');
//     Route::resource('/',UserController::class);
//     Route::get('/', 'UserController@edit');
// });

Route::resource('/user',UserController::class);
// Route::get('/user/edit/{id}','UserController@destroy');
// Route::delete('/resource/{id}', 'ResourceController@destroy')->name('resource.destroy');
// Route::delete('/users/{id}', 'UserController@destroy');

