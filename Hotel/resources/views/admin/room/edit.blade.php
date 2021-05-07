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
                    
                    <form action="{{route('room.update', $room->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card card-preview">
                            <div class="card-inner">
                                <div class="preview-block">
                                    <span class="preview-title-lg overline-title">Nhập thông tin</span>
                                    <div class="row gy-4">
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-xl form-control-outlined" name="room_code" id="room_code" value="{{$room->room_code}}">
                                                    <label class="form-label-outlined" for="room_code">Mã phòng</label>
                                                </div>
                                                @error('room_code')
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
                                                    <select class="form-select form-control form-control-xl"
                                                        data-ui="xl" name="category_id" id="outlined-select" required>
                                                        @foreach ($list_cats as $cat)
                                                            <option value="{{ $cat->id }}" {{$room->category_id == $cat->id ? "selected":" "}}>
                                                                {{ $cat->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <label class="form-label-outlined"
                                                        for="outlined-select">Danh mục</label>
                                                    @error('category_id')
                                                        <strong><small
                                                                class="text-danger">{{ $message }}</small></strong>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-sm-12">
                                            <div class="form-group">
                                                <span class="preview-title overline-title">Chi tiết</span>
                                                <div class="form-control-wrap">
                                                    <textarea name="detail" class="form-control form-control-xl"
                                                        id="detail" cols="30"
                                                        rows="5">{{ $room->detail }}</textarea>
                                                    @error('detail')
                                                        <strong>
                                                            <small
                                                                class="text-danger">{{ $message }}
                                                            </small>
                                                        </strong>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-xl form-control-outlined" name="price" id="price" value="{{$room->price}}">
                                                    <label class="form-label-outlined" for="price">Giá phòng</label>
                                                </div>
                                                @error('price')
                                                <strong>
                                                    <small
                                                        class="text-danger">{{ $message }}
                                                    </small>
                                                </strong>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6">
                                            <div>
                                                {{-- <label for="formFile" class="form-label">Hình ảnh</label> --}}
                                                <input class="form-control form-control-xl" name="image" type="file" id="formFile">
                                            </div>

                                            @error('image')
                                            <strong>
                                                <small
                                                    class="text-danger">{{ $message }}
                                                </small>
                                            </strong>
                                            @enderror
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