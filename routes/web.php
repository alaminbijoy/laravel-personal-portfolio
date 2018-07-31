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

Route::get('/add-new-portfolio', 'AdminController@addNewPortfolio')->name('addNewPortfolio');
Route::post('/new-portfolio', 'AdminController@newPortfolio')->name('newPortfolio');
Route::get('/manage-portfolio', 'AdminController@managePortfolio')->name('managePortfolio');
Route::get('/edit-portfolio/{id}', 'AdminController@editPortfolio')->name('editPortfolio');
Route::post('/update-portfolio/{id}', 'AdminController@updatePortfolio')->name('updatePortfolio');
Route::get('/delete-portfolio/{id}', 'AdminController@deletePortfolio')->name('deletePortfolio');

Route::get('/user-profile', 'AdminController@userProfile')->name('userProfile');
Route::post('/update-user-profile', 'AdminController@updateProfile')->name('updateProfile');
Route::post('/update-password', 'AdminController@updatePassword')->name('updatePassword');
Route::get('/delete-profile-picture', 'AdminController@deleteProfilePicture')->name('deleteProfilePicture');

Route::get('/manage-users/', 'AdminController@manageUsers')->name('manageUsers');
Route::get('/edit-user-{id}', 'AdminController@editUser')->name('editUser');
Route::post('/update-user-{id}', 'AdminController@updateUser')->name('updateUser');
Route::post('/update-user-password/{id}', 'AdminController@updateUserPassword')->name('updateUserPassword');

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


