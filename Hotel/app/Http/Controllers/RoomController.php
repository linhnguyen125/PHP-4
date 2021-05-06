<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\Room\RoomRepositoryInterface;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class RoomController extends Controller
{
    //
    protected $roomRepo;

    public function __construct(RoomRepositoryInterface $roomRepo){
        $this->roomRepo = $roomRepo;
    }

    public function index(){

        return view('admin.room.index');
    }

    public function create(){
        $list_cats = Category::select('name', 'id')->get();
        return view('admin.room.create', compact('list_cats'));
    }

    public function store(Request $request){
        $file = $request->image;
            return $file->getClientOriginalName();
        // $request->validate(
        //     [
        //         'name' => 'required|string|max:255',
        //         'cat_id' => 'required|integer',
        //         'filepath' => ['required', 'regex:/^(https?:\/\/.*\.(?:png|jpg|gif))$/'],
        //         'category' => 'required',
        //         'desc' => 'required',
        //         'qty' => 'required|integer'
        //     ],
        //     [
        //         'required' => ':attribute không được để trống',
        //         'max' => ':attribute có độ dài lớn nhất :max kí tự',
        //         'integer' => ':attribute phải là số nguyên',
        //         'regex' => ':attribute phải là dạng ảnh',
        //     ],
        //     [
        //         'name' => 'Tên sản phẩm',
        //         'desc' => 'Mô tả sản phẩm',
        //         'filepath' => 'Ảnh',
        //         'category' => 'Danh mục',
        //         'price' => 'Giá sản phẩm',
        //         'qty' => 'Số lượng',
        //     ]
        // );
    }
}
