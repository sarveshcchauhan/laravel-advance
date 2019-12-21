<?php

use App\PostCard;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Str;
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

//SERVICE CONTAINER
Route::get('pay','PayOrderController@store');

//VIEWS
Route::get('channel','ChannelController@index');

Route::get('create','PostController@create');

//FACADES

// Option 1
Route::get('postcard',function(){

    $postcardservice = new PostCardSendingService('us',4,6);

    $postcardservice->hello('Hello from web ','test@test.com');
});

// Option 2
Route::get('facades',function(){
    PostCard::hello('Hellow From Facades', 'abc@abc.com');
});


//MACROS
Route::get('mobile',function(){
    return [Str::partNumber('3698521470'),
    Str::prefix('54445','AC')];
});

Route::get('errors',function (){
   return ResponseFactory::errorJson("hey custom message","544");
});

//Pipelines
Route::get('structure','StructureController@index');
