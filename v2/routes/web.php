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

Route::get('/', 'SiteController@index');
Route::get('/membership', 'SiteController@membershipInfo');
Route::get('/executive-commitee', 'SiteController@executiveCommiteeInfo');
Route::get('/puja-schedule', 'SiteController@pujaScheduleInfo');
Route::get('/gallery', 'SiteController@galleryInfo');
Route::get('/gallery-show/{id}', 'SiteController@galleryDetails');
Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@sendEmail');

Auth::routes();


Route::group(['middlewareGroups' => ['auth']], function(){

	Route::get('/home', 'HomeController@index')->name('home');
	// --gallery category--
	Route::get('/add-gallery', 'GalleryController@addGalleryInfo');
	Route::post('/save-gallery', 'GalleryController@saveGalleryInfo');
	Route::get('/edit-gallery/{id}', 'GalleryController@editGalleryInfo');
	Route::post('/update-gallery', 'GalleryController@updateGalleryInfo');
	Route::post('/delete-gallery', 'GalleryController@deleteGallery');
	
	// --gallery category image--
	Route::get('/gallery-multiple-image', 'GalleryController@galleryMultipleImage');
	Route::post('/save-gallery-multiple-image', 'GalleryController@createGalleryMultipleImage');
	Route::post('/delete-group-gallery', 'GalleryController@deleteGroupGallery');

	// --slider route--
	Route::get('/add-slider', 'SliderController@index');
	Route::post('/save-slider', 'SliderController@store');
	Route::post('/slider-status', 'SliderController@sliderStatus');
	Route::get('/edit-slider/{id}', 'SliderController@show');
	Route::post('/update-slider', 'SliderController@update');
	Route::post('/delete-slider', 'SliderController@destroy');

	// --executive-committee route--
	Route::get('/add-executive-committee', 'ExecutiveCommitteeController@index')->name('add-executive-committee');
	Route::post('/save-executive-committee', 'ExecutiveCommitteeController@store')->name('save-executive-committee');
	Route::post('/executive-status', 'ExecutiveCommitteeController@executiveStatus')->name('executive-status');
	Route::post('/delete-executive', 'ExecutiveCommitteeController@destroy')->name('delete-executive');	
	Route::get('/edit-executive/{id}', 'ExecutiveCommitteeController@show');
	Route::post('/update-executive-committee', 'ExecutiveCommitteeController@update')->name('update-executive-committee');

	// --puja route--
	Route::get('/add-puja', 'PujaController@index')->name('add-puja');
	Route::post('/save-puja', 'PujaController@store')->name('save-puja');
	Route::post('/delete-puja', 'PujaController@destroy')->name('delete-puja');
	Route::get('/edit-puja/{id}', 'PujaController@show');
	Route::post('/update-puja', 'PujaController@update')->name('update-puja');




	Route::get('/add-puja-schedule', 'PujaScheduleController@index')->name('add-puja-schedule');
	Route::post('/save-puja-schedule', 'PujaScheduleController@store')->name('save-puja-schedule');
	Route::post('/delete-puja-schedule', 'PujaScheduleController@destroy')->name('delete-puja-schedule');
	Route::get('/edit-puja-schedule/{id}', 'PujaScheduleController@show')->name('edit-puja-schedule');
	Route::post('/update-puja-schedule', 'PujaScheduleController@update')->name('update-puja-schedule');

	Route::get('/add-puja-header', 'PujaHeaderController@index')->name('add-puja-header');
	Route::post('/save-puja-header', 'PujaHeaderController@store')->name('save-puja-header');
	Route::post('/delete-puja-header', 'PujaHeaderController@destroy')->name('delete-puja-header');

});
