<?php

namespace App\Http\Controllers\House;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index() {
        $title = "Trang Chủ";
        return view("house.index.index",compact('title'));
    }
}
