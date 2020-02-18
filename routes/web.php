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
    return view('welcome');
});


//*****メインページ****
Route::get('/main', function () {
    return view('main');
});
Route::get('/main', 'MainController@getIndex');
Route::get('/main', 'MainController@showmember');
Route::post('/main', 'MainController@sendmessage');
Route::post('/main','MessageController@ShowMessage');
//Route::post('/main', 'MainController@postIndex');
//Route::get('/main/{id}', 'MainController@modal');
//Route::post('/main',function () {
//    return redirect()->action('MessageController@ShowMessage');
//}); 

//検索ページの表示
Route::get('/search_member', 'MainController@show_search_m');
Route::post('/search_member', 'MainController@showmember');

Route::get('/search_article', 'MainController@show_search_a');
Route::post('/search_article', 'MainController@showarticle');

//****メインページ(募集記事一覧)****
Route::get('/index_articlelist', 'MainController@articlelist');
Route::get('/index_articlelist', 'MainController@showarticle');

//****マイページ****
Route::get('/profile', 'UserprofileController@getTop');
Route::get('/profile', 'UserprofileController@profile_afterEdt');
Route::post('/profile', 'UserprofileController@create');//画像アップロード

Route::get('/profile_edt', 'UserprofileController@profile_edt');
Route::get('/profile_edt', 'UserprofileController@profile');

Route::post('/profile_edt', 'UserprofileController@update');


//****メンバー募集記事投稿****
Route::get('/article_edt', 'PostArticleController@articleindex');
Route::get('/article_edt', 'PostArticleController@usid');

Route::post('/article_edt', 'PostArticleController@ArticleRegist');

//****メッセージ****
Route::get('/message', function () {
    return view('message');
});
Route::get('/message', 'MessageController@MessageHistory');
Route::post('/message', 'MessageController@PostMessage');

//Route::get('/message', 'MessageController@ShowMessage');

//Route::get('/message/{id}', 'MainController@sendmessage');

//Route::get('/message_r', function () {
//    return view('message_r');
//});
//Route::get('/message_r', 'MessageController@MessageHistory');
//Route::get('/message_r', 'MainController@sendmessage');

//Route::get('/message_react', function () {
//    return view('message_react');
//});

//Route::get('/message_react','MainController@sendmessage');

//Route::get('/message', 'MessageController@show');
//Route::post('/message', 'MessageController@postIndex');

//****認証関係のルーティング****
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
