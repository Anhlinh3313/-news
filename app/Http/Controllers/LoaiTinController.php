<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;

class LoaiTinController extends Controller
{
    //
    public function getDanhSach(){
      $loaitin = LoaiTin::all();
      return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
    }

    public function getThem(){
        $theloai = TheLoai::all();
        return view('admin.loaitin.them',['theloai'=>$theloai]);
    }
    public function postThem(Request $request){
     $this->validate($request,
            [
                'Ten'=>'required|unique:loaitin,Ten|min:3|max:200',
                'TheLoai'=>'required'
            ],
            [
                'Ten.required'=>'Bạn chưa nhập loại tin',
                'Ten.unique'=>'Tên loại tin đã tồn tại',
                'Ten.min'=>'Tên thể loại phải có chiều dài là 3 đến 200 kí tự',
                'Ten.max'=>'Tên thể loại phải có chiều dài là 3 đến 200 kí tự',
                'TheLoai.required'=>'Bạn chưa chọn thể loại',
            ]);

         $loaitin = new LoaiTin;
         $loaitin ->Ten = $request->Ten;
         $loaitin ->TenKhongDau = changeTitle($request->Ten);
         $loaitin ->idTheLoai = $request->TheLoai;
         $loaitin->save();

         return redirect('admin/loaitin/them')->with('thongbao','thêm thành công');
    }

     public function getSua($id){
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::find($id);
        return view('admin.loaitin.sua',['loaitin'=>$loaitin,'theloai'=>$theloai]);
    }
     public function postSua(Request $request, $id){
    $loaitin =Loaitin::find($id);
         $this->validate($request,
            [
                'Ten'=>'required|unique:LoaiTin,Ten|min:3|max:200'  
            ],
            [
                'Ten.unique'=>'Bạn chưa nhập thể loại',
                'Ten.required'=>'Bạn chưa nhập thể loại',
                'Ten.min'=>'Tên thể loại phải có chiều dài là 3 đến 200 kí tự',
                'Ten.max'=>'Tên thể loại phải có chiều dài là 3 đến 200 kí tự',
            ]);
         $loaitin = Loaitin::find($id);
         $loaitin ->Ten = $request->Ten;
         $loaitin ->TenKhongDau = changeTitle($request->Ten);
         // $Loaitin->idTheLoai = $request->TheLoai;
         $loaitin->save();

         return redirect('admin/loaitin/sua/'.$id)->with('thongbao','thêm thành công');
    }
    public function getXoa($id){
        $loaitin = Loaitin::find($id);
        $loaitin->delete(); 

        return redirect('admin/loaitin/danhsach')->with('thongbao','xoá thành công');
    }

}
