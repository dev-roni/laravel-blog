<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogSiteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\CaroselController;
use App\Http\Controllers\Authentication;

/*-------website view all route-----------*/
Route::post('search',[BlogSiteController::class,'search'])->name('search');
Route::get('/',[BlogSiteController::class,'blog_home'])->name('home');
Route::get('article',[BlogSiteController::class,'site_article'])->name('site_article');
Route::get('post-show/{post_id}',[BlogSiteController::class,'post_show'])->name('post_show');
Route::get('category',[BlogSiteController::class,'site_category'])->name('site_category');
Route::get('category-search/{categoryid}',[BlogSiteController::class,'site_category_search'])->name('site_category_search');
Route::get('about',[BlogSiteController::class,'site_about'])->name('site_about');
Route::get('contact',[BlogSiteController::class,'site_contact'])->name('site_contact');

Route::any('comment-store/{post_id}',[CommentController::class,'comment_store'])->middleware('comment')->name('comment.store');

Route::any('comment-delete/{post_id}',[CommentController::class,'comment_delete'])->middleware('auth')->name('comment.delete');

/*-------admin pannel all route-----------*/
//authentication
route::get('registration',[Authentication::class,'registration'])->name('registration');
route::post('user-create',[Authentication::class,'user_create'])->name('user_create');
route::get('login',[Authentication::class,'login'])->name('login');
route::post('loged_in',[Authentication::class,'loged_in'])->name('loged_in');
route::get('logout',[Authentication::class,'logout'])->name('logout');
//going page selection
route::get('destiny',[Authentication::class,'destiny'])->name('destiny');

//only for admin
route::middleware('admin')->group(function(){
    //dashboard
    route::get('dashboard',[DashboardController::class,'admin_dashboard'])->name('dashboard');
    //user
    route::get('users',[UserController::class,'users'])->name('users');
    route::post('user-search',[UserController::class,'user_search'])->name('user_search');
    route::get('role-search/{user_id}',[UserController::class,'user_role_search'])->name('user_role_search');
    Route::get('user-delete/{user_id}', [UserController::class, 'user_delete'])->name('user_delete');
    // user edit
    Route::get('user-edit-view/{user_id}', [UserController::class, 'user_edit_view'])->name('user_edit_view');
    Route::post('user-update/{user_id}', [UserController::class, 'user_update'])->name('user_update');
    //settings
    route::get('settings',[SettingsController::class,'settings'])->name('settings');
    //general settings
    Route::post('site-title-update/{title_id}', [SettingsController::class, 'updateTitle'])->name('update_site_title');
    Route::post('site-slug-update/{slug_id}', [SettingsController::class, 'updateslug'])->name('update_site_slug');
    Route::post('site-description-update/{description_id}', [SettingsController::class, 'updatedescription'])->name('update_site_description');
    Route::post('site-logo-update/{logo_id}', [SettingsController::class, 'updateLogo'])->name('update_site_logo');
    Route::post('site-favicon-update/{fav_id}', [SettingsController::class, 'updateFavicon'])->name('update_site_favicon');
    //social media settings
    Route::post('social-media/{media_id}', [SettingsController::class, 'updatemedia'])->name('update_social_media');

});

//editor and admin only
route::middleware('editor')->group(function(){
    //Category
    route::post('category-search',[CategoryController::class,'category_search'])->name('search_category'); 
    route::get('category-manage',[CategoryController::class,'category_manage'])->name('category_manage');
    route::get('category-edit-view/{category_id}',[CategoryController::class,'category_edit_view'])->name('category_edit_view');
    route::post('category-update/{category_id}',[CategoryController::class,'category_update'])->name('category_update');
    route::get('category-delete/{category_id}',[CategoryController::class,'category_delete'])->name('category_delete');
    //category create
    route::get('category-create-view',[CategoryController::class,'category_create_view'])->name('category_create_view');
    route::post('category-create-input',[CategoryController::class,'category_create_input'])->name('category_create_input');
    //Post management
    route::get('status-search/{status}',[PostController::class,'status_search'])->name('status_search');
    route::get('category-search/{category_id}',[PostController::class,'category_search'])->name('category_search'); /// same hoye gese
    route::post('post-search',[PostController::class,'post_search'])->name('post_search');
    route::get('post-management',[PostController::class,'post_management'])->name('post_management');
    //post create
    route::get('post-create-view',[PostController::class,'post_create_view'])->name('post_create_view');
    route::post('post-create-input',[PostController::class,'post_create_input'])->name('post_create_input');
    //post approve
    route::get('post-approve/{post_id}',[PostController::class,'post_approve'])->name('post_approve');
    // Posts view
    route::get('post-view/{post_id}',[PostController::class,'blog_post_view'])->name('blog_post_view');
    // Posts edit
    Route::get('post-edit-view/{post_id}', [PostController::class, 'post_edit_view'])->name('post_edit_view');
    Route::post('post-update/{post_id}', [PostController::class, 'post_update'])->name('post_update');
    // Posts delete
    Route::get('post-delete/{post_id}', [PostController::class, 'post_delete'])->name('post_delete');
    //comments
    route::get('comments',[CommentController::class,'comment'])->name('comments');
    //profile view
    route::get('profile/{user_id}',[ProfileController::class,'profile'])->name('profile');
    route::post('profile-picture-update/{user_id}',[ProfileController::class,'profile_picture_update'])->name('profile_picture_update');
    route::post('profile-data-update/{user_id}',[ProfileController::class,'profile_data_update'])->name('profile_data_update');
    route::post('password-update/{user_id}',[ProfileController::class,'password_update'])->name('password_update');
    //carosel setting
    route::resource('carosel',CaroselController::class);
    route::any('carosel1/{id}/{status}',[CaroselController::class,'carosel1'])->name('carosel1');
    route::any('carosel2/{id}/{status}',[CaroselController::class,'carosel2'])->name('carosel2');
    route::any('carosel3/{id}/{status}',[CaroselController::class,'carosel3'])->name('carosel3');

});


