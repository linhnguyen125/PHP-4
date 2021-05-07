@extends('layouts.client')

@section('content')

    {{-- ========================== Room Content ======================= --}}

    @include('shared.room_overview')

    <!-- ========================  Blog ======================== -->

    @include('shared.blog')

    <!-- ========================  Cards ======================== -->

    @include('shared.cards')

    <!-- ======================== Quotes ======================== -->

    @include('shared.quotes')

    <!-- ========================  Subscribe ======================== -->

    @include('shared.subscribe')
    
@endsection