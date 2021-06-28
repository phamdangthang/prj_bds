<?php

namespace App\Modules\Web\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProjectWebRequest;
use App\Models\Project;
use App\Models\Category;
use App\Models\City;
use App\Models\Contract;
use App\Models\Transaction;
use DB;
use Str;
use File;
use App\Http\Controllers\Controller;
use App\Models\Blog;

class ProjectController extends AppController
{
    private $project;

    public function __construct(Project $project) {
        parent::__construct();
        $this->project = $project;
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
            'short_content' => $params['short_content'],
            'city_id' => $params['city_id'],
            'address' => $params['address'],
            'price' => $params['price'],
            'guide' => $params['guide'],
            'usage_status' => $params['usage_status'],
            'status' => PENDING,
            'acreage' => $params['acreage'],
            'number_of_bedrooms' => $params['number_of_bedrooms'],
            'number_of_toilets' => $params['number_of_toilets'] ?? $params['inputnumber-wc'],
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
                    $dataImages[] = $folderName.'/'.$fileName;
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

    public function detail($slug, $id) {
        $project = $this->project->where([
            'id' => $id,
            'slug' => $slug
        ])->first();
        
        $viewData = [
            'project' => $project
        ];
    	return view('web::project.detail', $viewData);
    }

    function vn_to_str ($str) {
    	$unicode = array(
    		'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
    		'd'=>'đ',
    		'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
    		'i'=>'í|ì|ỉ|ĩ|ị',
    		'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
    		'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
    		'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
    		'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
    		'D'=>'Đ',
    		'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
    		'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
    		'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
    		'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
    		'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    	);

    	foreach($unicode as $nonUnicode=>$uni){
    		$str = preg_replace("/($uni)/i", $nonUnicode, $str);
    	}
    	$str = str_replace(' ','_',$str);

    	return $str;
    }

    public function order($id)
    {
        DB::beginTransaction();
        try {
            $project = $this->project->findOrFail($id);

            $contract = Contract::create([
                'code' => 'HD',
                'project_id' => $id,
                'user_id' => auth()->id(),
                'status' => 1,
                'total_money' => $project->price,
            ]);

            $transaction = Transaction::create([
                'code' => 'GD',
                'contract_id' => $contract->id,
                'admin_id' => $project->admin_id,
                'name' => 'Ký Thỏa thuận đặt cọc "TTĐC"',
                'description' => '5% giá bán cắn hộ',
                'percent' => 5,
                'duration' => date('Y-m-d'),
                'total_money' => $contract->total_money * 5 / 100,
                'status' => 0,
            ]);

            $transaction->update([
                'code' => 'GD'.$transaction->id
            ]);

            $contract->update([
                'code' => 'HD'.$contract->id.$this->vn_to_str(mb_strtoupper(str_replace(' ', '', auth()->user()->name), 'UTF-8')),
            ]);

            $project->update([
                'status' => 'order'
            ]);


            DB::commit();
            return redirect('/')->with('alert-success', 'Đặt mua dự án thành công!');
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
            return redirect()->back()->with('alert-error', 'Đặt mua dự án thất bại!');
        }
    }

    public function projectCategory($slug, $id) {
        $category = Category::findOrFail($id);
        $projects = Project::where('category_id', $id)->where('status', APPROVED)->paginate(PAGE_LIMIT);
        $hot_news = Blog::where('is_hot', 1)->orderBy('created_at')->get();

        $viewData = [
            'projects' => $projects,
            'category' => $category,
            'hot_news' => $hot_news,
        ];
        return view('web::project.index', $viewData);
    }
}
