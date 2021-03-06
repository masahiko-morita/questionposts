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

Route::get('/', 'QuestionpostsController@index');

// user registration
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// Login authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show','yes_questions','search']]);
     Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
        Route::post('yes', 'UserYesController@store')->name('user.yes');
        Route::post('no', 'UserNoController@store')->name('user.no');
        Route::get('yes_questions', 'UsersController@yes_questions')->name('users.yes_questions');
        Route::get('no_questions', 'UsersController@no_questions')->name('users.no_questions');
        // Route::get('search', 'UsersController@search')->name('users.search');
    });
    Route::resource('questionposts', 'QuestionpostsController', ['only' => ['store','show','destroy']]);
    Route::get('search', 'SearchController@usersearch')->name('users.search');
    Route::get('questionsearch', 'SearchController@questionpostsearch')->name('questionposts.search');
    
});