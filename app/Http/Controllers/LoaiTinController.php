<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;

class LoaiTinController extends Controller
{
    //
    public function getDanhSach(){
      $loaitin = LoaiTin::all();
      return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
    }

    public function getSua(){
   
    }

    public function getThem(){
     
    }
}
