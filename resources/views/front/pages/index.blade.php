@extends('front.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset(env('ROOT').env('FRONT').env('SLIDER').'1/style.css')}}">
@endsection
@section('body')
    @include('front.modules.slider.1')
@endsection
@section('js')
    <script src="{{asset(env('ROOT').env('FRONT').env('SLIDER').'1/script.js')}}"></script>
@endsection
