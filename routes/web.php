<?php

use App\Notifications\InvoicePaid;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/slack', function () {
    $user = new App\User;
    $user->notify(new \App\Notifications\SlackPosted);
});

Route::get('/log', function () {
    // テスト用のユーザーデータをファクトリーで作成
    $user = factory(App\User::class)->create();

    // イベントを生成
    event(new App\Events\OrderShipped($user));
});

Route::get('/foo', function () {
    return 'Hello World';
});

// Route::get('user/{id}', function ($id) {
//     return 'User '.$id;
// });

Route::get('user/{name?}', function ( $name='Jack' ) {
    return 'User '.$name ;
});

Route::get('posts/{post}/{comment}', function($postId,$comment){
    return 'postID:'.$postId.',comment:'.$comment;
});

Route::get('username/{name?}', function ($name='Jack' ) {
    return 'User '.$name ;
})->where('name','[A-Za-z]+');
