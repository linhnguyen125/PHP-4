<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Repositories\Room\RoomRepositoryInterface;

class SiteController extends Controller
{
    //

    protected $roomRepo;

    public function __construct(RoomRepositoryInterface $roomRepo){
        $this->roomRepo = $roomRepo;
    }

    public function index(){
        // lấy danh sách danh mục
        $categories = Category::select('name', 'slug', 'id')->get();
        // lấy 5 phòng cho trang chủ
        $rooms = $this->roomRepo->get(5);
        return view('client.home.index', compact('rooms', 'categories'));
    }

    public function overview($slug, $id){
        return $slug;
    }
}