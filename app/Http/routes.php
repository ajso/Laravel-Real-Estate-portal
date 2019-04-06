<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});*/
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
	
	Route::get('/', 'IndexController@index');
	
	Route::post('login', 'IndexController@postLogin');
	Route::get('logout', 'IndexController@logout');
	
	
	Route::get('dashboard', 'DashboardController@index');
	
	Route::get('profile', 'AdminController@profile');
	
	Route::post('profile', 'AdminController@updateProfile');
	
	Route::post('profile_pass', 'AdminController@updatePassword');
	
	Route::get('settings', 'SettingsController@settings');
	
	Route::post('settings', 'SettingsController@settingsUpdates');
	
	Route::post('addthisdisqus', 'SettingsController@addthisdisqus');
	
	Route::post('headfootupdate', 'SettingsController@headfootupdate');
	 
	Route::get('slider', 'SliderController@sliderlist');
	
	Route::get('slider/addslide', 'SliderController@addeditSlide');
	
	Route::post('slider/addslide', 'SliderController@addnew');
	
	Route::get('slider/addslide/{id}', 'SliderController@editSlide');	
	
	Route::get('slider/delete/{id}', 'SliderController@delete');
	
	
	Route::get('testimonials', 'TestimonialsController@testimonialslist');
	
	Route::get('testimonials/addtestimonial', 'TestimonialsController@addeditestimonials');
	
	Route::post('testimonials/addtestimonial', 'TestimonialsController@addnew');
	
	Route::get('testimonials/addtestimonial/{id}', 'TestimonialsController@edittestimonial');
	
	Route::get('testimonials/delete/{id}', 'TestimonialsController@delete');
	

	Route::get('properties', 'PropertiesController@propertieslist');
	
	Route::get('properties/addproperty', 'PropertiesController@addeditproperty');
	
	Route::post('properties/addproperty', 'PropertiesController@addnew');
	
	Route::get('properties/addproperty/{id}', 'PropertiesController@editproperty'); 
	
	Route::get('properties/status/{id}', 'PropertiesController@status');
	
	Route::get('properties/featuredproperty/{id}', 'PropertiesController@featuredproperty');
	
	Route::get('properties/delete/{id}', 'PropertiesController@delete');
	
	
	Route::get('featuredproperties', 'FeaturedPropertiesController@propertieslist');
	
	 
	Route::get('users', 'UsersController@userslist');
	
	Route::get('users/adduser', 'UsersController@addeditUser');
	
	Route::post('users/adduser', 'UsersController@addnew');
	
	Route::get('users/adduser/{id}', 'UsersController@editUser');
	
	Route::get('users/delete/{id}', 'UsersController@delete');	
	
	
	Route::get('subscriber', 'SubscriberController@subscriberlist');  
	
	Route::get('subscriber/delete/{id}', 'SubscriberController@delete');
	
	
	Route::get('partners', 'PartnersController@partnerslist');  
	
	Route::get('partners/addpartners', 'PartnersController@addpartners');
	
	Route::post('partners/addpartners', 'PartnersController@addnew');
	
	Route::get('partners/addpartners/{id}', 'PartnersController@editpartners');
	
	Route::get('partners/delete/{id}', 'PartnersController@delete');
	
	Route::get('inquiries', 'InquiriesController@inquirieslist');  
	
	Route::get('inquiries/delete/{id}', 'InquiriesController@delete');	
	
	
});

Route::get('/', 'IndexController@index');

Route::post('subscribe', 'IndexController@subscribe');

Route::get('agents', 'AgentsController@index');

Route::get('properties', 'PropertiesController@index');

Route::get('featured', 'PropertiesController@featuredproperties');

Route::get('sale', 'PropertiesController@saleproperties');

Route::get('rent', 'PropertiesController@rentproperties');

Route::get('properties/{slug}', 'PropertiesController@propertysingle');

Route::get('type/{slug}', 'PropertiesController@propertiesbytype');

Route::post('agentscontact', 'PropertiesController@agentscontact');

Route::post('searchproperties', 'PropertiesController@searchproperties');

Route::post('search', 'PropertiesController@searchkeywordproperties');


// Password reset link request routes...
Route::get('admin/password/email', 'Auth\PasswordController@getEmail');
Route::post('admin/password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('admin/password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('admin/password/reset', 'Auth\PasswordController@postReset');

//Route::post('users/login', 'Auth\AuthController@postLogin');
