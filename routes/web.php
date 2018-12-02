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

//Home
Route::group(['middleware' => 'web', 'namespace' => 'Home'], function () {


    Route::post('/supp/index', 'SuppController@index');   //测试
    Route::post('/supp/test', 'SuppController@test');   //测试


    Route::any('/websocket/index', 'WebsocketController@index');   //websocket



    Route::get('/supp/suppList', 'SuppController@suppList');                  //商家管理

    //商家相关模块
    Route::match(['get', 'post'], '/supp/getSuppList', 'SuppController@getSuppList');  //商家列表
    Route::match(['get', 'post'],'/supp/suppAdd', 'SuppController@suppAdd');   //新增商家
    Route::match(['get', 'post'],'/supp/suppEdit', 'SuppController@suppEdit');   //更新商家
    Route::post('/supp/updateStatus', 'SuppController@updateStatus');   //上下架商家（更新状态）
    Route::get('/supp/export', 'SuppController@export');                  //商家导出
    Route::any('/supp/importSupp', 'SuppController@importSupp');        //csv批量导入商家数据


    //ajax api
    Route::any('/supp/getValidSupp', 'SuppController@getValidSupp');  //获取有效商家


});