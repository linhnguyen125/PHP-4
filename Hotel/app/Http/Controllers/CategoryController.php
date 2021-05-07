<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    //
    protected $catRepo;

    public function __construct(CategoryRepositoryInterface $catRepo){
        $this->catRepo = $catRepo;

        $this->middleware(function ($request, $next) {
            session(['module_active' => 'category']);

            return $next($request);
        });
    }

    public function index(){
        $cats = $this->catRepo->getAll();
        return view('admin.category.index', compact('cats'));
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){

        $request->validate(
            [
                'name' => ['required', 'max:255'],
                'description' => ['required'],
            ],
            [
                'required' => ':attribute không được để trống',
                'max' => ':attribute không được lớn hơn :max kí tự',
            ],
            [
                'name' => 'Tên danh mục',
                'description'  => 'Mô tả',
            ]
        );
        $data = $request->all();

        $cat = $this->catRepo->create($data);
        if($cat){
            return back()->with('success', 'Thêm mới thành công');
        }else{
            return back()->with('success', 'Thêm mới thất bại');
        }
    }

    public function delete($id){
        $cat = $this->catRepo->delete($id);
        if($cat){
            return back()->with('success', 'Xóa danh mục thành công');
        }else{
            return back()->with('error', 'Xóa danh mục thất bại');
        }
    }

    public function edit($id){
        $cat = $this->catRepo->find($id);
        return view('admin.category.edit', compact('cat'));
    }

    public function update(Request $request, $id){
        
        $request->validate(
            [
                'name' => ['required', 'max:255'],
                'description' => ['required'],
            ],
            [
                'required' => ':attribute không được để trống',
                'max' => ':attribute không được lớn hơn :max kí tự',
            ],
            [
                'name' => 'Tên danh mục',
                'description'  => 'Mô tả',
            ]
        );

        $data = $request->all();
        $cat = $this->catRepo->update($id, $data);
        if($cat){
            return back()->with('success', 'Cập nhật thành công');
        }else{
            return back()->with('error', 'Cập nhật thất bại');
        }
    }
}
