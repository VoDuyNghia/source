<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\News;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index() {
    	$objNews = News::get();
    	return view('admin.news.index', compact('objNews'));
    }
}
