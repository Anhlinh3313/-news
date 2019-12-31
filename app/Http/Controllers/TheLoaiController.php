<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;

class TheLoaiController extends Controller
{
    //
    public function getDanhSach(){
    	$theloai = TheLoai::all();
        return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }

     public function getSua(){
    	

    }
     public function getThem(){
    	return view('admin.theloai.them');
    }

     public function postThem(Request $request){
         $this->validate($request,
            [
                'Ten'=>'required|min:3|max:200'
            ],
            [
                'Ten.required'=>'Bạn chưa nhập thể loại',
                'Ten.min'=>'Tên thể loại phải có chiều dài là 3 đến 200 kí tự',
                'Ten.max'=>'Tên thể loại phải có chiều dài là 3 đến 200 kí tự',
            ]);
         $theloai = new TheLoai;
         $theloai ->Ten = $request->Ten;
         $theloai ->TenKhongDau = changeTitle($request->Ten);
         $theloai->save();

         return redirect('admin/theloai/them')->with('thongbao','thêm thành công');
    }
}
