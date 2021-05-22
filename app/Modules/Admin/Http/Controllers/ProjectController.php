<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Requests\ProjectCreateRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Http\Controllers\Controller;
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
        $images = [];
        for ($i = 1; $i <= 10; $i++) {
            $images[$i] = '';
        }
        $projectStatus = $this->project_status;

        $viewData = [
            'categories' => $categories,
            'cities' => $cities,
            'images' => $images,
            'projectStatus' => $projectStatus,
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
        $cities = City::all();
        $projects = Category::where('type', PROJECT)->get();
        $images = json_decode($dataEdit->images);
        for ($i = 1; $i <= 10; $i++) {
            if (isset($images[$i])) {
                $images[$i] = $images[$i]->url;
            } else {
                $images[$i] = '';
            }
        }
        $projectStatus = $this->project_status;

        $viewData = [
            'dataEdit' => $dataEdit,
            'cities' => $cities,
            'projects' => $projects,
            'images' => $images,
            'projectStatus' => $projectStatus,
        ];
        return view('admin::project.edit', $viewData);
    }

    public function update(ProjectUpdateRequest $request, $id) {
        $params = $request->all();
        $project = $this->project->find($id);

        $dataInsert = [
            'category_id' => $params['category_id'],
            'city_id' => $params['city_id'],
            'address' => $params['address'],
            'price' => $params['price'],
            'guide' => $params['guide'],
            'usage_status' => $params['usage_status'],
            'status' => APPROVED,
            'acreage' => $params['acreage'],
            'number_of_bedrooms' => $params['number_of_bedrooms'],
            'number_of_toilets' => $params['number_of_toilets'],
            'name' => $params['name'],
            'slug' => Str::slug($params['name']),
            'description' => $params['description'],
            'door_direction' => $params['door_direction'],
            'balcony_direction' => $params['balcony_direction'],
            'floor' => $params['floor'],
            'apartment_number' => $params['apartment_number'],
            'user_id' => auth()->user()->id,
            'note' => $params['note'],
        ];
        dd($params['images']);

        if (isset($params['images']) && count($params['images']) > 0) {
            $dataImages = [];
            $folderName = '/images/project/'.auth()->user()->id.'/images';
            foreach ($params['images'] as $key => $url) {
                if ($url) {
                    if (is_file($url)) {
                        $fileName = time().$key.'.'.$file->getClientOriginalExtension();
                        if (!File::exists(public_path($folder_name))) {
                            $org_img = File::makeDirectory(public_path($folder_name), 0777, true);
                        }
                        $file->move(public_path($folder_name), $fileName);
                        $dataImages[] = [
                            'index' => $key,
                            'url' => $folderName.'/'.$fileName
                        ];
                    } else {
                        $dataImages[] = [
                            'index' => $key,
                            'url' => $url
                        ];
                    }
                }
            }
            $dataInsert = array_merge($dataInsert, [
                'images' => json_encode($dataImages)
            ]);
        }

        $updated = $project->update($dataInsert);
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
