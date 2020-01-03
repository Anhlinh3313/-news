<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\TinTuc;
use App\LoaiTin;

class TinTucController extends Controller
{
    //
    public function getDanhSach(){
        $loaitin = LoaiTin::all();
        $theloai = TheLoai::all();
        $tintuc = TinTuc::orderBy('id','DESC')->get();
        return view('admin.tintuc.danhsach',['tintuc'=>$tintuc,'theloai'=>$theloai,'loaitin'=>$loaitin]);
    }
     public function getThem(){
        $loaitin = LoaiTin::all();
        $theloai = TheLoai::all();
        return view('admin.tintuc.them',['theloai'=>$theloai,'loaitin'=>$loaitin]);
    }
    public function postThem(Request $request){
     $this->validate($request,
            [
                'LoaiTin'=>'required',
                'TieuDe'=>'required|unique:TinTuc,TieuDe|min:3|',
                'TomTat'=>'required',
                'NoiDung'=>'required'
            ],
            [
                'LoaiTin.required'=>'Bạn chưa nhập loại tin',
                'TieuDe.unique'=>'Tên tiêu đề đã tồn tại',
                'TieuDe.min'=>'Tên thể loại phải có chiều dài là 3 ',
                'TieuDe.required'=>'Bạn chưa chọn tiêu đề',
                'TomTat.required'=>'Bạn chưa nhập tóm tắt',
                'NoiDung.required'=>'Bạn chưa nhập Nội dung',
            ]);

         $tintuc = new TinTuc;
         $tintuc ->TieuDe = $request->TieuDe;
         $tintuc ->TieuDeKhongDau = changeTitle($request->TieuDe);
         $tintuc ->idLoaiTin = $request->LoaiTin;
         $tintuc ->TomTat = $request->TomTat;
         $tintuc ->NoiDung = $request->NoiDung;
         $tintuc ->SoLuotXem = 0;
         $tintuc->Hinh="";

         // if($request->hasFile('Hinh'))
         // {
         //      $file = $request->file('Hinh');
         //      $name = $file->getClientOriginalName();
         //      $Hinh = str_random(10).$name;
         //      while (file_exists("upload/tintuc/".$Hinh)) {
         //          $Hinh = str_random(10).$name;
         //      }
         //      $file->move("upload/tintuc",$Hinh);
         //      $tintuc->Hinh=$Hinh;
         // }else{
         //    $tintuc->Hinh="";
         // }


         $tintuc->save();

         return redirect('admin/tintuc/them')->with('thongbao','thêm thành công');
    }

     public function getSua($id){
        $loaitin = LoaiTin::all();
        $theloai = TheLoai::all();
        $tintuc = TinTuc::find($id);
        return view('admin.tintuc.sua',['tintuc'=>$tintuc,'theloai'=>$theloai,'loaitin'=>$loaitin]);
    }
     public function postSua(Request $request, $id){
    // $loaitin =Loaitin::find($id);
    //      $this->validate($request,
    //         [
    //             'Ten'=>'required|unique:LoaiTin,Ten|min:3|max:200'  
    //         ],
    //         [
    //             'Ten.unique'=>'Bạn chưa nhập thể loại',
    //             'Ten.required'=>'Bạn chưa nhập thể loại',
    //             'Ten.min'=>'Tên thể loại phải có chiều dài là 3 đến 200 kí tự',
    //             'Ten.max'=>'Tên thể loại phải có chiều dài là 3 đến 200 kí tự',
    //         ]);
    //      $loaitin = Loaitin::find($id);
    //      $loaitin ->Ten = $request->Ten;
    //      $loaitin ->TenKhongDau = changeTitle($request->Ten);
    //      // $Loaitin->idTheLoai = $request->TheLoai;
    //      $loaitin->save();

    //      return redirect('admin/loaitin/sua/'.$id)->with('thongbao','thêm thành công');
    // }
    // public function getXoa($id){
    //     $loaitin = Loaitin::find($id);
    //     $loaitin->delete(); 

    //     return redirect('admin/loaitin/danhsach')->with('thongbao','xoá thành công');
    }

   
}