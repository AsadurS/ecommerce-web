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
    return view('layout');
});
//website.....
Route::get('/', 'HomeController@index')->name('home');

//admin.......
Route::get('/logout', 'SuperAdminController@logout')->name('loginOut');
Route::get('/login', 'AdminController@index')->name('login');
Route::get('/dashbord', 'SuperAdminController@index')->name('dashbord');
Route::post('/admin-dashbord', 'AdminController@admin_dashbord')->name('dashbord');

//catagory related routes
Route::get('/add-catagory', 'CatagoryController@index')->name('add-catagory');
Route::get('/all-catagory', 'CatagoryController@all_catagory')->name('all-catagory');
Route::post('/save-catagory', 'CatagoryController@add_catagory')->name('save-catagory');
Route::get('/unative-catagory/{category_id}', 'CatagoryController@unative_catagory')->name('unactive-catagory');
Route::get('/ative-catagory/{category_id}', 'CatagoryController@ative_catagory')->name('unactive-catagory');
Route::get('/edit-catagory/{category_id}', 'CatagoryController@edit_catagory')->name('edit-catagory');
Route::post('/update/{category_id}', 'CatagoryController@update_catagory')->name('update-catagory');
Route::get('/delete/{category_id}', 'CatagoryController@delete')->name('delete-catagory');
Route::get('/cat_type/{category_id}', 'HomeController@cat_type')->name('cat_type-catagory');
Route::get('/brand_type/{id}', 'HomeController@brand_type')->name('brand_type-catagory');
Route::get('/product-details/{pro_id}', 'HomeController@pro_details')->name('pdetails-catagory');
Route::post('/messsage', 'HomeController@message')->name('message-catagory');
Route::get('/all-message', 'HomeController@view_message')->name('all-mesage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//brand related routes
Route::get('/add-brand', 'BrandController@index')->name('all-catagory');
Route::get('/all-brand', 'BrandController@all')->name('all-catagory');
Route::get('/active-brand/{ida}', 'BrandController@active')->name('all-catagory');
Route::get('/unactive-brand/{ida}', 'BrandController@unactive')->name('all-catagory');
Route::get('/delete1/{delete}', 'BrandController@delete')->name('all-catagory');
Route::get('/edit/{edit}', 'BrandController@edit')->name('all-catagory');
Route::post('/update2/{id}', 'BrandController@update')->name('all-catagory');
Route::post('/inter', 'BrandController@inter')->name('all-catagory');
//product category routes
Route::get('/add-product', 'ProductController@index')->name('all-catagory');
Route::get('/all-product', 'ProductController@all_product')->name('all-catagory');
Route::post('/insert', 'ProductController@insert')->name('all-catagory');
Route::get('/edit-product/{id}', 'ProductController@edit')->name('all-catagory');
//Route::get('/edit-product/{id}', 'ProductController@rr')->name('all-catagory');
//slider
Route::get('/all-slider', 'SlideController@all_slider')->name('all-catagory');
Route::get('/add-slider', 'SlideController@index')->name('all-catagory');
Route::post('/ins/slider', 'SlideController@add_slider')->name('all-catagory');
