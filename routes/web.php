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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(); 

// Route::get('/home', 'HomeController@index')->name('home');

Route::name('index')->get('/', 'Shop\IndexController@index');
Route::name('mailer')->post('/mailer', 'Shop\IndexController@mailer');
Route::name('shop')->get('/shop', 'Shop\ShopController@shop');
Route::name('product')->get('/product/{id}', 'Shop\ProductController@product');
Route::name('checkout')->get('/checkout', 'Shop\CheckOutController@checkout');
Route::name('tocart')->post('/tocart', 'Shop\CheckOutController@tocart');
Route::name('deleteone')->post('/deleteone', 'Shop\CheckOutController@deleteone');
Route::name('clearall')->post('/clearall', 'Shop\CheckOutController@clearall');
Route::name('payment')->get('/payment', 'Shop\PaymentController@payment'); 
