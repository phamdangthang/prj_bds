<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BlogCreateRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    private $blog;

    public function __construct(Blog $blog) {
        $this->blog = $blog;
    }

    public function index(Request $request) {
        $query = $this->blog->query();

        if ($request->has('search')) {
            $query = $query->where('name', 'like', '%'.$request->search.'%');
        }

        $result = $query->paginate(10);

        $viewData = [
            'result' => $result,
            'search' => $request->search,
        ];

        return view("admin::blog.index", $viewData);
    }

    public function create() {
        $categories = Category::where('type', NEWS)->get();

        $data = [
            'categories' => $categories,
        ];

        return view('admin::blog.create', $data);
    }

    public function store(BlogCreateRequest $request) {
        $params = $request->all();
        $insert = [
            'name' => $params['name'],
            'slug' => $params['slug'],
            'category_id' => $params['category_id'],
            'content' => $params['content'],
            'admin_id' => auth()->guard('admin')->user()->id,
            'logo' => $params['logo'],
            'is_hot' => $params['is_hot'] ?? 0
        ];
        $created = $this->blog->insert($insert);
        if ($created) {
            return redirect()->route('admin.blog.index')->with('alert-success', 'Tạo tin tức thành công');
        }
        return redirect()->back()->with('alert-danger', 'Tạo tin tức thất bại');
    }

    public function edit($id) {
        $dataEdit = $this->blog->find($id);
        $categories = Category::where('type', NEWS)->get();

        $viewData = [
            'categories' => $categories,
            'dataEdit' => $dataEdit
        ];
        return view('admin::blog.edit', $viewData);
    }

    public function update(BlogUpdateRequest $request, $id) {
        $data = $request->all();
        if (!isset($data['is_hot'])) {
            $data['is_hot'] = 0;
        }
        $blog = $this->blog->find($id);
        $updated = $blog->update(array_merge($data, [
            'admin_id' => auth()->guard('admin')->user()->id
        ]));
        if ($updated) {
            return redirect()->route('admin.blog.index')->with('alert-success', 'Cập nhật tin tức thành công');
        }
        return redirect()->back()->with('alert-danger', 'Cập nhật tin tức thất bại');
    }

    public function delete($id) {
        $blog = $this->blog->findOrFail($id);
        $deleted = $blog->delete();
        if ($deleted) {
            return redirect()->back()->with('alert-success', 'Xóa tin tức thành công');
        } else {
            return redirect()->back()->with('alert-error', 'Xóa tin tức thất bại');
        }
    }
}
