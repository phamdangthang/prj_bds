<?php

namespace App\Modules\Web\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class ProjectController extends AppController
{
    public function index() {
    	return view('web::project.index');
    }

    public function detail() {
    	return view('web::project.detail');
    }
}
