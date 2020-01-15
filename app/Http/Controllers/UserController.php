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

     public function getSua($id){
    	$user=User::find($id);
        return view('admin.user.sua',['user'=>$user]);
    }
    public function postSua(Request $request,$id){
        $this->validate($request,[
            'name'=>'required|min:3',
        ],[
            'name.required'=>'bạn chưa nhập tên',
            'name.min'=>'tên người dùng ít hơn 3 kí tự',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->quyen= $request->quyen;

        if($request->changePassword=="on"){
             $this->validate($request,[
            'password'=>'required|min:3|max:32',
            'passwordAgain'=>'required|same:password'
        ],[
            'password.required'=>'Bạn chưa nhập password',
            'password.min'=>'password nhỏ hơn 3 kí tự',
            'password.max'=>'password dài hơn 32 kí tự',
            'passwordAgain.required'=>'bạn chưa nhập lại password',
            'passwordAgain.same'=>'password không khớp'
        ]);
             $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect('admin/user/sua/'.$id)->with('thongbao','ban da sua thanh cong');
    }

     public function getThem(){
    	return view('admin.user.them');
    }
    public function postThem(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:3|max:32',
            'passwordAgain'=>'required|same:password'
        ],[
            'name.required'=>'bạn chưa nhập tên',
            'name.min'=>'tên người dùng ít hơn 3 kí tự',
            'email.required'=>'bạn chưa nhập email',
            'email.email'=>'email chưa đúng',
            'email.unique'=>'email đã tồn tại',
            'password.required'=>'Bạn chưa nhập password',
            'password.min'=>'password nhỏ hơn 3 kí tự',
            'password.max'=>'password dài hơn 32 kí tự',
            'passwordAgain.required'=>'bạn chưa nhập lại password',
            'passwordAgain.same'=>'password không khớp'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->quyen = $request->quyen;
        $user->save();

        return redirect('admin/user/them')->with('thongbao','thêm thành công');
    }
    public function getxoa($id){
        $user= User::find($id);
        $user->delete();
        return redirect('admin/user/danhsach')->with('thongbao','xoa thanh cong');
    }
}
