<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Requests\ProjectCreateRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Category;
use App\Models\City;
use Str;
use File;

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
        $projects = Category::where('type', PROJECT)->get();
        $projectStatus = $this->project_status;

        $viewData = [
            'categories' => $categories,
            'cities' => $cities,
            'projects' => $projects,
            'projectStatus' => $projectStatus,
            'projectImages' => [],
            'dataEdit' => '',
            'customer' => auth()->guard('admin')->user()
        ];
        return view('admin::project.create', $viewData);
    }

    public function store(ProjectCreateRequest $request) {
        $params = $request->all();
        $dataSave = $this->getDataSave($params);
        
        $created = $this->project->insert($dataSave);
        if ($created) {
            return redirect()->route('admin.project.index')->with('alert-success', 'Tạo dự án thành công');
        }
        return redirect()->back()->with('alert-danger', 'Tạo dự án thất bại');
    }

    public function edit($id) {
        $dataEdit = $this->project->find($id);
        $cities = City::all();
        $projects = Category::where('type', PROJECT)->get();
        $projectStatus = $this->project_status;
        $projectImages = json_decode($dataEdit->images);

        $viewData = [
            'dataEdit' => $dataEdit,
            'cities' => $cities,
            'projects' => $projects,
            'projectImages' => $projectImages,
            'projectStatus' => $projectStatus,
            'customer' => User::findOrFail($dataEdit->user_id)
        ];
        return view('admin::project.edit', $viewData);
    }

    public function update(ProjectUpdateRequest $request, $id) {
        $params = $request->all();
        $project = $this->project->find($id);
        $dataSave = $this->getDataSave($params);

        $updated = $project->update($dataSave);
        if ($updated) {
            return redirect()->route('admin.project.index')->with('alert-success', 'Cập nhật dự án thành công');
        }
        return redirect()->back()->with('alert-danger', 'Cập nhật dự án thất bại');
    }

    public function getDataSave($params) {
        $dataSave = [
            'category_id' => $params['category_id'],
            'city_id' => $params['city_id'],
            'address' => $params['address'],
            'price' => $params['price'],
            'guide' => $params['guide'],
            'usage_status' => $params['usage_status'],
            'status' => $params['status'],
            'acreage' => $params['acreage'],
            'number_of_bedrooms' => $params['number_of_bedrooms'],
            'number_of_toilets' => $params['number_of_toilets'],
            'name' => $params['name'],
            'slug' => Str::slug($params['name']),
            'description' => $params['description'],
            'door_direction' => $params['door_direction'],
            'balcony_direction' => $params['balcony_direction'],
            'building' => $params['building'],
            'floor' => $params['floor'],
            'apartment_number' => $params['apartment_number'],
            'user_id' => auth()->user()->id,
            'note' => $params['note'],
            'images' => json_encode($params['images'])
        ];

        return $dataSave;
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
