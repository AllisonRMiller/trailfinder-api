<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('search','SearchController@search');
Route::post('singleTrail','SearchController@singleTrail');
Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('addTrail', 'AuthController@addTrail');
Route::post('viewSaved', 'AuthController@viewSaved');


Route::middleware('auth:api')->group(function() {
    Route::post('logout', 'AuthController@logout');
    
    Route::get('user/{userId}/detail', 'UserController@show');
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
