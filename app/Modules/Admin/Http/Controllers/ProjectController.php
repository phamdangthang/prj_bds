<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    private $project;

    public function __construct(Project $project) {
        return $this->project = $project;
    }

    public function index(Request $request) {
        $query = $this->project->query();

        if ($request->has('search')) {
            $query = $query->where('name', 'like', '%'.$request->search.'%');
        }

        $result = $query->paginate(10);

        $viewData = [
            'result' => $result,
            'search' => $request->search,
        ];

        return view("admin::project.index", $viewData);
    }
}
