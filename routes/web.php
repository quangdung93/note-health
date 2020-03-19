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

Route::get('database', function(){
	Schema::create('thang', function (Illuminate\Database\Schema\Blueprint $table) {
            $table->increments('id');
            $table->char('name')->nullable();
            $table->timestamps();
        });
});

Route::get('/','Auth\LoginController@getLogin');
Route::post('login','Auth\LoginController@postLogin')->name('login');
Route::get('logout','DashboardController@getLogout');

//send mail order 
Route::get('sendmail/order','DashboardController@getSendMailOrder');
Route::post('sendmail/order','DashboardController@postSendMailOrder');


//send mail hosting
Route::get('sendmail/hosting','DashboardController@getSendMailHosting');
Route::post('sendmail/hosting','DashboardController@postSendMailHosting');


Route::group(['prefix'=>'admin'],function(){
	Route::get('dashboard','DashboardController@index')->name('index');

	Route::get('add','NoteController@getAdd');
	Route::post('add','NoteController@postAdd');

	Route::get('edit/{id}','NoteController@getEdit');
	Route::post('edit/{id}','NoteController@postEdit');

	Route::get('detail/{id}','NoteController@getDetail');
	Route::get('detail/ajax/{id}','NoteController@getData')->name('detail');
	Route::get('detail/compare/{id}/{compareid}','NoteController@getDataCompare')->name('compare');

	Route::group(['prefix'=>'index'],function(){
		Route::get('view','NoteController@getViewIndex');
		Route::get('add','NoteController@getAddIndex');
		Route::post('add','NoteController@postAddIndex');
		Route::get('edit/{id}','NoteController@getEditIndex');
		Route::post('edit/{id}','NoteController@postEditIndex');
	});
});