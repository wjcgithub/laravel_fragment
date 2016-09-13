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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return redirect('/blog');
});

Route::get('blog', 'BlogController@index');
Route::get('blog/{slug}', 'BlogController@showPost');

//路由分组
//Route::group(['middleware' => 'auth'], function () {
//    Route::get('/', function ()    {
//        // 使用 Auth 中间件
//    });
//
//    Route::get('user/profile', function () {
//        // 使用 Auth 中间件
//    });
//});

Route::get('/hello/laravelacademy',['as'=>'academy',function(){
    return 'Hello LaravelAcademy！';
}]);

Route::get('/test/customfacade',['as'=>'cf','uses'=>'TestController@customfacade']);

Route::get('/member/index', 'MemberController@index');


Route::get('test1', ['uses'=>'StudentController@test1']);
Route::get('querybuilderinsert', ['uses'=>'StudentController@querybuilderinsert']);
Route::get('querybuilderupdate', ['uses'=>'StudentController@querybuilderupdate']);
Route::get('querybuilderdelete', ['uses'=>'StudentController@querybuilderdelete']);
Route::get('querybuilderselect', ['uses'=>'StudentController@querybuilderselect']);
Route::get('querybuilderjuhe', ['uses'=>'StudentController@querybuilderjuhe']);

Route::get('ormselect', ['uses'=>'StudentController@ormselect']);  //查询
Route::get('orminsert', ['uses'=>'StudentController@orminsert']);  //新增
Route::get('ormupdate', ['uses'=>'StudentController@ormupdate']);  //更新


Route::get('section1', ['uses'=>'StudentController@section1']);  //更新
Route::get('urltest', ['as' => 'urlalias', 'uses'=>'StudentController@urlTest']);  //更新

Route::get('/res1', 'ResponseController@res1');
Route::get('/res2', 'ResponseController@res2');
Route::get('/redirect1', [
    'as' => 'redir1',
    'uses' => 'ResponseController@redirect1'
]);

Route::get('activity', ['uses'=>'MiddleController@activity']);  //更新

Route::group(['middleware' => ['activity']], function (){
    Route::get('activity1', ['uses'=>'MiddleController@activity1']);  //更新
    Route::get('activity2', ['uses'=>'MiddleController@activity2']);  //更新
});



