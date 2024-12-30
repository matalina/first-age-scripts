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

use App\Http\Controllers\ApiController;
use App\Http\Controllers\NewCharacterController;
use App\Http\Controllers\StoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return '';
});

//Auth::routes();

Route::get('the-story/{dir}', [StoryController::class, 'index'])
    ->name('story.full');

Route::get('the-story/{user}/{dir}', [StoryController::class, 'show'])
    ->name('story.character');

/* Vue SPA Characters */

Route::get('characters/', [ApiController::class, 'index']); // returns a list of users with bios on the board
Route::get('character/{user_id}/story', [ApiController::class, 'story']); // returns a characters story topic ids
Route::get('posts/{topic_id}',[ApiController::class, 'posts']); // returns all posts for a topic id

/* New Character */

Route::get('application',[NewCharacterController::class, 'create'])->name('application.create');
Route::post('application',[NewCharacterController::class, 'store'])->name('application.store');
