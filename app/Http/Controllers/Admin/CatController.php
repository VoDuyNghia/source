<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Http\Requests\CatRequest;
use Illuminate\Support\Facades\DB;

class CatController extends Controller
{

    public function __construct(Collection $objCollection){
        $this->objCollection = $objCollection;
    }


    public function index() {
    	$title = "Danh Sách | Danh Mục";
    	return view("admin.cat.index",compact('title'));
    }


    public function get_Add() {
        return view("admin.cat.add");
    }

    public function post_Add(CatRequest $request) {

	 	try {
            DB::beginTransaction();
            if($this->objCollection->add_Collection($request)) {
				$request->session()->flash('msg','Thêm thành công!');
				DB::commit();
            	return redirect()->route('admin.cat.index');
            } else {
            	$request->session()->flash('msg','Thêm thất bại');
            	return redirect()->route('admin.cat.add');
            }
    	} catch(\Exception $e) {
    		DB::rollBack();
            $request->session()->flash('msg','Thêm thất bại');
        	return redirect()->route('admin.cat.add');
    	}
    	
    }
}
