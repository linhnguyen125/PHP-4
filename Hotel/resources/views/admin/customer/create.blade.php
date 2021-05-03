@extends('layouts.admin')

@section('content')
     <!-- content @s -->
     <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {!! session('success') !!}
                      </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {!! session('error') !!}
                      </div>
                    @endif
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Thêm mới</h3>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    
                    <form action="{{route('customer.store')}}" method="POST">
                        @csrf
                        <div class="card card-preview">
                            <div class="card-inner">
                                <div class="preview-block">
                                    <span class="preview-title-lg overline-title">Nhập thông tin</span>
                                    <div class="row gy-4">
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-lg form-control-outlined" name="name" id="name" value="{{old('name')}}">
                                                    <label class="form-label-outlined" for="name">Họ và tên</label>
                                                </div>
                                                @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-lg form-control-outlined" name="email" id="email" value="{{old('email')}}">
                                                    <label class="form-label-outlined" for="email">Email</label>
                                                </div>
                                                @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="password" class="form-control form-control-lg form-control-outlined" name="password" id="password" value="{{old('password')}}">
                                                    <label class="form-label-outlined" for="password">Mật khẩu</label>
                                                </div>
                                                @error('password')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="password" class="form-control form-control-lg form-control-outlined" name="password_confirmation" id="confirmPassword" value="{{old('confirmPassword')}}">
                                                    <label class="form-label-outlined" for="confirmPassword">Xác nhận mật khẩu</label>
                                                </div>
                                                @error('password')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-lg form-control-outlined" name="phone" id="phone" value="{{old('phone')}}">
                                                    <label class="form-label-outlined" for="phone">Số điện thoại</label>
                                                </div>
                                                @error('phone')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        

                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-lg form-control-outlined" name="address" id="address" value="{{old('address')}}">
                                                    <label class="form-label-outlined" for="address">Địa chỉ</label>
                                                </div>
                                                @error('address')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <div class="form-icon form-icon-right">
                                                        <em class="icon ni ni-calendar-alt"></em>
                                                    </div>
                                                    <input type="text" class="form-control form-control-lg form-control-outlined date-picker" 
                                                    name="date_of_birth" id="outlined-date-picker" value="{{old('date_of_birth')}}"
                                                    data-date-format="yyyy-mm-dd">
                                                    <label class="form-label-outlined" for="outlined-date-picker">Ngày sinh</label>
                                                </div>
                                                @error('date_of_birth')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary"></em><span>Thêm mới</span></button>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->
@endsection