<?php

namespace App\Http\Controllers;

use App\Models\BillDetail;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\Room\RoomRepositoryInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //

    protected $orderRepo;
    protected $roomRepo;

    public function __construct(OrderRepositoryInterface $orderRepo, RoomRepositoryInterface $roomRepo){
        $this->orderRepo = $orderRepo;
        $this->roomRepo = $roomRepo;

        $this->middleware(function ($request, $next) {
            session(['module_active' => 'order']);

            return $next($request);
        });
    }

    public function index(Request $request){
        if (strpos($request->status, 'dang-su-dung') !== false) {
            $orders = $this->orderRepo->getAllByStatus('1');
        }else if(strpos($request->status, 'hoan-thanh') !== false){
            $orders = $this->orderRepo->getAllByStatus('0');
        }else if($request->keyword){
            $orders = $this->orderRepo->getAllByKeyword($request->keyword);
        }else{
            $orders = $this->orderRepo->getAll();
        }
        
        return view('admin.order.index', compact('orders'));
    }

    public function detail($id){
        $order = $this->orderRepo->find($id);
        $billDetail = BillDetail::where('bill_id', $id)->first();
        return view('admin.order.detail', compact('billDetail', 'order'));
    }

    public function delete($id){
        // lấy chi tiết hóa đơn
        $billDetail = BillDetail::where('bill_id', $id)->first();

        // set status = 1 cho room (trạng thái trống)
        $this->roomRepo->updateStatus($billDetail->room->id, '1');

        // xóa hóa đơn
        $order = $this->orderRepo->delete($id);

        if($order){
            return back()->with('success', 'Xóa hóa đơn thành công');
        }else{
            return back()->with('error', 'Xóa hóa đơn thất bại');
        }
    }

    public function finish($id){
        // lấy chi tiết hóa đơn
        $billDetail = BillDetail::where('bill_id', $id)->first();

        // set status = 1 cho room (trạng thái trống)
        $this->roomRepo->updateStatus($billDetail->room->id, '1');

        // set status = 0 cho hóa đơn (hoàn thành)
        $order = $this->orderRepo->updateStatus($id, '0');

        if($order){
            return back()->with('success', 'Hoàn thành');
        }else{
            return back()->with('error', 'Thất bại');
        }
    }
}
