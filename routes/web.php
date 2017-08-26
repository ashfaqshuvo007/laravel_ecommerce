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

Route::get('/', 'WelcomeController@index');

/*Admin Routes*/
Route::get('/admin-panel', 'AdminController@index');
Route::post('/admin_login_check', 'AdminController@admin_login_check');

/*Super Admin Routes */
Route::get('/dashboard', 'SuperAdminController@index');
Route::get('/admin-logout', 'SuperAdminController@logout');

/*Category Routes*/
Route::get('/add_category', 'SuperAdminController@add_category');
Route::post('/save-category', 'SuperAdminController@save_category');
Route::get('/manage-category', 'SuperAdminController@manage_category');
Route::get('/unpublished-category/{id}', 'SuperAdminController@unpublished_category');
Route::get('/published-category/{id}', 'SuperAdminController@published_category');
Route::get('/delete-category/{id}', 'SuperAdminController@delete_category');
Route::get('/edit-category/{id}', 'SuperAdminController@edit_category');
Route::post('/update-category', 'SuperAdminController@update_category');

/*PRODUCTS ROUTE*/
Route::get('/add-product', 'SuperAdminController@add_product');
Route::post('/save-product', 'SuperAdminController@save_product');
Route::get('/manage-product', 'SuperAdminController@manage_product');
Route::get('/unpublished-product/{id}', 'SuperAdminController@unpublished_product');
Route::get('/published-product/{id}', 'SuperAdminController@published_product');
Route::get('/delete-product/{id}', 'SuperAdminController@delete_product');
Route::get('/edit-product/{id}', 'SuperAdminController@edit_product');
Route::post('/update-product', 'SuperAdminController@update_product');

/*MAnufacturer Routes*/
Route::get('/add-manufacturer', 'SuperAdminController@add_manufacturer');
Route::post('/save-manufacturer', 'SuperAdminController@save_manufacturer');
Route::get('/manage-manufacturer', 'SuperAdminController@manage_manufacturer');
Route::get('/unpublished-manufacturer/{id}', 'SuperAdminController@unpublished_manufacturer');
Route::get('/published-manufacturer/{id}', 'SuperAdminController@published_manufacturer');
Route::get('/delete-manufacturer/{id}', 'SuperAdminController@delete_manufacturer');
Route::get('/edit-manufacturer/{id}', 'SuperAdminController@edit_manufacturer');
Route::post('/update-manufacturer', 'SuperAdminController@update_manufacturer');