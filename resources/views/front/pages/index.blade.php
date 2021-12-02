@extends('front.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset(env('ROOT').env('FRONT').env('SLIDER').'1/style.css')}}">
    <link rel="stylesheet" href="{{asset(env('ROOT').env('FRONT').env('SLIDER').'2/style.css')}}">
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
@endsection
@section('body')
    @include('front.modules.slider.2')
@endsection
@section('js')
    <script src="{{asset(env('ROOT').env('FRONT').env('SLIDER').'1/script.js')}}"></script>
    <script src="{{asset(env('ROOT').env('FRONT').env('SLIDER').'2/script.js')}}"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

@endsection
