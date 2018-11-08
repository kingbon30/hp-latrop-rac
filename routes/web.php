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
Route::group(['namespace' => 'user'], function(){
	Route::get('/', 'PagesController@index');
	Route::get('/about', 'PagesController@about');
	Route::get('/blog-post/{blog_post_slug}', 'PagesController@blogpost')->name('blog_post_slug');
	Route::get('/blog/category/{blog_category}', 'PagesController@blogcategory')->name('blog_category'); 
	Route::get('/blog', 'PagesController@blog');
	Route::get('/blog/search/', 'PagesController@search');
	Route::get('/car-parts', 'PagesController@carparts');
	Route::get('/contact', 'PagesController@contact');
	Route::get('/faq', 'PagesController@faq');
	Route::get('/vehicle', 'PagesController@vehicle');
	Route::get('/vehicles', 'PagesController@vehicles');
});

//Admin Routes
Route::group(['namespace' => 'admin','middleware'], function(){
	Route::get('/admin', 'HomeController@index');
	Route::resource('admin/vehicles','VehiclesController');    
	Route::get('admin/vehicles/{vehicle_slug}','VehiclesController@view')->name('vehicle_slug');    
	Route::post('admin/vehicles/fetch','VehiclesController@fetch')->name('vehicles.fetch');    
	Route::resource('admin/makes','MakesController');    
	Route::resource('admin/models','ModelsController');    
	Route::resource('admin/features','FeaturesController');    
	Route::resource('admin/blogs/blog-categories','BlogCategoriesController');  
	Route::get('admin/blogs/blog-posts/status','BlogPostsController@status');    
	Route::resource('admin/blogs/blog-posts','BlogPostsController');    

});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
