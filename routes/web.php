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

Route::get('home', 'ClientController@index');
Route::get('shop', 'ClientController@shop');
Route::get('cart', 'ClientController@cart');
Route::get('checkout', 'ClientController@checkout');

Route::get('dashbored', 'adminController@dashbored')->name('admin.dashbored');
Route::get('add_category', 'adminController@add_category');
Route::get('add_product', 'adminController@add_product');
Route::get('add_slider', 'adminController@add_slider');
Route::get('all_categories', 'adminController@all_categories');
Route::get('all_products', 'adminController@all_products');
Route::get('all_sliders', 'adminController@all_sliders');

Route::post('save_product', 'Productcontroller@save_product');
Route::post('save_category', 'CategoryController@save_category');
Route::post('save_slider', 'SliderController@save_slider');
Route::get('select_product_by_category/{category_name}', 'Productcontroller@select_product_by_category');
Route::get('unactivate_product/{id}', 'Productcontroller@unactivate_product');
Route::get('activate_product/{id}', 'Productcontroller@activate_product');
Route::get('unactivate_slider/{id}', 'SliderController@unactivate_slider');
Route::get('activate_slider/{id}', 'SliderController@activate_slider');
Route::get('delete_category/{id}', 'CategoryController@delete_category');
Route::get('edit_category/{id}', 'CategoryController@edit_category');
Route::post('update_category', 'CategoryController@update_category');
Route::get('delete_product/{id}', 'Productcontroller@delete_product');
Route::get('delete_sliders/{id}', 'SliderController@delete_sliders');
Route::get('edit_product/{id}', 'Productcontroller@edit_product');
Route::post('update_product', 'Productcontroller@update_product');
Route::get('edit_slider/{id}', 'SliderController@edit_slider');
Route::post('update_slider', 'SliderController@update_slider');
