<?php

namespace App\Http\Controllers\House;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatController extends Controller
{
    public function index($name){
    	echo 1;
    	die();
    	return view('house.cat.index');
    }
}
