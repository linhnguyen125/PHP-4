<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Room;
use App\Repositories\Room\RoomRepositoryInterface;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\File;

class RoomController extends Controller
{
    //
    protected $roomRepo;

    public function __construct(RoomRepositoryInterface $roomRepo){
        $this->roomRepo = $roomRepo;

        $this->middleware(function ($request, $next) {
            session(['module_active' => 'room']);

            return $next($request);
        });
    }

    public function index(){
        $rooms = $this->roomRepo->getAll();
        return view('admin.room.index', compact('rooms'));
    }

    public function create(){
        $list_cats = Category::select('name', 'id')->get();
        return view('admin.room.create', compact('list_cats'));
    }

    public function store(Request $request){
        
        $request->validate(
            [
                'room_code' => 'required|string|max:255',
                'category_id' => ['required'],
                'image' => ['required', 'image'],
                'detail' => ['required'],
                'price' => ['required', 'integer'],
            ],
            [
                'required' => ':attribute không được để trống',
                'max' => ':attribute có độ dài lớn nhất :max kí tự',
                'image' => ':attribute phải có định dạng ảnh',
                'integer' => ':attribute phải là số nguyên'
            ],
            [
                'room_code' => 'Mã phòng',
                'category_id' => 'Danh mục',
                'image' => 'Hình ảnh',
                'detail' => 'Chi tiết',
                'price' => 'Giá phòng',
            ]
        );

        if ($request->hasFile('image')) {
            $file = $request->image;
            $fileName = $file->getClientOriginalName();
            $path = 'images/rooms/' . $fileName;
            $file->move('public/images/rooms', $file->getClientOriginalName());

            Room::create([
                'room_code' => $request->input('room_code'),
                'slug' => SlugService::createSlug(Room::class, 'slug', $request->room_code),
                'category_id' => $request->input('category_id'),
                'price' => $request->input('price'),
                'image' => $path,
                'detail' => $request->input('detail'),
            ]);

            return back()->with('success', 'Thêm phòng thành công');
        } else {
            return back()->with('error', 'Thêm phòng thất bại');
        }
    }

    public function delete($id){
        $room = $this->roomRepo->find($id);
        $image_path = 'public/' . $room->image;
        $room->delete();
        if($room){
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            return back()->with('success', 'Xóa phòng thành công');
        }else{
            return back()->with('error', 'Xóa phòng thất bại');
        }
        
    }

    public function edit($id){
        $room = $this->roomRepo->find($id);
        $list_cats = Category::select('name', 'id')->get();
        return view('admin.room.edit', compact('room', 'list_cats'));
    }

    public function update(Request $request, $id){
        
        // nếu qtv thay đổi ảnh
        if ($request->hasFile('image')) {

            $request->validate(
                [
                    'room_code' => 'required|string|max:255',
                    'category_id' => ['required'],
                    'image' => ['required', 'image'],
                    'detail' => ['required'],
                    'price' => ['required', 'integer'],
                ],
                [
                    'required' => ':attribute không được để trống',
                    'max' => ':attribute có độ dài lớn nhất :max kí tự',
                    'image' => ':attribute phải có định dạng ảnh',
                    'integer' => ':attribute phải là số nguyên'
                ],
                [
                    'room_code' => 'Mã phòng',
                    'category_id' => 'Danh mục',
                    'image' => 'Hình ảnh',
                    'detail' => 'Chi tiết',
                    'price' => 'Giá phòng',
                ]
            );

            // thêm ảnh vào public/images
            $file = $request->image;
            $fileName = $file->getClientOriginalName();
            $path = 'images/rooms/' . $fileName;
            $file->move('public/images/rooms', $file->getClientOriginalName());

            // xóa ảnh cũ
            $room = $this->roomRepo->find($id);
            $image_path = 'public/' . $room->image;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            Room::where('id', $id)->update([
                'room_code' => $request->input('room_code'),
                'slug' => SlugService::createSlug(Room::class, 'slug', $request->room_code),
                'category_id' => $request->input('category_id'),
                'price' => $request->input('price'),
                'image' => $path,
                'detail' => $request->input('detail'),
            ]);

            return back()->with('success', 'Cập nhật phòng thành công');
        } else { // qtv không thay đổi ảnh

            $request->validate(
                [
                    'room_code' => 'required|string|max:255',
                    'category_id' => ['required'],
                    'detail' => ['required'],
                    'price' => ['required', 'integer'],
                ],
                [
                    'required' => ':attribute không được để trống',
                    'max' => ':attribute có độ dài lớn nhất :max kí tự',
                    'integer' => ':attribute phải là số nguyên'
                ],
                [
                    'room_code' => 'Mã phòng',
                    'category_id' => 'Danh mục',
                    'detail' => 'Chi tiết',
                    'price' => 'Giá phòng',
                ]
            );

            Room::where('id', $id)->update([
                'room_code' => $request->input('room_code'),
                'slug' => SlugService::createSlug(Room::class, 'slug', $request->room_code),
                'category_id' => $request->input('category_id'),
                'price' => $request->input('price'),
                'detail' => $request->input('detail'),
            ]);

            return back()->with('success', 'Cập nhật phòng thành công');
        }

        return back()->with('error', 'Cập nhật phòng thất bại');
    }
}
