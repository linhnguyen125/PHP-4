@extends('layouts.admin')

@section('content')
    <!-- content @s -->
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Nhân viên / <strong class="text-primary small">{{$staff->name}}</strong></h3>
                            </div>
                            <div class="nk-block-head-content">
                                <a href="{{route('customer.index')}}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Trở về</span></a>
                                <a href="{{route('customer.index')}}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="card">
                            <div class="card-aside-wrap">
                                <div class="card-content">
                                    <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#"><em class="icon ni ni-user-circle"></em><span>Cá nhân</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><em class="icon ni ni-repeat"></em><span>Hóa đơn</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><em class="icon ni ni-bell"></em><span>Thông báo</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><em class="icon ni ni-activity"></em><span>Hoạt động</span></a>
                                        </li>
                                        <li class="nav-item nav-item-trigger d-xxl-none">
                                            <a href="#" class="toggle btn btn-icon btn-trigger" data-target="userAside"><em class="icon ni ni-user-list-fill"></em></a>
                                        </li>
                                    </ul><!-- .nav-tabs -->
                                    <div class="card-inner">
                                        <div class="nk-block">
                                            <div class="nk-block-head">
                                                <h5 class="title">Thông tin cá nhân</h5>
                                                <p>Thông tin cơ bản, như tên và địa chỉ, mà người dùng sử dụng trên hệ thống</p>
                                            </div><!-- .nk-block-head -->
                                            <div class="profile-ud-list">
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Giới tính</span>
                                                        <span class="profile-ud-value">
                                                            Nam
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Họ và tên</span>
                                                        <span class="profile-ud-value">{{$staff->name}}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Ngày sinh</span>
                                                        <span class="profile-ud-value">
                                                            Chưa cập nhật
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Số điện thoại</span>
                                                        <span class="profile-ud-value">{{$staff->phone}}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Email</span>
                                                        <span class="profile-ud-value">{{$staff->email}}</span>
                                                    </div>
                                                </div>
                                            </div><!-- .profile-ud-list -->
                                        </div><!-- .nk-block -->
                                        <div class="nk-block">
                                            <div class="nk-block-head nk-block-head-line">
                                                <h6 class="title overline-title text-base">Thông tin thêm</h6>
                                            </div><!-- .nk-block-head -->
                                            <div class="profile-ud-list">
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Ngày tạo</span>
                                                        <span class="profile-ud-value">{{$staff->created_at}}</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Đăng nhập qua</span>
                                                        <span class="profile-ud-value">Email</span>
                                                    </div>
                                                </div>
                                                <div class="profile-ud-item">
                                                    <div class="profile-ud wider">
                                                        <span class="profile-ud-label">Địa chỉ</span>
                                                        <span class="profile-ud-value">{{$staff->address}}</span>
                                                    </div>
                                                </div>
                                                
                                            </div><!-- .profile-ud-list -->
                                        </div><!-- .nk-block -->
                                    </div><!-- .card-inner -->
                                </div><!-- .card-content -->
                            </div><!-- .card-aside-wrap -->
                        </div><!-- .card -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->
@endsection