<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;
use App\Models\User;

class CustomerController extends Controller
{
    //

    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function index(){
        $users = $this->userRepo->getAll();
        return view('admin.customer.index', compact('users'));
    }

    public function detail($id){
        $user = $this->userRepo->find($id);
        return view('admin.customer.detail', compact('user'));
    }

    public function delete($id){
        $user = $this->userRepo->delete($id);
        if($user){
            return back()->with('success', 'Xóa tài khoản thành công');
        }else{
            return back()->with('error', 'Xóa tài khoản thất bại');
        }
    }

    public function edit($id){
        $user = $this->userRepo->find($id);
        return view('admin.customer.edit', compact('user'));
    }

    public function update(Request $request, $id){
        
        $data = $request->all();
        $request->validate(
            [
                'name' => ['required','min:3', 'max:255'],
                'phone' => ['required', 'regex:/^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/'],
                'address' => ['required'],
                'date_of_birth' => ['required'],
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
                'date_of_birth' => 'Ngày sinh'
            ]
        );

        $user = $this->userRepo->update($id, $data);
        if($user){
            return back()->with('success', 'Cập nhật thành công');
        }else{
            return back()->with('error', 'Cập nhật thất bại');
        }
    }

    public function create(){
        return view('admin.customer.create');
    }

    public function store(Request $request){
        
        $request->validate(
            [
                'name' => ['required','min:3', 'max:255'],
                'password' => ['required', 'min:8', 'max:32', 'confirmed', 'string'],
                'phone' => ['required', 'regex:/^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/'],
                'address' => ['required'],
                'date_of_birth' => ['required'],
            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute không được dưới 3 kí tự',
                'regex' => ':attribute không đúng định dạng',
                'confirmed'  => 'Xác nhận mật khẩu không chính xác',
                'string' => ':attribute phải là một chuỗi',
            ],
            [
                'name' => 'Tên nhân viên',
                'phone' => 'Số điện thoại',
                'address' => 'Địa chỉ',
                'date_of_birth' => 'Ngày sinh',
                'password'  => 'Mật khẩu',
            ]
        );

        $name =  $request->input('name');
        $email =  $request->input('email');
        $password = bcrypt($request->input('password'));
        $phone =  $request->input('phone');
        $address =  $request->input('address');
        $date_of_birth =  $request->input('date_of_birth');
        // $data = [$name, $email, $password, $phone, $address, $date_of_birth];

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'phone' => $phone,
            'address' => $address,
            'date_of_birth' => $date_of_birth,
        ]);

        if($user){
            return back()->with('success', 'Thêm mới thành công');
        }else{
            return back()->with('success', 'Thêm mới thất bại');
        }
    }
    
}
