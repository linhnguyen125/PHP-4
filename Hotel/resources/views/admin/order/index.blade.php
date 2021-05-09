@extends('layouts.admin')

@section('content')
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
                            <h3 class="nk-block-title page-title">Hóa đơn</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li>
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-right">
                                                    <em class="icon ni ni-search"></em>
                                                </div>
                                                <form action="">
                                                    <input type="text" name="keyword" class="form-control" id="default-04" placeholder="Quick search by id">
                                                </form>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white" data-toggle="dropdown">Trạng thái</a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="{{request()->fullUrlWithQuery(['status' => 'dang-su-dung'])}}"><span>Đang sử dụng</span></a></li>
                                                        <li><a href="{{request()->fullUrlWithQuery(['status' => 'hoan-thanh'])}}"><span>Hoàn thành</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="nk-tb-list is-separate mb-3">
                        <div class="nk-tb-item nk-tb-head">
                            <div class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input" id="uid">
                                    <label class="custom-control-label" for="uid"></label>
                                </div>
                            </div>
                            <div class="nk-tb-col"><span>Mã hóa đơn</span></div>
                            <div class="nk-tb-col"><span>Khách hàng</span></div>
                            <div class="nk-tb-col"><span>Trạng thái</span></div>
                            <div class="nk-tb-col"><span>Tổng tiền</span></div>
                            <div class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1 my-n1">
                                    <li class="mr-n1">
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Selected</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Selected</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-bar-c"></em><span>Update Stock</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-invest"></em><span>Update Price</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- .nk-tb-item -->

                        @foreach ($orders as $order)
                        <div class="nk-tb-item">
                            <div class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input" id="uid{{$order->id}}">
                                    <label class="custom-control-label" for="uid{{$order->id}}"></label>
                                </div>
                            </div>
                            <div class="nk-tb-col">
                                <span class="tb-product">
                                    <span class="title">{{$order->bill_code}}</span>
                                </span>
                            </div>
                            <div class="nk-tb-col">
                                <span class="tb-product">
                                    <span class="title">{{$order->user->name}}</span>
                                </span>
                            </div>
                            
                            <div class="nk-tb-col">
                                @if ($order->status == '1')
                                <span class="tb-sub text-danger">Đang sử dụng</span>
                                @else
                                <span class="tb-sub text-success">Hoàn thành</span>
                                @endif
                                
                            </div>
                            <div class="nk-tb-col">
                                <span class="tb-lead">{{ number_format($order->total, 0, '', '.') }}
                                    <em class="icon ni ni-sign-vnd"></em>
                                </span>
                            </div>
                            <div class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1 my-n1">
                                    <li class="mr-n1">
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <ul class="link-list-opt no-bdr">
                                                    {{-- <li><a href="{{route('order.edit', $order->id)}}"><em class="icon ni ni-edit"></em><span>Chỉnh sửa</span></a></li> --}}
                                                    <li><a href="{{route('order.detail', $order->id)}}"><em class="icon ni ni-eye"></em><span>Xem chi tiết</span></a></li>
                                                    <li><a href="{{route('order.delete', $order->id)}}"><em class="icon ni ni-trash"></em><span>Xóa hóa đơn</span></a></li>
                                                    <li><a href="{{route('order.finish', $order->id)}}"><em class="icon ni ni-done"></em><span>Trả phòng</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- .nk-tb-item -->
                        @endforeach
                        
                    </div><!-- .nk-tb-list -->
                    <div class="card">
                        <div class="card-inner">
                            <div class="nk-block-between-md g-3">
                                <div class="g">
                                    {{ $orders->onEachSide(5)->links() }}
                                </div>
                            </div><!-- .nk-block-between -->
                        </div>
                    </div>
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
@endsection