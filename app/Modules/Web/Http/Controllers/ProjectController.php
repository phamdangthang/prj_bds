<?php

namespace App\Modules\Web\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProjectWebRequest;
use App\Models\Project;
use App\Models\Category;
use App\Models\City;
use DB;
use Str;
use File;
use App\Http\Controllers\Controller;

class ProjectController extends AppController
{
    private $project;

    public function __construct(Project $project) {
        parent::__construct();
        $this->project = $project;
    }

    public function index() {
        $projects = $this->project->paginate(PAGE_LIMIT);
        
        $viewData = [
            'projects' => $projects
        ];
    	return view('web::project.index', $viewData);
    }

    public function news() {
        $images = [];
        for ($i = 1; $i <= 10; $i++) {
            $images[$i] = '';
        }
        $projects = Category::where('type', PROJECT)->get();
        $categories = Category::where('type', NEWS)->get();
        $cities = City::all();

        $dataView = [
            'images' => $images,
            'projects' => $projects,
            'categories' => $categories,
            'cities' => $cities,
        ];
    	return view('web::project.new', $dataView);
    }

    public function postNews(ProjectWebRequest $request) {
        $params = $request->all();
        DB::beginTransaction();

        $dataInsert = [
            'category_id' => $params['category_id'],
            'city_id' => $params['city_id'],
            'address' => $params['address'],
            'price' => $params['price'],
            'guide' => $params['guide'],
            'usage_status' => $params['usage_status'],
            'status' => PENDING,
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
        ];

        try {
            $images = $params['images'];
            if (isset($images) && count($images) > 0) {
                $folderName = '/images/project/'.auth()->user()->id.'/images';
                foreach ($images as $key => $file) {
                    $fileName = time().$key.'.'.$file->getClientOriginalExtension();
                    if (!File::exists(public_path($folderName))) {
                        File::makeDirectory(public_path($folderName), 0777, true);
                    }
                    $file->move(public_path($folderName), $fileName);
                    $dataImages[] = [$folderName.'/'.$fileName];
                }
                $dataInsert = array_merge($dataInsert, [
                    'images' => json_encode($dataImages)
                ]);
            }
            $this->project->create($dataInsert);
            DB::commit();
            return redirect()->back()->with('alert-success', 'Đăng tin thành công, hãy chờ kiểm duyệt viên duyệt tin của bạn');
        } catch (Throwable $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error', 'Đăng tin dự án không thành công');
        }
    }

    public function detail() {
    	return view('web::project.detail');
    }
}
