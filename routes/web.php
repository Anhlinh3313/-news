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
use App\TheLoai;
Route::get('/', function () {
    return view('welcome');
});
Route::get('thu',function(){
	$theloai = TheLoai::find(1);
	foreach($theloai->loaitin as $loaitin){
		echo $loaitin->Ten."<br>";
	}
});
Route::get('layout',function(){
	return view('admin.theloai.danhsach');
});
Route::group(['prefix'=>'admin'],function(){   
	Route::group(['prefix'=>'theloai'],function(){
		// admin/theloai/them
        Route::get('danhsach','TheLoaiController@getDanhSach');
        Route::get('sua','TheLoaiController@getSua');
        Route::get('them','TheLoaiController@getThem');

	});
	Route::group(['prefix'=>'loaitin'],function(){
		// admin/loaitin/danhsach
        Route::get('danhsach','LoaiTinController@getDanhSach');
        Route::get('sua','LoaiTinController@getSua');
        Route::get('them','LoaiTinController@getThem');

	});
	Route::group(['prefix'=>'tintuc'],function(){
		// admin/tintuc/them
        Route::get('danhsach','TinTucController@getDanhSach');
        Route::get('sua','TinTucController@getSua');
        Route::get('them','TinTucController@getThem');

	});
	Route::group(['prefix'=>'user'],function(){
		// admin/user/them
        Route::get('danhsach','UserController@getDanhSach');
        Route::get('sua','UserController@getSua');
        Route::get('them','UserController@getThem');

	});
	Route::group(['prefix'=>'user'],function(){
		// admin/user/them
        Route::get('danhsach','UserController@getDanhSach');
        Route::get('sua','UserController@getSua');
        Route::get('them','UserController@getThem');

	});
});