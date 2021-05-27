<?php

namespace App\Modules\Web\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Project;
use App\Models\Blog;
use App\Http\Controllers\Controller;

class HomeController extends AppController
{
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        $projects = Project::where('status', 'approved')->orderBy('created_at', 'desc')->paginate(15);

        $viewData = [
            'projects' => $projects
        ];
    	return view('web::home', $viewData);
    }
}
