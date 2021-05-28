<?php

namespace App\Modules\Web\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\City;
use DB;
use Str;
use File;

use App\Http\Controllers\Controller;

class PostController extends AppController
{
    private $post;

    public function __construct(Blog $post) {
        parent::__construct();
        $this->post = $post;
    }

    // public function index() {
    //     $categories = Category::orderBy('id', 'desc')
    //         ->paginate(PAGE_LIMIT);
    //     $posts = $this->post->paginate(PAGE_LIMIT);

    //     $viewData = [
    //         'categories' => $categories,
    //         'posts' => $posts,
    //     ];
    //     return view('web::post.index', $viewData);
    // }

    public function newsCategory($slug, $id) {
        $category = Category::findOrFail($id);
        $posts = Blog::where('category_id', $id)->paginate(PAGE_LIMIT);
        // dd($posts);
        $categories = Category::where('type', NEWS)->get();


        $viewData = [
            'categories' => $categories,
            'category' => $category,
            'posts' => $posts
        ];
        return view('web::post.index', $viewData);
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
    	return view('web::post.new', $dataView);
    }

    public function store(PostRequest $request) {
        $params = $request->all();
        DB::beginTransaction();

        $dataInsert = [
            'category_id' => $params['category_id'],
            'project_id' => $params['project_id'],
            'city_id' => $params['city_id'],
            'address' => $params['address'],
            'price' => $params['price'],
            'guide' => $params['guide'],
            'usage_status' => PENDING,
            'status' => PENDING,
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

        try {
            $images = $params['images'];
            if (isset($images) && count($images) > 0) {
                $folderName = '/images/post/'.auth()->user()->id.'/images';
                foreach ($images as $key => $file) {
                    $fileName = time().$key.'.'.$file->getClientOriginalExtension();
                    if (!File::exists(public_path($folderName))) {
                        File::makeDirectory(public_path($folderName), 0777, true);
                    }
                    $file->move(public_path($folderName), $fileName);
                    $dataImages[] = [
                        'index' => $key,
                        'url' => $folderName.'/'.$fileName
                    ];
                }
                $dataInsert = array_merge($dataInsert, [
                    'images' => json_encode($dataImages)
                ]);
            }
            $this->post->create($dataInsert);
            DB::commit();
            return redirect()->back()->with('alert-success', 'Đăng tin thành công, hãy chờ kiểm duyệt viên duyệt tin của bạn');
        } catch (Throwable $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error', 'Đăng tin dự án không thành công');
        }
    }

    public function detail($slug, $id) {
        $post = $this->post->where([
            'slug' => $slug,
            'id' => $id
        ])->first();
        if (!$post) {
            abort(404);
        }
        $categories = Category::orderBy('id', 'desc')->limit(10)->get();
        $newPost = $this->post->orderBy('id', 'desc')->limit(10)->get();

        $viewData = [
            'categories' => $categories,
            'post' => $post,
            'newPost' => $newPost,
        ];
        return view('web::post.detail', $viewData);
    }
}
