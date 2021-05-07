<?php

namespace App\Http\Controllers;

use App\Models\BillDetail;
use App\Repositories\Order\OrderRepositoryInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //

    protected $orderRepo;

    public function __construct(OrderRepositoryInterface $orderRepo){
        $this->orderRepo = $orderRepo;

        $this->middleware(function ($request, $next) {
            session(['module_active' => 'order']);

            return $next($request);
        });
    }

    public function index(){
        $orders = $this->orderRepo->getAll();
        return view('admin.order.index', compact('orders'));
    }

    public function detail($id){
        $order = $this->orderRepo->find($id);
        $billDetail = BillDetail::where('bill_id', $id)->first();
        return view('admin.order.detail', compact('billDetail', 'order'));
    }

    public function delete($id){
        $order = $this->orderRepo->delete($id);
        if($order){
            return back()->with('success', 'Xóa hóa đơn thành công');
        }else{
            return back()->with('error', 'Xóa hóa đơn thất bại');
        }
    }
}
