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
        Route::get('sua/{id}','TheLoaiController@getSua');
 		Route::post('sua/{id}','TheLoaiController@postSua');

        Route::get('them','TheLoaiController@getThem');
        Route::post('them','TheLoaiController@postThem');

        Route::get('xoa/{id}','TheLoaiController@getXoa');
	});
	Route::group(['prefix'=>'loaitin'],function(){
		// admin/loaitin/danhsach
        Route::get('danhsach','LoaiTinController@getDanhSach');

        Route::get('sua/{id}','LoaiTinController@getSua');
        Route::post('sua/{id}','LoaiTinController@postSua');


        Route::get('them','LoaiTinController@getThem');
        Route::post('them','LoaiTinController@postThem');

       Route::get('xoa/{id}','LoaiTinController@getXoa');
	});
	Route::group(['prefix'=>'tintuc'],function(){
		// admin/tintuc/danhsach
        Route::get('danhsach','TinTucController@getDanhSach');

        Route::get('sua/{id}','TinTucController@getSua');
        Route::post('sua/{id}','TinTucController@postSua');

        Route::get('them','TinTucController@getThem');
        Route::post('them','TinTucController@postThem');

        Route::get('xoa/{id}','TinTucController@getXoa');

	});
	Route::group(['prefix'=>'user'],function(){
		// admin/user/danhsach
        Route::get('danhsach','UserController@getDanhSach');

        Route::get('sua/{id}','UserController@getSua');
        Route::post('sua/{id}','UserController@postSua');

        Route::get('them','UserController@getThem');
        Route::post('them','UserController@postThem');

        Route::get('xoa/{id}','UserController@getXoa');

	});
	Route::group(['prefix'=>'ajax'],function(){

        Route::get('loaitin/{idTheLoai}','AjaxController@getLoaiTin');

	});
});
  Route::get('trangchu','PageController@trangchu');
  Route::get('lienhe','PageController@lienhe');
  Route::get('loaitin/{id}','PageController@loaitin');
  Route::get('gioithieu','PageController@gioithieu');