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
    return view('welcome');
}
);

Route::get('/lecturer', ['uses' => 'Admin\LecturerCrudController@publicIndex']);
Route::post('/submitLogin', ['uses' => 'Admin\LecturerCrudController@login']);
Route::get('/logout', ['uses' => 'Admin\LecturerCrudController@logout']);
Route::get('/lectureradd', ['uses' => 'Admin\LecturerCrudController@lectureradd']);
Route::post('/lectureraddsave', ['uses' => 'Admin\LecturerCrudController@lectureraddsave']);



