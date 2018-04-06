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


Route::get('/site', 'Api\Version1\HomeController@index')->name('site-index');

Route::post('/site', 'Api\Version1\HomeController@siteSearch');

Route::post('/product-enquiry', 'Api\Version1\HomeController@productEnquiry');

Route::get('/register', 'Api\Version1\HomeController@register')->name('register');
Route::post('/register', 'Api\Version1\HomeController@createUser');

Route::get('/site/product-detail/{id}', 'Api\Version1\HomeController@productDetail')->name('site-product-detail');
