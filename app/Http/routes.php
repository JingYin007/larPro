<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
/**
 * 测试 使用闭包 输出服务器当前时间
 */
Route::get('now', function () {
    return date("Y-m-d H:i:s");
});
Route::auth();
//路由参数
Route::get('article/{id}', 'ArticleController@show');
Route::post('comment', 'CommentController@store');
/*Route::get('/home', 'HomeController@index');*/
Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/', 'HomeController@index');
    //Route::get('article', 'ArticleController@index');
    Route::resource('article', 'ArticleController');
});



/**
 * 多请求路由
*/
Route::match(['get','post'],'mult1',function (){
    return 'mult1';
});
Route::any('multy2',function (){
    return 'multy2';
});

/**
 * 路由参数
 */
/*Route::get('user/{name?}',function ($name= 'China'){
    return 'User-Name:'.$name;
});*/
Route::get('mo/{id}/{name?}',function ($id,$name= 'Tea'){
    return 'User-id-'.$id.'-Name-'.$name;
})->where(['id'=>'[0-9]+','name'=>'[A-Za-z]+']);

//路由别名
Route::get('mo2/center',['as'=>'center',function (){
    return route('center');
}]);

//路由群组
Route::group(['prefix'=>'mo3'],function(){
    Route::get('mo4/', function (){
        return 'mo4';
    });
    Route::get('mo5', function(){
            return 'mo5';
        });
});


Route::get('baby', 'BabyController@index');
Route::get('baby/info', 'BabyController@info');
Route::get('baby/test', 'BabyController@test');
Route::get('baby/test2', 'BabyController@test2');
Route::any('orm1', 'BabyController@orm1');
Route::any('orm2', 'BabyController@orm2');
Route::any('orm3', 'BabyController@orm3');

Route::any('section', 'BabyController@section');
Route::any('request', 'BabyController@request');


Route::any('session', 'BabyController@session');
Route::any('session2', 'BabyController@session2');
Route::any('response', 'BabyController@response');
Route::any('response2', 'BabyController@response2');






