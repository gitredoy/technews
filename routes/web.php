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

/* Frontend Part */
Route::get('/','HomePageController@index')->name('front.home');
Route::get('search/post', 'HomepageSearchController@post')->name('front.search.post');
/* News By Category */
Route::get('/listing/{catslug}','ListingPageController@index')->name('catpost.list');
/* News By Tag */
Route::get('/tag/{tagname}','TagPostController@index')->name('tagpost.list');
/* News By Tag */
Route::get('/search/query/','SearchPostController@index')->name('front.search');

/* News By Single Post */
Route::get('/details/{category}/{id}/{slug}','DetailsPageController@index')->name('details.full');
Route::post('/comment/create/{id}','DetailsPageController@commentcreate')->name('comment.create');

Auth::routes();

Route::get('back', 'HomeController@index')->name('home');
Route::post('back/search', 'HomeController@search')->name('back.search');

//Route::get('back','Admin\DasboardController@index')->name('admin.home');

Route::namespace('Admin')->prefix('admin')->middleware(['auth','auth.admin']) ->name('admin.')->group(function (){
    Route::resource('/user','UserController',['except'=>['show']]);
    Route::resource('/categories','CategoryController');
    Route::post('/categories/{id}','CategoryController@status')->name('category.status');
    Route::resource('/system','SystemController');
    Route::resource('style','StyleController');
    Route::resource('menu','Menucontroller');
});

Route::namespace('Author')->prefix('author')->middleware(['auth','auth.author']) ->name('author.')->group(function (){
      Route::resource('/tag','TagController');
      Route::resource('/post','PostController');
      Route::post('/post/{id}','PostController@status')->name('post.status');
      Route::post('/hotnews/{id}','HotnewsController@hotnews')->name('hotnews');

      Route::get('/comment/author/{author}/post/{post}','CommentController@index')->name('comment.post');
      Route::post('/comment/status/{id}','CommentController@status')->name('comment.status');

      //Route::get('/comment/{id}','CommentController@edit')->name('comment.edit');
     Route::delete('/comment/delete/{id}','CommentController@destroy')->name('comment.destroy');
});

Route::namespace('User')->prefix('user')->middleware(['auth','auth.user']) ->name('user.')->group(function (){
    Route::get('/test','DasboardController@index')->name('user.test');
});




