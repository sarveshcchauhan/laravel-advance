<?php

use App\PostCard;
use App\PostCardSendingService;


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

Route::get('pay','PayOrderController@store');

Route::get('channel','ChannelController@index');

Route::get('create','PostController@create');

// Option 1
Route::get('postcard',function(){

    $postcardservice = new PostCardSendingService('us',4,6);

    $postcardservice->hello('Hello from web ','test@test.com');
});

// Option 2
Route::get('facades',function(){
    PostCard::hello('Hellow From Facades', 'abc@abc.com');
});
