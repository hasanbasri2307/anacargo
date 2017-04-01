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

Route::get('/', "Auth\LoginController@showLoginForm");

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware'=>'auth'],function(){
	//client
	Route::get("customers","CustomerController@index");
	Route::get("customer/create","CustomerController@create");
	Route::post("customer/store","CustomerController@store");
	Route::get("customer/edit/{id}","CustomerController@edit");
	Route::post("customer/update/{id}","CustomerController@update");
	Route::get("customer/show/{id}","CustomerController@show");
	Route::delete("customer/delete/{id}","CustomerController@delete");
	Route::get("customer/import","CustomerController@showImport");
	Route::post("customer/import","CustomerController@doImport");

	//user
	Route::get("users","UserController@index");
	Route::get("user/create","UserController@create");
	Route::post("user/store","UserController@store");
	Route::get("user/edit/{id}","UserController@edit");
	Route::patch("user/update/{id}","UserController@update");
	Route::get("user/show/{id}","UserController@show");
	Route::get("user/change-password/{id}","UserController@changePasswordForm");
	Route::post("user/change-password/{id}","UserController@changePassword");
	Route::delete("user/delete/{id}","UserController@delete");
	Route::get("user/profile","UserController@showProfile");
	Route::post("user/profile","UserController@profile");
	Route::post("user/profile/change-password","UserController@profileChangePassword");


	//cn pibk
	Route::get("cnpibk",'CnpibkController@index');
	Route::get("cnpibk/create",'CnpibkController@create');
	Route::get("cnpibk/show/{id}",'CnpibkController@showById');
	Route::post("cnpibk/store",'CnpibkController@store');
	Route::get("cnpibk/edit/{id}",'CnpibkController@edit');
	Route::post("cnpibk/update/{id}",'CnpibkController@update');
	Route::post("cnpibk/delete/header-pungutan",'CnpibkController@deleteHeaderPungutan');
	Route::post("cnpibk/delete/detail-barang",'CnpibkController@deleteDetailBarang');
	Route::get("cnpibk/editbc11/{id}",'CnpibkController@editBc11');
	Route::post("cnpibk/updatebc/{id}",'CnpibkController@updateBc11');
	Route::get("cnpibk/tracking/{id}",'CnpibkController@tracking');
	Route::post("cnpibk/cekstatus",'CnpibkController@cekStatus');
	Route::get("cnpibk/getallresponse",'CnpibkController@getAllResponse');

	//customer
	Route::get("customer/get/{id}",'CustomerController@getById');

	//jenis angkutan
	Route::get("jenisAngkutan/get/{id}",'JenisAngkutanController@getById');

	//
	Route::post("sendpibk","CnpibkController@sendPiBk");
});
