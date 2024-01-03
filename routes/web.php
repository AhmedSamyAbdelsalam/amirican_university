<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\Auth\ForgotPasswordController;
use App\Http\Controllers\Backend\Auth\ResetPasswordController;
use App\Http\Controllers\Backend\Auth\VerificationController;
use App\Http\Controllers\Backend\ContactUsController;
use App\Http\Controllers\Backend\PagesController;
use App\Http\Controllers\Backend\PostCategoriesController;
use App\Http\Controllers\Backend\PostCommentsController;
use App\Http\Controllers\Backend\PostsController;
use App\Http\Controllers\Backend\PostTagsController;
use App\Http\Controllers\Backend\SupervisorsController;
use App\Http\Controllers\Backend\UsersController as BackendUsersController;
use App\Http\Controllers\Backend\Auth\LoginController as BackendLoginController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Route::get('password/reset',                            [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email',                           [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}',                    [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset',                           [ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('email/verify',                              [VerificationController::class, 'show'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}',                 [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend',                             [VerificationController::class, 'resend'])->name('verification.resend');





Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    // Authentication Routes...
    Route::get('/login',                                [BackendLoginController::class, 'showLoginForm'])->name('show_login_form');
    Route::post('login',                                [BackendLoginController::class, 'login'])->name('login');
    Route::post('logout',                               [BackendLoginController::class, 'logout'])->name('logout');
    Route::group(['middleware' => ['roles', 'role:admin|editor']], function() {
        Route::get('/',                                 [AdminController::class, 'index'])->name('index_route');
        Route::get('/index',                            [AdminController::class, 'index'])->name('index');
        Route::post('/posts/removeImage/{media_id}',    [PostsController::class, 'removeImage'])->name('posts.media.destroy');
        Route::resource('posts',                        PostsController::class);
        Route::post('/pages/removeImage/{media_id}',    [PagesController::class, 'removeImage'])->name('pages.media.destroy');
        Route::resource('pages',                        PagesController::class);
        Route::resource('post_comments',                PostCommentsController::class);
        Route::resource('post_categories',              PostCategoriesController::class);
        Route::resource('post_tags',                    PostTagsController::class);
        Route::resource('contact_us',                   ContactUsController::class);
        Route::post('/users/removeImage',               [BackendUsersController::class, 'removeImage'])->name('users.remove_image');
        Route::resource('users',                        BackendUsersController::class);
        Route::post('/supervisors/removeImage',         [SupervisorsController::class, 'removeImage'])->name('supervisors.remove_image');
        Route::resource('supervisors',                  SupervisorsController::class);
    });
});
