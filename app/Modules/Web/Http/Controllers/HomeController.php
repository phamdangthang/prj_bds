<?php

namespace App\Modules\Web\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class HomeController extends AppController
{
    public function index()
    {
    	return view('web::home');
    }
}
