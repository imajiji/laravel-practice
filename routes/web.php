<?php

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
    // テスト用のユーザーデータをファクトリーで作成
    $user = factory(App\User::class)->create();

    // イベントを生成
    event(new App\Events\OrderShipped($user));

    return view('welcome');
});
