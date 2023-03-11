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
        return auth()->user();
    });

/*----------------------------Login & Register --------------*/
    Route::post('user/signup','UserApiController@UserSignUp');
    Route::post('user/login','UserApiController@login');
    Route::get('user/data','UserApiController@data');
    Route::post('user/edit','UserApiController@edit');
    Route::post('change/password','UserApiController@changepassword');
/*----------------------Login & Register ----------------------*/

Route::get('/city/list','MenuApiController@citylist');
Route::get('/category/list','MenuApiController@categorylist');

/*-------------Shop ------------------------------*/

    Route::get('/shop/list','ShopApiController@list');
    Route::get('/shop/home','ShopApiController@home');
    Route::post('/shop/new', 'ShopApiController@create');
    Route::get('/shop/details','ShopApiController@read');
    Route::delete('/shop/delete','ShopApiController@delete');
    Route::put('/shop/update','ShopApiController@update');

    // 
    Route::get('/shop/OwnerProduct','ShopApiController@OwnerProduct');

/*-----------------------------shop---------------------------*/

/*-------------Menu Api ------------------------------------*/


Route::get('/menu/list','MenuApiController@Menulist');

Route::get('/home/ProductList','MenuApiController@ProductList');

// Route::get('/home/shop/id','MenuApiController@ProductList');


Route::post('/product/create','MenuApiController@createproduct');

Route::post('/product/search','MenuApiController@search');
/*---------------Menu------------------------------------------*/


/*------------------------Order---------------------------------*/
Route::post('/order/new','Order_APiController@create');
// 
Route::get('/AddToCart', 'Order_APiController@AddToCart');
Route::get('/Plus', 'Order_APiController@Plus');
Route::get('/Reduce', 'Order_APiController@Reduce');
Route::get('/GetCart', 'Order_APiController@GetCart');
Route::get('/DeleteCart', 'Order_APiController@DeleteCart');
Route::get('/DeleteFromCart', 'Order_APiController@DeleteFCart');
Route::get('/CartCount', 'Order_APiController@CartCount');


// 
Route::get('/order/shop','Order_APiController@OrderShop');
Route::get('/order/OrderItem','Order_APiController@OrderItem');

Route::get('/order/shopdelivered','Order_APiController@OrderShopdelivered');
Route::get('/order/user','Order_APiController@Orderuser');
Route::get('/order/delivered','Order_APiController@delivered');

/*--------------------------------------------------------------*/

Route::get('/aboutus','PagesController@aboutus');

Route::get('/Adv/List','AdvAPIController@Advlist'); //البنرات
















/*--------------------------Order---------------------------------*/














