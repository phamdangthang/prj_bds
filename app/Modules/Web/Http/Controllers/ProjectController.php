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
            return redirect()->back()->with('alert-success', '????ng tin th??nh c??ng, h??y ch??? ki???m duy???t vi??n duy???t tin c???a b???n');
        } catch (Throwable $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error', '????ng tin d??? ??n kh??ng th??nh c??ng');
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
    		'a'=>'??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???',
    		'd'=>'??',
    		'e'=>'??|??|???|???|???|??|???|???|???|???|???',
    		'i'=>'??|??|???|??|???',
    		'o'=>'??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???',
    		'u'=>'??|??|???|??|???|??|???|???|???|???|???',
    		'y'=>'??|???|???|???|???',
    		'A'=>'??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???',
    		'D'=>'??',
    		'E'=>'??|??|???|???|???|??|???|???|???|???|???',
    		'I'=>'??|??|???|??|???',
    		'O'=>'??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???',
    		'U'=>'??|??|???|??|???|??|???|???|???|???|???',
    		'Y'=>'??|???|???|???|???',
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
                'name' => 'K?? Th???a thu???n ?????t c???c "TT??C"',
                'description' => '5% gi?? b??n c???n h???',
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
            return redirect('/')->with('alert-success', '?????t mua d??? ??n th??nh c??ng!');
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
            return redirect()->back()->with('alert-error', '?????t mua d??? ??n th???t b???i!');
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
