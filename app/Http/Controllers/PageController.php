<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
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
        $loaitin = LoaiTin::all();
    	view()->share(['theloai'=>$theloai],['loaitin'=>$loaitin]);
    }

    function getLoaiTin(){
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        return view('page.loaitin',['theloai'=>$theloai],['loaitin'=>$loaitin]);
    }

     function gioithieu(){
     	$theloai = TheLoai::all();
    	return view('page.gioithieu',['theloai'=>$theloai]);
    }

     function getDangNhap(){
    	return view('page.dangnhap');
    }
     function postDangNhap(Request $request){
     	$this->validate($request,[
 			'email'=>'required',
 			'password'=>'required|min:3|max:32'
     	],[
     		'email.required'=>'Bạn chưa nhập email',
     		'password.required'=>'Bạn chưa nhập password',
     		'password.min'=>'password không được nhỏ hơn 3 kí tự',
     		'password.max'=>'password không được lớn hơn 32 kí tự',
     	]);
     	if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
     	{
     		return redirect('trangchu');
     	}
     	else{
     		return redirect('danhnhap')->with('thongbao','đăn nhập không thành công');
     	}
    }

     function getTinTuc($id){
     	$tintuc = TinTuc::find($id);
     	$tinnoibat = TinTuc::where('NoiBat',1)->take(4)->get();
      	$tinlienquan = TinTuc::where('idLoaiTin',$tintuc->idLoaiTin)->take(4)->get();
      	return view('page.tintuc',['tintuc'=>$tintuc,'tinnoibat'=>$tinnoibat,'tinlienquan'=>$tinlienquan]);
     }
}
