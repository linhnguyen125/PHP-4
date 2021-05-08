<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Repositories\Room\RoomRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BookingController extends Controller
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

    public function booking(Request $request, $id){
        // lấy ngày đến
        $tempDateArrival = str_replace(['<span class=day>', '</span>', '<span class=month>', '<span class=year>'] , ['','','',''], $request->input('dateArrival'));
        $dataDateArrival = explode(' ', $tempDateArrival);
        $dateArrival = $dataDateArrival[2] . '-' . $dataDateArrival[1] . '-' . $dataDateArrival[0];
        
        // lấy ngày đi
        $tempDeparture = str_replace(['<span class=day>', '</span>', '<span class=month>', '<span class=year>'] , ['','','',''], $request->input('dateDeparture'));
        $dataDateDeparture = explode(' ', $tempDeparture);
        $dateDeparture = $dataDateDeparture[2] . '-' . $dataDateDeparture[1] . '-' . $dataDateDeparture[0];
        
        // lấy số người checkin
        $qty_result = $request->input('qty_result');
        $adults = $request->input('adults');
        $children = $request->input('children');
        $infants = $request->input('infants');

        // lấy danh sách danh mục
        $categories = Category::select('name', 'slug', 'id')->get();

        // lấy thông tin phòng
        $room = $this->roomRepo->find($id);

        // lấy số đêm ở khách sạn
        $arrival = Carbon::create($dataDateArrival[2], $dataDateArrival[1], $dataDateArrival[0]);
        $departure = Carbon::create($dataDateDeparture[2], $dataDateDeparture[1], $dataDateDeparture[0]);
        $night = $departure->diffInDays($arrival);

        return view('client.booking.index', compact('dateArrival', 'dateDeparture', 'qty_result', 'categories', 'adults', 'children', 'infants', 'room', 'night'));
    }

    public function checkout(Request $request, $id){
        // thông tin phòng được đặt
        $room = $this->roomRepo->find($id);

        // chuẩn hóa dữ liệu
        $request->validate(
            [
                'name' => ['required','min:3', 'max:255'],
                'phone' => ['required', 'regex:/^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/'],
                'address' => ['required'],
                'email' => ['required'],
            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute không được dưới 3 kí tự',
                'regex' => ':attribute không đúng định dạng',
            ],
            [
                'name' => 'Tên khách hàng',
                'phone' => 'Số điện thoại',
                'address' => 'Địa chỉ',
                'email' => 'Email'
            ]
        );
        
        // tạo bill code
        $billCode = "CLN-" . Str::upper(Str::random(8));

        // tạo mới bill
        $bill = Bill::create([
            'bill_code' => $billCode,
            'user_id' => Auth::user()->id,
            'night' => $request->input('night'),
            'total' => $request->input('total'),
        ]);

        // Tạo bill detail
        if($bill){
            BillDetail::create([
                'bill_id' => $bill->id,
                'room_id' => $room->id,
                'dateArrival' => $request->input('dateArrival'),
                'dateDeparture' => $request->input('dateDeparture'),
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
            ]);

            // set status = 0 cho room (room đã được đặt)
            $this->roomRepo->updateStatus($id, '0');

            return back()->with('success', 'Quý khách đã đặt phòng thành công. Thông tin chi tiết đã được gửi tới email của bạn');
        }else{
            return back()->with('error', 'Có lỗi xảy ra vui lòng thử lại');
        }

    }
}
