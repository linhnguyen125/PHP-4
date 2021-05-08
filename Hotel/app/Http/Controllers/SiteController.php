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
        // lấy 5 phòng cho trang chủ
        $rooms = $this->roomRepo->get(5);
        return view('client.home.index', compact('rooms'));
    }

    public function overview($slug, $id){
        $room = $this->roomRepo->find($id);
        return view('client.room.detail', compact('room'));
    }

    public function showCategory($slug, $id){
        $rooms = $this->roomRepo->getByCatID($id);
        return view('client.category.index', compact('rooms'));
    }
}
