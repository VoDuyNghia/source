<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() {
    	$title = "Admin | Dashboard";
    	return view("admin.index.index",compact('title'));
    }
}
