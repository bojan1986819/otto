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

Route::get('/', 'SiteController@getWelcome');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/aboutme','SiteController@getAboutMe')->name('aboutme');

Route::get('/projects','SiteController@getProjects')->name('projects');

Route::get('/contact','SiteController@getContactme')->name('contact');

Route::get('/press','SiteController@getPress')->name('press');

Route::post('/postemail','SiteController@postEmail')->name('postemail');



Route::get('/admin','SiteController@getAdmin')->name('admin');
Route::any('/admin/projects','ProjectController@phpgridManageProjects')->name('admin_projects')->middleware('auth');
Route::any('/admin/press','PressController@phpgridManagePress')->name('admin_press')->middleware('auth');
Route::any('/admin/aboutme','SiteController@getAdminAboutMe')->name('admin_aboutme')->middleware('auth');
Route::post('/admin/aboutme/update', 'SiteController@postUpdateAboutme')->name('admin_aboutme_update')->middleware('auth');
Route::get('/picture/{project_id}', 'ProjectController@getProjectPicture')->name('project.picture');
Route::post('/update-picture', 'ProjectController@postUpdateProjectPicture')->middleware('auth')->name('project.picture.update');


// url image cache
Route::get('imagecache/{template}/{filename}', '\Intervention\Image\ImageCacheController@getResponse')->name('imagecache');





