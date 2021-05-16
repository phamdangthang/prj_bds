<?php

namespace App\Modules\Web\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
    	return view('web::web.index');
    }

    public function newsCategory()
    {
    	return view('web::web.news-category');
    }

    public function projectCategory()
    {
    	return view('web::web.project-category');
    }

    public function projectDetail()
    {
    	return view('web::web.project-detail');
    }

    public function postNews()
    {
    	return view('web::web.post-news');
    }
}
