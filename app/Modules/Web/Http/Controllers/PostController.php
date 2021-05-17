<?php

namespace App\Modules\Web\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class PostController extends AppController
{
    public function index() {
        return view('web::post.index');
    }

    public function news() {
    	return view('web::post.new');
    }

    public function detail() {
        return view('web::post.detail');
    }
}
