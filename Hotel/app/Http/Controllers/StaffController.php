<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Staff\StaffRepositoryInterface;

class StaffController extends Controller
{
    //
    protected $staffRepo;

    public function __construct(StaffRepositoryInterface $staffRepo){
        $this->staffRepo = $staffRepo;
    }

    public function index(){
        $staffs = $this->staffRepo->getAll();
        return view('admin.staff.index', compact('staffs'));
    }

    public function detail($id){
        $staff = $this->staffRepo->find($id);
        return view('admin.staff.detail', compact('staff'));
    }

    public function delete($id){
        $staff = $this->staffRepo->delete($id);
        if($staff){
            return back()->with('success', 'Xóa tài khoản thành công');
        }else{
            return back()->with('error', 'Xóa tài khoản thất bại');
        }
    }

    public function edit($id){
        $staff = $this->staffRepo->find($id);
        return view('admin.staff.edit', compact('staff'));
    }

    public function store(Request $request, $id){
        
        // $input_date = explode('/', $request->input('date_of_birth'));
        // $date_of_birth = $input_date[2] . '-' . $input_date[0] . '-' . $input_date[1];
        $data = $request->all();
        $request->validate(
            [
                'name' => ['required','min:3', 'max:255'],
                'phone' => ['required', 'regex:/^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/'],
                'address' => ['required'],
                // 'date_of_birth' => ['required'],
            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute không được dưới 3 kí tự',
                'regex' => ':attribute không đúng định dạng',
            ],
            [
                'name' => 'Tên nhân viên',
                'phone' => 'Số điện thoại',
                'address' => 'Địa chỉ',
                // 'date_of_birth' => 'Ngày sinh'
            ]
        );

        $staff = $this->staffRepo->update($id, $data);
        if($staff){
            return back()->with('success', 'Cập nhật thành công');
        }else{
            return back()->with('error', 'Cập nhật thất bại');
        }
    }

    public function showFormCreate(){
        return view('admin.staff.create');
    }
}
