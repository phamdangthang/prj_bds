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
