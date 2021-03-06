<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    //
    protected $table ="TheLoai";

    public function Loaitin()
    {
    	return $this->hasMany('App\Loaitin','idTheLoai','id');
    }
    public function tintuc(){
    	return $this->hasManyThrough('App\TinTuc','App\LoaiTin','idTheLoai','idLoaiTin','id');
    }
}
