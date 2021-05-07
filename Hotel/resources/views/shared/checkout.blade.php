<section class="page">

    <!-- ===  Page header === -->

    <div class="page-header" style="background-image:url({{asset('assets/client/assets/images/header-1.jpg')}})">
        <div class="container">
            <h2 class="title">Confirm your reservation</h2>
            <p>Guest information</p>
        </div>
    </div>

    <!-- ===  Checkout === -->
    <form id="checkout-form" action="{{route('checkout', $room->id)}}" method="POST">
        @csrf
        <div class="checkout">

            <div class="container">

                <div class="clearfix">

                    <!-- ========================  Note block ======================== -->

                    {{-- Thông báo --}}
                    @if (session('success'))
                    <div class="clearfix" style="margin-top: 15px;">
                        <div class="cart-block cart-block-footer cart-block-footer-price clearfix">
                            <div class="text-success">
                                {!! session('success') !!}
                            </div>
                        </div>
                    </div>
                    @endif

                    @if (session('error'))
                    <div class="clearfix" style="margin-top: 15px;">
                        <div class="cart-block cart-block-footer cart-block-footer-price clearfix">
                            <div class="text-warning">
                                {!! session('error') !!}
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="cart-wrapper">

                        <div class="note-block">

                            <div class="row">

                                <!-- === left content === -->

                                <div class="col-md-6">

                                    <!-- === login-wrapper === -->

                                    <div class="login-wrapper">

                                        <div class="white-block">

                                            <!--signin-->

                                            {{-- <div class="login-block login-block-signin">

                                                <div class="h4">Sign in <a href="javascript:void(0);" class="btn btn-main btn-xs btn-register pull-right">create an account</a></div>

                                                <hr />

                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" value="" class="form-control" placeholder="User ID">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="password" value="" class="form-control" placeholder="Password">
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-6">
                                                        <span class="checkbox">
                                                            <input type="checkbox" id="checkBoxId3">
                                                            <label for="checkBoxId3">Remember me</label>
                                                        </span>
                                                    </div>

                                                    <div class="col-xs-6 text-right">
                                                        <a href="#" class="btn btn-main">Login</a>
                                                    </div>
                                                </div>
                                            </div> <!--/signin--> --}}

                                            <!--signup-->

                                            <div class="login-block login-block-signup">

                                                <div class="h4">Thông tin cá nhân 
                                                    {{-- <a href="javascript:void(0);" class="btn btn-main btn-xs btn-login pull-right">Log in</a> --}}
                                                </div>

                                                <hr />

                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group @if ($errors->first('name')) {{ 'has-warning' }} @endif">
                                                            <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" placeholder="Họ và tên: *">
                                                        </div>
                                                        @error('name')
                                                        <strong><small
                                                                class="text-danger">{{ $message }}</small></strong>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group @if ($errors->first('phone')) {{ 'has-warning' }} @endif">
                                                            <input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control form-error" placeholder="Số điệnt thoại: *">
                                                        </div>
                                                        @error('phone')
                                                        <strong><small
                                                                class="text-danger">{{ $message }}</small></strong>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-12">

                                                        <div class="form-group @if ($errors->first('address')) {{ 'has-warning' }} @endif">
                                                            <input type="text" name="address" value="{{Auth::user()->address}}" class="form-control" placeholder="Địa chỉ:">
                                                        </div>
                                                        @error('address')
                                                        <strong><small
                                                                class="text-danger">{{ $message }}</small></strong>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group @if ($errors->first('email')) {{ 'has-warning' }} @endif">
                                                            <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control" placeholder="Email: *">
                                                        </div>
                                                        @error('email')
                                                        <strong><small
                                                                class="text-danger">{{ $message }}</small></strong>
                                                        @enderror
                                                    </div>

                                                    <input type="hidden" name="dateArrival" value="{{$dateArrival}}">
                                                    <input type="hidden" name="dateDeparture" value="{{$dateDeparture}}">
                                                    <input type="hidden" name="night" value="{{$night}}">
                                                    <input type="hidden" name="total" value="{{$room->price * $night}}">

                                                    {{-- <div class="col-md-12">
                                                        <hr />
                                                        <span class="checkbox">
                                                            <input type="checkbox" id="checkBoxId1">
                                                            <label for="checkBoxId1">I have read and accepted the <a href="#">terms</a>, as well as read and understood our terms of <a href="#">business contidions</a></label>
                                                        </span>
                                                        <span class="checkbox">
                                                            <input type="checkbox" id="checkBoxId2">
                                                            <label for="checkBoxId2">Subscribe to exciting newsletters and great tips</label>
                                                        </span>
                                                        <hr />
                                                    </div> --}}

                                                    {{-- <div class="col-md-12">
                                                        <a href="#" class="btn btn-main btn-block">Create account</a>
                                                    </div> --}}

                                                </div>
                                            </div> <!--/signup-->
                                        </div>
                                    </div> <!--/login-wrapper-->
                                </div> <!--/col-md-6-->
                                <!-- === right content === -->

                                <form action="#">
                                    <div class="col-md-6">

                                        <div class="white-block">

                                            <div class="h4">Hình thức thanh toán</div>

                                            <hr />

                                            <span class="checkbox">
                                                <input type="radio" id="paymentCart" name="paymentOption">
                                                <label for="paymentCart">
                                                    <strong>Pay via credit cart</strong> <br />
                                                    <small>(MasterCard, Maestro, Visa, Visa Electron, JCB and American Express)</small>
                                                </label>
                                            </span>

                                            <span class="checkbox">
                                                <input type="radio" id="paymentPayPal" name="paymentOption">
                                                <label for="paymentPayPal">
                                                    <strong>PayPal</strong> <br />
                                                    <small>Purchase with your fingertips. Look for us the next time you're paying from a mobile app, and checkout faster on thousands of mobile websites.</small>
                                                </label>
                                            </span>

                                            <div class="payment payment-paypal">
                                                <p><strong>Note:</strong></p>
                                                <p>Please allow three working days for the payment confirmation to reflect in your <a href="#">online account</a>. Once your payment is confirmed, we will generate your e-invoice, which you can view/print from your account or email.</p>
                                            </div>

                                            <div class="payment payment-cart">

                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="payment-header">
                                                            <div>
                                                                <strong>Payment details</strong>
                                                            </div>
                                                            <div>
                                                                <i class="fa fa-cc-visa"></i>
                                                                <i class="fa fa-cc-mastercard"></i>
                                                                <i class="fa fa-cc-discover"></i>
                                                                <i class="fa fa-cc-amex"></i>
                                                                <i class="fa fa-cc-diners-club"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <input class="form-control" type="tel" value="" placeholder="Card Number" />
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <div class="form-group">
                                                            <input class="form-control" type="tel" value="" placeholder="MM / YY" />
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <div class="form-group">
                                                            <input class="form-control" type="tel" value="" placeholder="CVC" />
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <input class="btn btn-main btn-block" value="Submit" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- ========================  Cart wrapper ======================== -->

                    <div class="cart-wrapper">

                        <!--cart header -->

                        <div class="cart-block cart-block-header clearfix">
                            <div>
                                <span>Thông tin hóa đơn</span>
                            </div>
                            <div class="text-right">
                                <span>Giá</span>
                            </div>
                        </div>

                        <!--cart items-->

                        <div class="clearfix">

                            <div class="cart-block cart-block-item clearfix">
                                <div class="image">
                                    <a href="{{route('room.overview', [$room->slug, $room->id])}}"><img src="{{asset($room->image)}}" alt="" /></a>
                                </div>
                                <div class="title">
                                    <div class="h2"><a href="{{route('room.overview', [$room->slug, $room->id])}}">{{$room->room_code}}</a></div>
                                    <div>
                                        <strong>Ngày đến: </strong> <a href="#">{{ \Carbon\Carbon::parse($dateArrival)->format('D/M/Y') }}</a>
                                    </div>
                                    <div>
                                        <strong>Khách: </strong>@php
                                            if($adults > 0){
                                                echo $adults . ' Người lớn ';
                                            }
                                            if($children > 0){
                                                echo $children . ' Trẻ em ';
                                            }
                                            if($infants > 0){
                                                echo $infants . ' Trẻ sơ sinh';
                                            }
                                        @endphp
                                    </div>
                                    <div>
                                        <strong>Nights: </strong> {{$night}}
                                    </div>
                                </div>
                                <div class="price">
                                    <span class="final h3">{{ number_format($room->price, 0, '', '.') }}đ</span>
                                </div>
                                <!--delete-this-item-->
                                <span class="icon icon-cross icon-delete"></span>
                            </div>

                        </div>

                        <!--cart prices -->

                        {{-- <div class="clearfix">
                            <div class="cart-block cart-block-footer clearfix">
                                <div>
                                    <strong>Discount 15%</strong>
                                </div>
                                <div>
                                    <span>$ 159,00</span>
                                </div>
                            </div>

                            <div class="cart-block cart-block-footer clearfix">
                                <div>
                                    <strong>TAX</strong>
                                </div>
                                <div>
                                    <span>$ 59,00</span>
                                </div>
                            </div>
                        </div> --}}

                        <!--cart final price -->

                        <div class="clearfix">
                            <div class="cart-block cart-block-footer cart-block-footer-price clearfix">
                                <div>
                                    Tổng thanh toán
                                </div>
                                <div>
                                    <div class="h2 title">{{ number_format($room->price * $night, 0, '', '.') }}đ</div>
                                </div>
                            </div>
                        </div>


                        <!-- ========================  Cart navigation ======================== -->

                        <div class="clearfix">
                            <div class="cart-block cart-block-footer cart-block-footer-price clearfix">
                                <div>
                                    <a href="{{ url()->previous() }}" class="btn btn-clean-dark">Trở về</a>
                                </div>
                                <div>
                                    <a href="#"
                                    onclick="event.preventDefault();
                                    document.getElementById('checkout-form').submit();"
                                    class="btn btn-main">Hoàn tất <span class="icon icon-chevron-right"></span></a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div> <!--/container-->
        </div> <!--/checkout-->
    </form>

</section>