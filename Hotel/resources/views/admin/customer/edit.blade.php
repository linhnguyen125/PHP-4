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
                                <h3 class="nk-block-title page-title">Cập nhật thông tin</h3>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    
                    <form action="{{route('customer.update', $user->id)}}" method="POST">
                        @csrf
                        <div class="card card-preview">
                            <div class="card-inner">
                                <div class="preview-block">
                                    <span class="preview-title-lg overline-title">Nhập thông tin</span>
                                    <div class="row gy-4">
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-lg form-control-outlined" name="name" id="name" value="{{$user->name}}">
                                                    <label class="form-label-outlined" for="name">Tên nhân viên</label>
                                                </div>
                                                @error('name')
                                                    <strong>
                                                            <small
                                                                class="text-danger">{{ $message }}
                                                            </small>
                                                        </strong>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-lg form-control-outlined" name="phone" id="phone" value="{{$user->phone}}">
                                                    <label class="form-label-outlined" for="phone">Số điện thoại</label>
                                                </div>
                                                @error('phone')
                                                    <strong>
                                                            <small
                                                                class="text-danger">{{ $message }}
                                                            </small>
                                                        </strong>
                                                @enderror
                                            </div>
                                        </div>
                                        

                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-lg form-control-outlined" name="address" id="address" value="{{$user->address}}">
                                                    <label class="form-label-outlined" for="address">Địa chỉ</label>
                                                </div>
                                                @error('address')
                                                    <strong>
                                                            <small
                                                                class="text-danger">{{ $message }}
                                                            </small>
                                                        </strong>
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
                                                    name="date_of_birth" id="outlined-date-picker" value="{{$user->date_of_birth}}"
                                                    data-date-format="yyyy-mm-dd">
                                                    <label class="form-label-outlined" for="outlined-date-picker">Ngày sinh</label>
                                                </div>
                                                @error('date_of_birth')
                                                    <strong>
                                                            <small
                                                                class="text-danger">{{ $message }}
                                                            </small>
                                                        </strong>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary"></em><span>Cập nhật</span></button>
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