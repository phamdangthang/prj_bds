<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category) {
        $this->category = $category;
    }

    public function index(Request $request) {
        $query = $this->category->query();

        if ($request->has('search')) {
            $query = $query->where('name', 'like', '%'.$request->search.'%');
        }

        if ($request->has('type')) {
            $query = $query->where('type', 'like', '%'.$request->type.'%');
        }

        $result = $query->paginate(10);

        $viewData = [
            'result' => $result,
            'search' => $request->search,
        ];

        return view("admin::category.index", $viewData);
    }

    public function create() {
        return view('admin::category.create');
    }

    public function store(CategoryCreateRequest $request) {
        $data = $request->all();
        $insert = [
            'name' => $data['name'],
            'slug' => $data['slug'],
            'type' => $data['type'],
        ];
        $created = $this->category->insert($insert);
        if ($created) {
            return redirect()->route('admin.category.index')->with('alert-success', 'Tạo danh mục thành công');
        }
        return redirect()->back()->with('alert-danger', 'Tạo danh mục thất bại');
    }

    public function edit($id) {
        $dataEdit = $this->category->find($id);
        $viewData = [
            'dataEdit' => $dataEdit
        ];
        return view('admin::category.edit', $viewData);
    }

    public function update(CategoryUpdateRequest $request, $id) {
        $data = $request->all();
        $category = $this->category->find($id);
        $updated = $category->update($data);
        if ($updated) {
            return redirect()->route('admin.category.index')->with('alert-success', 'Cập nhật danh mục thành công');
        }
        return redirect()->back()->with('alert-danger', 'Cập nhật danh mục thất bại');
    }

    public function delete($id) {
        $category = $this->category->findOrFail($id);
        $deleted = $category->delete();
        if ($deleted) {
            return redirect()->back()->with('alert-success', 'Xóa danh mục thành công');
        } else {
            return redirect()->back()->with('alert-error', 'Xóa danh mục thất bại');
        }
    }
}
