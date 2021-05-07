@extends('layouts.client')

@section('content')

    <!-- ========================  Header content ======================== -->

    @include('shared.header_content')

    <!--========================== Room content ======================-->
    @include('shared.rooms')

    {{-- ========================= Image Blocks ========================= --}}

    @include('shared.image_blocks')

    <!-- ======================== Quotes ======================== -->

    @include('shared.quotes')

    <!-- ========================  Subscribe ======================== -->

    @include('shared.subscribe')

    <!-- ================== Footer  ================== -->
@endsection