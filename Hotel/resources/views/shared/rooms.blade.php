<section class="rooms rooms-widget">

    <!-- === rooms header === -->

    <div class="section-header">
        <div class="container">
            <h2 class="title">Rooms accommodation <a href="rooms-category.html" class="btn btn-sm btn-clean-dark">View all</a></h2>
            <p>Designed as a privileged almost private place where you'll feel right at home</p>
        </div>
    </div>

    <!-- === rooms content === -->

    <div class="container">

        <div class="owl-rooms owl-theme">

            <!-- === rooms item === -->
            @foreach ($rooms as $room)
                
            <div class="item">
                <article>
                    <div class="image">
                        <img src="{{asset($room->image)}}" alt="" />
                    </div>
                    <div class="details">
                        <div class="text">
                            <h3 class="title"><a href="{{route('room.overview', [$room->slug, $room->id])}}">{{$room->room_code}}</a></h3>
                            {{-- <p>Single room</p> --}}
                        </div>
                        <div class="book">
                            <div>
                                <a href="{{route('room.overview', [$room->slug, $room->id])}}" class="btn btn-main">Book now</a>
                            </div>
                            <div>
                                <span class="price h4">{{ number_format($room->price, 0, '', '.') }}đ</span>
                                <span>per night</span>
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            @endforeach


            <!-- === rooms item === -->

            {{-- <div class="item">
                <article>
                    <div class="image">
                        <img src="{{asset('assets/client/assets/images/room-2.jpg')}}" alt="" />
                    </div>
                    <div class="details">
                        <div class="text">
                            <h3 class="title"><a href="room-overview.html">Classic Room</a></h3>
                            <p>Double room</p>
                        </div>
                        <div class="book">
                            <div>
                                <a href="room-overview.html" class="btn btn-main">Book now</a>
                            </div>
                            <div>
                                <span class="price h4">$ 129,00</span>
                                <span>per night</span>
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <!-- === rooms item === -->

            <div class="item">
                <article>
                    <div class="image">
                        <img src="{{asset('assets/client/assets/images/room-3.jpg')}}" alt="" />
                    </div>
                    <div class="details">
                        <div class="text">
                            <h3 class="title"><a href="">Superior Room</a></h3>
                            <p>Queen size bed</p>
                        </div>
                        <div class="book">
                            <div>
                                <a href="room-overview.html" class="btn btn-main">Book now</a>
                            </div>
                            <div>
                                <span class="price h4">$ 159,00</span>
                                <span>per night</span>
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <!-- === rooms item === -->

            <div class="item">
                <article>
                    <div class="image">
                        <img src="{{asset('assets/client/assets/images/room-4.jpg')}}" alt="" />
                    </div>
                    <div class="details">
                        <div class="text">
                            <h3 class="title"><a href="room-overview.html">Family Suite</a></h3>
                            <p>Family room</p>
                        </div>
                        <div class="book">
                            <div>
                                <a href="room-overview.html" class="btn btn-main">Book now</a>
                            </div>
                            <div>
                                <span class="price h4">$ 199,00</span>
                                <span>per night</span>
                            </div>
                        </div>
                    </div>
                </article>
            </div> --}}

        </div><!--/owl-rooms-->

    </div> <!--/container-->

</section>