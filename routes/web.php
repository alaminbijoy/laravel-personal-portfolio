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


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'WebController@index')->name('home');

Route::Post('/contact-send', 'WebController@contactSend')->name('contactSend');

Auth::routes();

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
Route::get('/user/resend-verify-email', 'Auth\RegisterController@resendEmail')->name('resendEmail');
Route::Post('/user/resend-verify-email-susses', 'Auth\RegisterController@resendEmailSusses')->name('resendEmailSusses');


Route::get('/dashboard', 'AdminController@adminDashboard')->name('dashboard');

Route::get('/add-new-category', 'AdminController@addNewCategory')->name('addCategory');
Route::post('/new-category', 'AdminController@newCategory')->name('newCategory');
Route::get('/manage-category', 'AdminController@manageCategory')->name('manageCategory');
Route::get('/edit-category/{id}', 'AdminController@editCategory')->name('editCategory');
Route::post('/update-category/{id}', 'AdminController@updateCategory')->name('updateCategory');
Route::get('/delete-category/{id}', 'AdminController@deleteCategory')->name('deleteCategory');

Route::get('/add-new-post', 'AdminController@addNewPost')->name('addNewPost');
Route::post('/new-post', 'AdminController@newPost')->name('newPost');
Route::get('/manage-post', 'AdminController@managePost')->name('managePost');
Route::get('/edit-post/{id}', 'AdminController@editPost')->name('editPost');
Route::post('/update-post/{id}', 'AdminController@updatePost')->name('updatePost');
Route::get('/delete-post/{id}', 'AdminController@deletePost')->name('deletePost');

Route::get('/supper-admin/', 'AdminController@supperAdmin')->name('supperAdmin');
Route::post('/supper-admin-update/', 'AdminController@supperAdminUpdate')->name('supperAdminUpdate');

Route::get('/add-social-media/', 'AdminController@socialIcon')->name('socialIcon');
Route::get('/manage-social-media/', 'AdminController@manageSocialMedia')->name('manageSocialMedia');
Route::get('/edit-social-media/{id}', 'AdminController@editSocialMedia')->name('editSocialMedia');
Route::post('/add-social-icon/', 'AdminController@addSocialMedia')->name('addSocialMedia');
Route::post('/update-social-media/{id}', 'AdminController@socialMediaUpdate')->name('socialMediaUpdate');
Route::get('/delete-social-media/{id}', 'AdminController@deleteSocialMedia')->name('deleteSocialMedia');
Route::get('/delete-social-media-image/{id}', 'AdminController@deleteSocialMediaImage')->name('deleteSocialMediaImage');

Route::get('/mail-inbox/', 'AdminController@mailInbox')->name('mailInbox');
Route::get('/mail-inbox-read/{id}', 'AdminController@mailInboxRead')->name('mailInboxRead');
Route::get('/mail-compose/', 'AdminController@mailCompose')->name('mailCompose');
Route::post('/mail-send/', 'AdminController@mailSend')->name('mailSend');
Route::get('/mail-outbox/', 'AdminController@mailOutBox')->name('mailOutBox');
Route::get('/mail-outbox-read/{id}', 'AdminController@mailOutboxRead')->name('mailOutboxRead');

