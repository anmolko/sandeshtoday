<?php

use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;

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

Auth::routes();

Auth::routes([
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::any('/register', function() {
    abort(404);
});

Route::get('/slider-list', function () {
    return redirect('/');
});


Route::get('/categories', function () {
    return redirect('/blog');
});

Route::group(['prefix' => 'user', 'middleware' => ['auth','CustomerMiddleware']], function () {
    Route::get('/dashboard', 'App\Http\Controllers\SocialLoginController@dashboard')->name('front-user.dashboard');
    Route::put('user-edit/{id}', 'App\Http\Controllers\UserController@frontProfileUser')->name('front-user.update');
    Route::get('/delete-account', 'App\Http\Controllers\UserController@customerDestroy')->name('customer.destroy');
});

Route::get('/contact-us', 'App\Http\Controllers\FrontController@contact')->name('contact');
Route::post('/contact-us/store', 'App\Http\Controllers\FrontController@contactStore')->name('contact.store');
Route::get('/about-us', 'App\Http\Controllers\FrontController@aboutUs')->name('aboutus');


Route::get('/', 'App\Http\Controllers\FrontController@index')->name('home');

//blog
Route::get('post/search/', 'App\Http\Controllers\FrontController@searchBlog')->name('searchBlog');
Route::get('post/{year}/{month}/{slug}','App\Http\Controllers\FrontController@blogSingle')->name('blog.single');
Route::get('category/{slug}', 'App\Http\Controllers\FrontController@blogCategories')->name('blog.category');
Route::get('/news', 'App\Http\Controllers\FrontController@blogs')->name('blog.frontend');
Route::get('/faq', 'App\Http\Controllers\FrontController@faq')->name('faq.frontend');
Route::get('/team', 'App\Http\Controllers\FrontController@team')->name('team');

//comment
Route::get('/comments', 'App\Http\Controllers\CommentController@index')->name('comments.index');
Route::get('/comments/create', 'App\Http\Controllers\CommentController@create')->name('comments.create');
Route::post('/comments', 'App\Http\Controllers\CommentController@store')->name('comments.store');
Route::put('/comments/{comment}', 'App\Http\Controllers\CommentController@update')->name('comments.update');
Route::delete('/comments/{comment}', 'App\Http\Controllers\CommentController@destroy')->name('comments.destroy');
Route::get('/comments/{comment}/edit', 'App\Http\Controllers\CommentController@edit')->name('comments.edit');
Route::post('comment-like-dislike','App\Http\Controllers\CommentController@commentLikes')->name('comments.like');

//End comment

Route::get('/privacy-policy', 'App\Http\Controllers\FrontController@privacy')->name('privacy.frontend');
Route::get('/terms-of-service', 'App\Http\Controllers\FrontController@terms')->name('term.frontend');

Route::group(['prefix' => 'auth', 'middleware' => ['auth','AdminMiddleware']], function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    //signed-in user routes
    Route::get('/profile/{slug?}', 'App\Http\Controllers\UserController@profile')->name('profile');
    Route::get('/filemanager', 'App\Http\Controllers\HomeController@filemanager')->name('filemanager');
    Route::get('/profile/edit/{slug}', 'App\Http\Controllers\UserController@profileEdit')->name('profile.edit');
    Route::post('/profile/socials/', 'App\Http\Controllers\UserController@socialsUpdate')->name('profile.socials');
    Route::put('/profile/{id}/update', 'App\Http\Controllers\UserController@update')->name('user.update');
    Route::post('/user-image/update/', 'App\Http\Controllers\UserController@imageupdate')->name('user.imageupdate');
    Route::post('/profile/oldpassword', 'App\Http\Controllers\UserController@checkoldpassword')->name('user.oldpassword');
    Route::post('/profile/password', 'App\Http\Controllers\UserController@profilepassword')->name('user.password');
    Route::post('/user/removeaccount', 'App\Http\Controllers\UserController@removeAccount')->name('user.removeaccount');
    //end of signed-in user routes

    Route::get('/user-management', 'App\Http\Controllers\UserController@alluser')->name('alluser');
    Route::get('/user-management/create', 'App\Http\Controllers\UserController@create')->name('user.create');
    Route::post('/user-management/store', 'App\Http\Controllers\UserController@store')->name('user.store');
    Route::delete('/user-management/{id}', 'App\Http\Controllers\UserController@destroy')->name('user.destroy');
    Route::patch('/status/update/{id}', 'App\Http\Controllers\UserController@statusupdate')->name('user-status.update');
    Route::patch('/role/update/{id}', 'App\Http\Controllers\UserController@roleupdate')->name('user-type.update');
    Route::get('/user-comments', 'App\Http\Controllers\UserController@frontendUserComments')->name('front-user.comments');
    Route::get('/user-comments/remove', 'App\Http\Controllers\UserController@frontendUserCommentsRemove')->name('front-user.commentsremove');

    //homepage
    Route::get('/homepage-setting', 'App\Http\Controllers\HomePageController@index')->name('homepage.index');
    Route::post('/homepage-setting', 'App\Http\Controllers\HomePageController@store')->name('homepage.store');
    Route::put('/homepage-setting/{settings}', 'App\Http\Controllers\HomePageController@update')->name('homepage.update');
    Route::put('/homepage-setting/callaction/{settings}', 'App\Http\Controllers\HomePageController@callactionhome')->name('homepage.action');
    Route::put('/homepage-setting/core-values/{settings}', 'App\Http\Controllers\HomePageController@corevalues')->name('homepage.corevalues');
    Route::put('/homepage-setting/mission-values/{settings}', 'App\Http\Controllers\HomePageController@missionvalues')->name('homepage.mv');
    Route::put('/homepage-setting/makes-us-different/{settings}', 'App\Http\Controllers\HomePageController@makesdifferent')->name('homepage.different');
    Route::put('/homepage-setting/why-us/{settings}', 'App\Http\Controllers\HomePageController@whyus')->name('homepage.whyus');

    Route::put('/homepage-setting/grievance/{settings}', 'App\Http\Controllers\HomePageController@grievance')->name('homepage.grievance');


    Route::get('/contact', 'App\Http\Controllers\ContactController@index')->name('contact.index');
    Route::delete('/contact/{id}', 'App\Http\Controllers\ContactController@destroy')->name('contact.destroy');
    Route::get('/contact/edit/{slug}', 'App\Http\Controllers\ContactController@edit')->name('contact.edit');

    //Blog categories
    Route::get('/category', 'App\Http\Controllers\BlogCategoryController@index')->name('blogcategory.index');
    Route::get('/category/create', 'App\Http\Controllers\BlogCategoryController@create')->name('blogcategory.create');
    Route::post('/category', 'App\Http\Controllers\BlogCategoryController@store')->name('blogcategory.store');
    Route::put('/category/{category}', 'App\Http\Controllers\BlogCategoryController@update')->name('blogcategory.update');
    Route::delete('/category/{category}', 'App\Http\Controllers\BlogCategoryController@destroy')->name('blogcategory.destroy');
    Route::get('/category/{category}/edit', 'App\Http\Controllers\BlogCategoryController@edit')->name('blogcategory.edit');
    Route::get('/category/{category}/blog', 'App\Http\Controllers\BlogCategoryController@blogs')->name('blogcategory.blog');

    //End of Blog categories

    //Blog Tag
    Route::get('/tags', 'App\Http\Controllers\TagController@index')->name('tag.index');
    Route::get('/tags/create', 'App\Http\Controllers\TagController@create')->name('tag.create');
    Route::post('/tags', 'App\Http\Controllers\TagController@store')->name('tag.store');
    Route::put('/tags/{tag}', 'App\Http\Controllers\TagController@update')->name('tag.update');
    Route::delete('/tags/{tag}', 'App\Http\Controllers\TagController@destroy')->name('tag.destroy');
    Route::get('/tags/{tag}/edit', 'App\Http\Controllers\TagController@edit')->name('tag.edit');
    Route::get('/tags/{tag}/blog', 'App\Http\Controllers\TagController@blogs')->name('tag.blog');
    Route::post('/mold/tag/viaJquery', 'App\Http\Controllers\TagController@tagsdynamic')->name('tag.dynamic');
    //End of Blog categories

    //Ads Tag
    Route::get('/advertisements', 'App\Http\Controllers\AdsController@index')->name('ads.index');
    Route::get('/advertisements/create', 'App\Http\Controllers\AdsController@create')->name('ads.create');
    Route::post('/advertisements', 'App\Http\Controllers\AdsController@store')->name('ads.store');
    Route::put('/advertisements/{ads}', 'App\Http\Controllers\AdsController@update')->name('ads.update');
    Route::delete('/advertisements/{ads}', 'App\Http\Controllers\AdsController@destroy')->name('ads.destroy');
    Route::get('/advertisements/{ads}/edit', 'App\Http\Controllers\AdsController@edit')->name('ads.edit');
    Route::patch('/advertisements/{id}/update', 'App\Http\Controllers\AdsController@updateStatus')->name('ads-status.update');

    //End of Ads categories


    //Blog
    Route::get('/blogs', 'App\Http\Controllers\BlogController@index')->name('blog.index');
    Route::get('/blogs/create', 'App\Http\Controllers\BlogController@create')->name('blog.create');
    Route::post('/blogs', 'App\Http\Controllers\BlogController@store')->name('blog.store');
    Route::put('/blogs/{blogs}', 'App\Http\Controllers\BlogController@update')->name('blog.update');
    Route::delete('/blogs/{blogs}', 'App\Http\Controllers\BlogController@destroy')->name('blog.destroy');
    Route::get('/blogs/{blogs}/edit', 'App\Http\Controllers\BlogController@edit')->name('blog.edit');
    Route::patch('/blogs/{id}/update', 'App\Http\Controllers\BlogController@updateStatus')->name('blog-status.update');

    //End Blog

    Route::get('/dashboard-settings', 'App\Http\Controllers\SettingController@index')->name('settings.index');
    Route::get('/dashboard-settings/create', 'App\Http\Controllers\SettingController@create')->name('settings.create');
    Route::post('/dashboard-settings', 'App\Http\Controllers\SettingController@store')->name('settings.store');
    Route::put('/dashboard-settings/{settings}', 'App\Http\Controllers\SettingController@update')->name('settings.update');
    Route::delete('/dashboard-settings/{settings}', 'App\Http\Controllers\SettingController@destroy')->name('settings.destroy');
    Route::get('/dashboard-settings/{settings}/edit', 'App\Http\Controllers\SettingController@edit')->name('settings.edit');
    Route::post('/dashboard-settings/theme-mode', 'App\Http\Controllers\SettingController@themeMode')->name('settings.theme');
    Route::put('/dashboard-settings/privacy-policy/{settings}', 'App\Http\Controllers\SettingController@privacyPolicy')->name('settings.privacy');
    Route::put('/dashboard-settings/terms-conditions/{settings}', 'App\Http\Controllers\SettingController@termsConditions')->name('settings.terms');

    //for menu
    Route::get('/manage-menus/{slug?}', 'App\Http\Controllers\MenuController@index')->name('menu.index');
    Route::post('/create-menu', 'App\Http\Controllers\MenuController@store')->name('menu.store');
    Route::get('/add-page-to-menu','App\Http\Controllers\MenuController@addPage')->name('menu.page');
    Route::get('/add-category-to-menu','App\Http\Controllers\MenuController@addCategory')->name('menu.category');
    Route::get('add-post-to-menu','App\Http\Controllers\MenuController@addPost')->name('menu.post');
    Route::get('add-custom-link','App\Http\Controllers\MenuController@addCustomLink')->name('menu.custom');
    Route::get('/update-menu','App\Http\Controllers\MenuController@updateMenu')->name('menu.updateMenu');
    Route::post('/update-menuitem/{id}','App\Http\Controllers\MenuController@updateMenuItem')->name('menu.updatemenuitem');
    Route::get('/delete-menuitem/{menuid}/{id}/{key}/{in?}/{inside?}','App\Http\Controllers\MenuController@deleteMenuItem')->name('menu.deletemenuitem');
    Route::get('/delete-menu/{id}','App\Http\Controllers\MenuController@destroy')->name('menu.delete');

    //teams

    Route::get('/teams', 'App\Http\Controllers\TeamController@index')->name('teams.index');
    Route::get('/teams/create', 'App\Http\Controllers\TeamController@create')->name('teams.create');
    Route::post('/teams', 'App\Http\Controllers\TeamController@store')->name('teams.store');
    Route::put('/teams/{teams}', 'App\Http\Controllers\TeamController@update')->name('teams.update');
    Route::delete('/teams/{teams}', 'App\Http\Controllers\TeamController@destroy')->name('teams.destroy');
    Route::get('/teams/{teams}/edit', 'App\Http\Controllers\TeamController@edit')->name('teams.edit');
    Route::post('/teams-sortable','App\Http\Controllers\TeamController@orderUpdate')->name('teams.order');

    //End of teams

    Route::get('/video-gallery', 'App\Http\Controllers\VideoGalleryController@index')->name('video.index');
    Route::get('/video-gallery/create', 'App\Http\Controllers\VideoGalleryController@create')->name('video.create');
    Route::post('/video-gallery', 'App\Http\Controllers\VideoGalleryController@store')->name('video.store');
    Route::put('/video-gallery/{video}', 'App\Http\Controllers\VideoGalleryController@update')->name('video.update');
    Route::delete('/video/{teams}', 'App\Http\Controllers\VideoGalleryController@destroy')->name('video.destroy');
    Route::get('/video-gallery/{video}/edit', 'App\Http\Controllers\VideoGalleryController@edit')->name('video.edit');
    Route::post('/video-gallery/update/gallery', 'App\Http\Controllers\VideoGalleryController@videoUpdate')->name('video.galleryUpdate');

    Route::group(['prefix' => 'sandeshtoday-filemanager', 'middleware' => ['auth']], function () {
        Lfm::routes();
    });


});

Route::get('/google/redirect','App\Http\Controllers\SocialLoginController@handleGoogleRedirect')->name('google.redirect');
Route::get('/google/callback', 'App\Http\Controllers\SocialLoginController@handleGoogleCallback')->name('google.callback');

Route::get('facebook/redirect','App\Http\Controllers\SocialLoginController@handleFacebookRedirect')->name('facebook.redirect');
Route::get('facebook/callback', 'App\Http\Controllers\SocialLoginController@handleFacebookCallback')->name('facebook.callback');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/request/remove-user-data', 'App\Http\Controllers\FrontController@removeFacebookUser')->name('remove.facebook');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
