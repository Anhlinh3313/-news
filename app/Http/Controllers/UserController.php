<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function getDanhSach(){
    	$user = User::all();
    	return view('admin.user.danhsach',['user'=>$user]);
    }
    public function getThem(){
     return view('admin.user.them');
    }
    public function postThem(Request $request){
     $this->validate($request,
            [
                'name'=>'required|min:3',
                'email'=>'required|unique:users,email|email',
                'password'=>'required|min:3|max:32',
                'passwordAgain'=>'required|same:password'
            ],
            [
                'name.required'=>'Bạn chưa nhập name',
                'name.min'=>'Tên lớn hơn 3 kí tự',
                'email.required'=>'mail rỗng',
                'email.unique'=>'mail đã tồn tại',
                'email.email'=>'phải nhập email',
                'password.required'=>'Bạn chưa chọn password',
                'password.min'=>'Bạn password lớn hơn 3',
                'password.max'=>'Bạn password nhỏ hơn 32',
                'passwordAgain.required'=>'Bạn chưa nhập password',
                'passwordAgain.same'=>' password chưa trùng ở trên'
            ]);

         $user = new User;
         $user ->name = $request->name;
         $user ->email = $request->email;
         $user ->password = bcrypt($request->password);
         $user ->quyen = $request->quyen;
         $user->save();

         return redirect('admin/user/them')->with('thongbao','thêm thành công');
    }
    public function getSua($id){
        $user = User::find($id);
        return view('admin.user.sua',['user'=>$user]);
    }
    public function postSua(Request $request, $id){
    $this->validate($request,
            [
                'name'=>'required|min:3',
            ],
            [
                'name.required'=>'Bạn chưa nhập name',
                'name.min'=>'Tên lớn hơn 3 kí tự',   
            ]);

         $user = User::find($id);
         $user ->name = $request->name;
         $user ->quyen = $request->quyen;
  
  		 if($request->changePassword =="on"){
  		 	$this->validate($request,
            [      
                'password'=>'required|min:3|max:32',
                'passwordAgain'=>'required|same:password'
            ],
            [
                'password.required'=>'Bạn chưa chọn password',
                'password.min'=>'Bạn password lớn hơn 3',
                'password.max'=>'Bạn password nhỏ hơn 32',
                'passwordAgain.required'=>'Bạn chưa nhập password',
                'passwordAgain.same'=>' password chưa trùng ở trên'
            ]);
                     $user ->password = bcrypt($request->password);
  		 }
         $user->save();
          return redirect('admin/user/sua/'.$id)->with('thongbao','thêm thành công');
    }
    public function getXoa($id){
        $user =User::find($id);
        $user->delete(); 

        return redirect('admin/user/danhsach')->with('thongbao','xoá thành công');
    }
}
