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
    return '';
});

//Auth::routes();

Route::get('the-story/{dir}','StoryController@index')
    ->name('story.full');

Route::get('the-story/{user}/{dir}', 'StoryController@show')
    ->name('story.character');

/* Vue SPA Characters */

Route::get('characters/', 'ApiController@index'); // returns a list of users with bios on the board
Route::get('character/{user_id}/story', 'ApiController@story'); // returns a characters story topic ids
Route::get('posts/{topic_id}','ApiController@posts'); // returns all posts for a topic id

/* New Character */

Route::get('application','NewCharacterController@create')->name('application.create');
Route::post('application','NewCharacterController@store')->name('application.store');
