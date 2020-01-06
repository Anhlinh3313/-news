<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
class PageController extends Controller
{
    //
    function trangchu(){
    	$theloai = TheLoai::all();
    	$loaitin = LoaiTin::all();
    	return view('page.trangchu',['theloai'=>$theloai],['loaitin'=>$loaitin]);
    }
     function lienhe(){
    	$theloai = TheLoai::all();
    	return view('page.lienhe',['theloai'=>$theloai]);
    }
    function _construct(){
    	$theloai = TheLoai::all();
    	view()->share('theloai',$theloai);
    }
    function loaitin($id){
    	$theloai = TheLoai::all();
    	$loaitin = LoaiTin::find($id);
    	$tintuc = TinTuc::where('idLoaiTin',$id)->paginate(5);
    	return view('page.loaitin',['theloai'=>$theloai],['loaitin'=>$loaitin],['tintuc'=>$tintuc]);
    }
     function gioithieu(){
     	$theloai = TheLoai::all();
    	return view('page.gioithieu',['theloai'=>$theloai]);
    }
}
