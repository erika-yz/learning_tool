<?php

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\RoleController;
// use App\Http\Controllers\TopicController;


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

Route::get('/dashboard', function () {
     return view('dashboard');
 })->middleware(['auth'])->name('dashboard');

  Route::group(['middleware' => ['auth']], function() {
      Route::resource('/roles', 'App\Http\Controllers\RoleController');
      Route::resource('/users','App\Http\Controllers\UserController');
      Route::resource('/topics','App\Http\Controllers\TopicController');
  });

require __DIR__.'/auth.php';
