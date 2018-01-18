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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware'=>['auth']],function (){
Route::get('/add-to-cart/{id}', [
    'uses' => 'ProductController@getAddToCart',
    'as' => 'product.addToCart'
]);
Route::get('/reduce/{id}', [
    'uses' => 'ProductController@getReduceByOne',
    'as' => 'product.reduceByOne'
]);
Route::get('/remove/{id}', [
    'uses' => 'ProductController@getRemoveItem',
    'as' => 'product.remove'
]);

Route::get('profile/cart/','ProductController@cart');
Route::get('checkout','ProductController@checkout');
Route::post('checkout','ProductController@postCheckout');


Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');
Route::post('profile/dompet', 'UserController@update_dompet');
Route::get('profile/history', 'UserController@history');

Route::resource('product','ProductController');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
