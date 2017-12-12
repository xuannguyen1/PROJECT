<?php

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

Route::get('/','IndexController@index');
//*********************************************project******************************************

Route::get('/Home','IndexController@index');
Route::get('/Login','LoginController@getLogin');

Route::post('/Login','LoginController@postLogin');
Route::get('/Logout','LoginController@getLogout');	
Route::get('/child/{id}','ChildController@show');
Route::post('/Register','RegistrationController@postRegister');
Route::get('/Register','RegistrationController@getRegister');
Route::post('/ProductDetail','ProductDetailController@postProductDetail');
Route::post('/child/ProductDetail','ProductDetailController@postProductDetail');
Route::post('/child/cart','CartController@addToCart');
Route::get('/Contact',function(){
    return view('contact');
});

Route::post('/child/SearchGD','SearchGDController@Search');
Route::get('/checkDB', function ()
{
    dd(DB::connection()->getDatabaseName());
});

Route::get('/Changepass','ChangepassController@getChangepass');
Route::post('/Changepass','ChangepassController@postChangePass');

Route::post('/SearchGD','SearchGDController@Search');
Route::get('/Yourcart','CartController@cartDetail');
Route::get('/del','CartController@deleteCart');
Route::post('/cart','CartController@addToCart');
Route::post('/checkout','CartController@checkout');
