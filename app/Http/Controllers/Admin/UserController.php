<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\DB;
use App\User;


class UserController extends Controller
{
    public function index() {
    	$objUsers = User::all();
    	return view('admin.users.index',compact('objUsers'));
    }

    public function get_Add() {
    	return view('admin.users.add');
    }


    public function post_Add(UsersRequest $request) {
    	try {
    		DB::beginTransaction();
    		$password = bcrypt($request->password); //add here random password
			$user 				= new User();
			$user->email 		= $request->email;
			$user->name 		= $request->username;
			$user->password 	= $password; 
			if($user->save()) {
				$request->session()->flash('msg','Thêm thành công!');
				DB::commit();
            	return redirect()->route('admin.users.index');
			} else {
				$request->session()->flash('msg','Thêm thất bại!');
            	return redirect()->route('admin.users.add');
			}
    	} catch(\Exception $e) {
    			DB::rollback();
	    		$request->session()->flash('msg','Thêm thất bại!');
	        	return redirect()->route('admin.users.add');
    	}
    }


    public function post_ChangePass(Request $request) {
        try{
            $id             = $request->input('id');
            $password       = $request->input('password');
            $user = User::findOrFail($id);
            $user->password = bcrypt($password);
            $user->save();
            return response()->json(['success'=> 'Reset mật khẩu thành công !']);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'Không reset được mật khẩu !']);
        }
    }

    public function active_User(Request $request) {
        try{
            $id             = $request->input('id');
            $active         = $request->input('active');
            $user = User::findOrFail($id);
            if($active == 0) {
                $user->active = 1;
            } else {
                $user->active = 0;
            }
            $user->save();
            return response()->json(['success'=> 'Thao tác thành công !']);
        }
        catch(\Exception $e){
            return response()->json(['error'=> 'Thao tác tất bại']);
        }


    }
}
