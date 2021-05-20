<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Requests\ProjectCreateRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;

class ProjectController extends Controller
{
    private $project;
    private $project_status = [
        'pending' => [
            'text' => 'Chờ duyệt',
            'label' => 'label-primary'
        ],
        'approved' => [
            'text' => 'Đã duyệt',
            'label' => 'label-bluelight'
        ],
        'order' => [
            'text' => 'Đặt hàng',
            'label' => 'label-warning'
        ],
        'complete' => [
            'text' => 'Hoàn thành',
            'label' => 'label-success'
        ],
        'cancel' => [
            'text' => 'Đã hủy',
            'label' => 'label-danger'
        ],
    ];

    public function __construct(Project $project) {
        return $this->project = $project;
    }

    public function index(Request $request) {
        $query = $this->project->query();

        if ($request->has('search')) {
            $query = $query->where('name', 'like', '%'.$request->search.'%');
        }

        $result = $query->paginate(10);

        $projectStatus = $this->project_status;

        $viewData = [
            'result' => $result,
            'search' => $request->search,
            'projectStatus' => $projectStatus,
        ];

        return view("admin::project.index", $viewData);
    }

    public function create() {
        $categories = Category::where('type', PROJECT)->get();
        $cities = City::all();

        $viewData = [
            'categories' => $categories,
            'cities' => $cities,
        ];
        return view('admin::project.create', $viewData);
    }

    public function store(ProjectCreateRequest $request) {
        $data = $request->all();
        $insert = [
            'name' => $data['name'],
            'slug' => $data['slug'],
            'type' => $data['type'],
        ];
        $created = $this->project->insert($insert);
        if ($created) {
            return redirect()->route('admin.project.index')->with('alert-success', 'Tạo dự án thành công');
        }
        return redirect()->back()->with('alert-danger', 'Tạo dự án thất bại');
    }

    public function edit($id) {
        $dataEdit = $this->project->find($id);
        $viewData = [
            'dataEdit' => $dataEdit
        ];
        return view('admin::project.edit', $viewData);
    }

    public function update(ProjectUpdateRequest $request, $id) {
        $data = $request->all();
        $project = $this->project->find($id);
        $updated = $project->update($data);
        if ($updated) {
            return redirect()->route('admin.project.index')->with('alert-success', 'Cập nhật dự án thành công');
        }
        return redirect()->back()->with('alert-danger', 'Cập nhật dự án thất bại');
    }

    public function delete($id) {
        $project = $this->project->findOrFail($id);
        $deleted = $project->delete();
        if ($deleted) {
            return redirect()->back()->with('alert-success', 'Xóa dự án thành công');
        } else {
            return redirect()->back()->with('alert-error', 'Xóa dự án thất bại');
        }
    }
}
