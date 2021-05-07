<section class="page">

    <!-- ===  Page header === -->

    <div class="page-header" style="background-image:url({{asset('assets/client/assets/images/header-1.jpg')}})">
        <div class="container">
            <h2 class="title">Luxury appartment</h2>
            <p>Available from 199€ per night</p>
        </div>
    </div>

    <div class="room">

        <!-- === Room gallery === -->

        <div class="room-gallery">
            <div class="container">
                <div class="owl-slider owl-theme owl-slider-gallery">

                    <!-- === slide item === -->

                    <div class="item" style="background-image:url({{asset('assets/client/assets/images/room-4.jpg')}})">
                        <img src="assets/images/room-4.jpg" alt="" />
                    </div>

                    <!-- === slide item === -->

                    <div class="item" style="background-image:url({{asset('assets/client/assets/images/room-2.jpg')}})">
                        <img src="assets/images/room-2.jpg" alt="" />
                    </div>


                    <!-- === slide item === -->

                    <div class="item" style="background-image:url({{asset('assets/client/assets/images/room-1.jpg')}})">
                        <img src="assets/images/room-1.jpg" alt="" />
                    </div>


                </div> <!--/owl-slider-->

            </div>
        </div> <!--/room-gallery-->
        <!-- === Booking === -->

        <form id="booking-form" action="{{route('booking', $room->id)}}" method="POST">
            @csrf
            <div class="booking booking-inner">

                <div class="container">

                    <div class="booking-wrapper">
                        <div class="row">

                            <!--=== date arrival ===-->

                            <div class="col-xs-4 col-sm-3">
                                <div class="date" id="dateArrival" data-text="Arrival">
                                    <input class="datepicker" name="dateArrival" readonly="readonly" data-date-format="yyyy-mm-dd" />
                                    <div class="date-value"></div>
                                </div>
                            </div>
                            
                            <!--=== date departure ===-->

                            <div class="col-xs-4 col-sm-3">
                                <div class="date" id="dateDeparture" data-text="Departure">
                                    <input class="datepicker" name="dateDeparture" readonly="readonly" />
                                    <div class="date-value"></div>
                                </div>
                            </div>

                            <!--=== guests ===-->

                            <div class="col-xs-4 col-sm-2">

                                <div class="guests" data-text="Guests">
                                    <div class="result">
                                        <input class="qty-result" name="qty_result" type="text" value="2" id="qty-result" readonly="readonly" />
                                        <div class="qty-result-text date-value" id="qty-result-text"></div>
                                    </div>
                                    <!--=== guests list ===-->
                                    <ul class="guest-list">

                                        <li class="header">
                                            Please choose number of guests <span class="qty-apply"><i class="icon icon-cross"></i></span>
                                        </li>

                                        <!--=== adults ===-->

                                        <li class="clearfix">

                                            <!--=== Adults value ===-->

                                            <div>
                                                <input class="qty-amount" value="2" type="text" id="ticket-adult" data-value="2" readonly="readonly" />
                                            </div>

                                            <div>
                                                <span>Adults <small>16+ years</small></span>
                                            </div>

                                            <!--=== Add/remove quantity buttons ===-->

                                            <div>
                                                <input class="qty-btn qty-minus" value="-" type="button" data-field="ticket-adult" />
                                                <input class="qty-btn qty-plus" value="+" type="button" data-field="ticket-adult" />
                                            </div>

                                        </li>

                                        <!--=== chilrens ===-->

                                        <li class="clearfix">

                                            <!--=== Adults value ===-->

                                            <div>
                                                <input class="qty-amount" value="0" type="text" id="ticket-children" data-value="0" readonly="readonly" />
                                            </div>

                                            <!--=== Label ===-->

                                            <div>
                                                <span>Children <small>2-11 years</small></span>
                                            </div>


                                            <!--=== Add/remove quantity buttons ===-->

                                            <div>
                                                <input class="qty-btn qty-minus" value="-" type="button" data-field="ticket-children" />
                                                <input class="qty-btn qty-plus" value="+" type="button" data-field="ticket-children" />
                                            </div>

                                        </li>

                                        <!--=== Infants ===-->

                                        <li class="clearfix">

                                            <!--=== Adults value ===-->

                                            <div>
                                                <input class="qty-amount" value="0" type="text" id="ticket-infants" data-value="0" readonly="readonly" />
                                            </div>

                                            <!--=== Label ===-->

                                            <div>
                                                <span>Infants <small>Under 2 years</small></span>
                                            </div>

                                            <!--=== Add/remove quantity buttons ===-->

                                            <div>
                                                <input class="qty-btn qty-minus" value="-" type="button" data-field="ticket-infants" />
                                                <input class="qty-btn qty-plus" value="+" type="button" data-field="ticket-infants" />
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!--=== button ===-->

                            <div class="col-xs-12 col-sm-4">
                                <a href="#" 
                                    onclick="event.preventDefault();
                                    document.getElementById('booking-form').submit();" class="btn btn-clean">
                                    Book now
                                    <small>Best Prices Guaranteed</small>
                                </a>
                            </div>

                        </div> <!--/row-->
                    </div><!--/booking-wrapper-->
                </div> <!--/container-->
            </div> <!--/booking-->
        </form>
        <!-- ===  Room overview === -->

        <div class="room-overview">

            <div class="container">
                <div class="row">

                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

                        <!-- === Room aminities === -->

                        <div class="room-block room-aminities">

                            <h2 class="title">Room aminities</h2>

                            <div class="row">

                                <!--=== item ===-->

                                <div class="col-xs-6 col-sm-2">
                                    <figure>
                                        <figcaption>
                                            <span class="hotelicon hotelicon-air-condition"></span>
                                            <p>Aircondition</p>
                                        </figcaption>
                                    </figure>
                                </div>

                                <!--=== item ===-->

                                <div class="col-xs-6 col-sm-2">
                                    <figure>
                                        <figcaption>
                                            <span class="hotelicon hotelicon-king-bed"></span>
                                            <p>1 Kingsize bed</p>
                                        </figcaption>
                                    </figure>
                                </div>

                                <!--=== item ===-->

                                <div class="col-xs-6 col-sm-2">
                                    <figure>
                                        <figcaption>
                                            <span class="hotelicon hotelicon-guest"></span>
                                            <p>2 People</p>
                                        </figcaption>
                                    </figure>
                                </div>

                                <!--=== item ===-->

                                <div class="col-xs-6 col-sm-2">
                                    <figure>
                                        <figcaption>
                                            <span class="hotelicon hotelicon-wifi"></span>
                                            <p>Internet</p>
                                        </figcaption>
                                    </figure>
                                </div>

                                <!--=== item ===-->

                                <div class="col-xs-6 col-sm-2">
                                    <figure>
                                        <figcaption>
                                            <span class="hotelicon hotelicon-washer"></span>
                                            <p>Washer</p>
                                        </figcaption>
                                    </figure>
                                </div>

                                <!--=== item ===-->

                                <div class="col-xs-6 col-sm-2">
                                    <figure>
                                        <figcaption>
                                            <span class="hotelicon hotelicon-roomservice"></span>
                                            <p>Room service</p>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>

                        </div>

                        <!-- === Room block === -->

                        <div class="room-block">
                            <h2 class="title">Room overview</h2>
                            <p>
                                {{$room->category->description}}
                                
                            </p>
                        </div>

                        <!-- === Room block === -->

                        <div class="room-block">

                            <h2 class="title">Thông tin</h2>

                            <div class="box">
                            {!!$room->detail!!}
                            </div>


                        </div>

                    </div> <!--/col-sm-10-->
                </div> <!--/row-->
            </div> <!--/container-->
        </div> <!--/room-overview-->
    </div>

</section>