<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Becil-Jobs Users Data
Route::post('/add-becil-userdetail','BecilUserProfileController@store');
Route::post('/add-becil-userqualification','BecilUserProfileController@addQualification');
Route::post('/add-becil-userexperince','BecilUserProfileController@addExperience');
Route::post('/add-becil-userdocs','BecilUserProfileController@addDocument');
