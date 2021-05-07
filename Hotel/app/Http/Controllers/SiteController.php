<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Room;
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
        $room = $this->roomRepo->find($id);
        // lấy danh sách danh mục
        $categories = Category::select('name', 'slug', 'id')->get();
        return view('client.room.detail', compact('categories', 'room'));
    }

    public function showCategory($slug, $id){
        // lấy danh sách danh mục
        $categories = Category::select('name', 'slug', 'id')->get();
        $rooms = $this->roomRepo->getByCatID($id);
        return view('client.category.index', compact('rooms', 'categories'));
    }
}
