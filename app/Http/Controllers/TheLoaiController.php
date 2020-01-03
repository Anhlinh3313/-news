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
    public function getSua($id){
        $theloai =TheLoai::find($id);
        return view('admin.theloai.sua',['theloai'=>$theloai]);
    }
    public function postSua(Request $request,$id){
        $theloai =TheLoai::find($id);
         $this->validate($request,
            [
                'Ten'=>'required|unique:TheLoai,Ten|min:3|max:200'  
            ],
            [
                'Ten.unique'=>'Bạn chưa nhập thể loại',
                'Ten.required'=>'Bạn chưa nhập thể loại',
                'Ten.min'=>'Tên thể loại phải có chiều dài là 3 đến 200 kí tự',
                'Ten.max'=>'Tên thể loại phải có chiều dài là 3 đến 200 kí tự',
            ]);
         $theloai ->Ten = $request->Ten;
         $theloai ->TenKhongDau = changeTitle($request->Ten);
         $theloai->save();

         return redirect('admin/theloai/sua/'.$id)->with('thongbao','thêm thành công');
    }
    public function getXoa($id){
        $theloai =TheLoai::find($id);
        $theloai->delete(); 

        return redirect('admin/theloai/danhsach')->with('thongbao','xoá thành công');
    }
}
