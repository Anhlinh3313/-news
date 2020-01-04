<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;

class PageController extends Controller
{
    //
    function trangchu(){
    	$theloai = TheLoai::all();
    	return view('page.trangchu',['theloai'=>$theloai]);
    }
     function lienhe(){
    	$theloai = TheLoai::all();
    	return view('page.lienhe',['theloai'=>$theloai]);
    }
}
