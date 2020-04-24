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


Auth::routes();



// Route::group(['prefix'=>'admin'], function(){
// 	Route::get('/dashboard', ['as'=>'DashboardRoute', 'uses'=>'DashboardCOntroller@index']);
// });


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function(){
	Route::resource('category', 'CategoryController');
	Route::get('category/published/{id}', 'CategoryController@published')->name('category.published');
	Route::resource('post', 'PostController');
});
//category------------------------------
/*Route::get('/category', 'CategoryController@index')->name('category');
Route::get('/add-category', 'CategoryController@create')->name('add.category');
Route::post('/store/category', 'CategoryController@store')->name('store.category');
Route::get('/show/category/{id}', 'CategoryController@show');
Route::get('/edit/category/{id}', 'CategoryController@edit');
Route::post('/update/category/{id}', 'CategoryController@update');
Route::get('/delete/category/{id}', 'CategoryController@destroy');*/

//sub-category--------------------------------------
Route::get('/sub-category', 'SubCategoryController@index')->name('sub.category');
Route::get('/add/sub-category', 'SubCategoryController@create');
Route::post('/store/subcategory', 'SubCategoryController@store');
Route::get('/show/sub-category/{id}', 'SubCategoryController@show');
Route::get('/edit/sub-category/{id}', 'SubCategoryController@edit');
Route::post('/update/sub-category/{id}', 'SubCategoryController@update');
Route::get('/delete/sub-category/{id}', 'SubCategoryController@destroy');
