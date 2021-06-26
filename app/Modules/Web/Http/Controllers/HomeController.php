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
    
    public function index(Request $request)
    {
        $projects = Project::where('status', 'approved');

        if ($request->name) {
            $projects = $projects->where('name', 'like', '%'.$request->name.'%');
        }

        if ($request->usage_status) {
            $projects = $projects->where('usage_status', $request->usage_status);
        }

        if ($request->city_id) {
            $projects = $projects->where('city_id', $request->city_id);
        }

        if ($request->acreage) {
            if ($request->acreage == "< 100") {
                $projects = $projects->where('acreage', '<', 100);
            }
            elseif ($request->acreage == "100 - 300") {
                $projects = $projects->where('acreage', '>=', 100)->where('acreage', '<=', 300);
            }
            elseif ($request->acreage == "> 300") {
                $projects = $projects->where('acreage', '>', 300);
            }
        }

        $projects = $projects->orderBy('created_at', 'desc')->paginate(15);
        $hot_news = Blog::where('is_hot', 1)->orderBy('created_at')->get();

        $viewData = [
            'projects' => $projects,
            'request' => $request,
            'hot_news' => $hot_news,
        ];
    	return view('web::home', $viewData);
    }
}
