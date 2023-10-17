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

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//Routes for cards
Route::get('/cards', '\App\Http\Controllers\CardController@show')->name('cards.show');
Route::post('/cards', '\App\Http\Controllers\CardController@create')->name('cards.create');
Route::get('/card/{id}', '\App\Http\Controllers\CardController@showOne')->name('cards.showOne');
Route::post('/card/{id}', '\App\Http\Controllers\CardController@update')->name('cards.update');
Route::delete('/delete/card/{id}', '\App\Http\Controllers\CardController@delete')->name('cards.delete');
//Route::post('/cards-endpoint', '');


//Routes for tests
Route::get('/tests', '\App\Http\Controllers\TestController@show')->name('tests.show');
Route::post('/tests', '\App\Http\Controllers\TestController@save')->name('tests.save');
Route::get('/tests/{category}', '\App\Http\Controllers\TestController@showOne')->name('tests.showOne');

//Routes for projects
Route::get('/projects', '\App\Http\Controllers\ProjectController@show')->name('projects.show');
Route::post('/projects', '\App\Http\Controllers\ProjectController@create')->name('projects.save');
Route::get('/project/{id}', '\App\Http\Controllers\ProjectController@showOne')->name('projects.showOne');
Route::delete('/delete/project/{id}', '\App\Http\Controllers\ProjectController@delete')->name('projects.delete');
Route::post('/project/{id}', '\App\Http\Controllers\ProjectController@update')->name('projects.update');