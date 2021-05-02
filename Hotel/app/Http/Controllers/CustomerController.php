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
}
