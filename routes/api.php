<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Users\UsersController;
use App\Http\Controllers\Backend\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\General\GeneralController;



Route::get('/chart/comments_chart',             [ApiController::class, 'comments_chart']);
Route::get('/chart/users_chart',                [ApiController::class, 'users_chart']);



/***** API ************************************/
Route::get('/all_posts',                        [GeneralController::class, 'get_posts']);
Route::get('/post/{slug}',                      [GeneralController::class, 'show_post']);
Route::post('/post/{slug}',                     [GeneralController::class, 'store_comment']);
Route::get('/search',                           [GeneralController::class, 'search']);
Route::get('/category/{category_slug}',         [GeneralController::class, 'category']);
Route::get('/tag/{tag_slug}',                   [GeneralController::class, 'tag']);
Route::get('/author/{username}',                [GeneralController::class, 'author']);
Route::post('/contact-us',                      [GeneralController::class, 'do_contact']);
Route::get('/center',                           [GeneralController::class, 'center']);

Route::post('register',                         [AuthController::class, 'register']);
Route::post('login',                            [AuthController::class, 'login']);
Route::post('refresh_token',                    [AuthController::class, 'refresh_token']);

Route::group(['middleware' => ['auth:api']], function() {
    Route::get('scholarship/create',            [UsersController::class,'create']);
    Route::post('scholarship/create',           [UsersController::class,'store']);
    Route::post('logout',                       [UsersController::class, 'logout']);

});

