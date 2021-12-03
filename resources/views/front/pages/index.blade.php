@extends('front.layouts.app')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{asset(env('ROOT').env('FRONT').env('SLIDER').'1/style.css')}}">
    <link rel="stylesheet" href="{{asset(env('ROOT').env('FRONT').env('SLIDER').'2/style.css')}}">
    <link rel="stylesheet" href="{{asset(env('ROOT').env('FRONT').env('SLIDER').'3/style.css')}}">
    <link rel="stylesheet" href="{{asset(env('ROOT').env('FRONT').env('SLIDER').'4/style.css')}}">
    <link rel="stylesheet" href="{{asset(env('ROOT').env('FRONT').env('SLIDER').'5/style.css')}}">
    <link rel="stylesheet" href="{{asset(env('ROOT').env('FRONT').env('SLIDER').'6/style.css')}}">
    <link rel="stylesheet" href="{{asset(env('ROOT').env('FRONT').env('CARDS').'1/style.css')}}">


@endsection
@section('body')
    @include('front.modules.slider.1')
    @include('front.modules.cards.1')
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset(env('ROOT').env('FRONT').env('SLIDER').'1/script.js')}}"></script>
    <script src="{{asset(env('ROOT').env('FRONT').env('SLIDER').'2/script.js')}}"></script>
    <script src="{{asset(env('ROOT').env('FRONT').env('SLIDER').'3/script.js')}}"></script>
    <script src="{{asset(env('ROOT').env('FRONT').env('SLIDER').'4/script.js')}}"></script>
    <script src="{{asset(env('ROOT').env('FRONT').env('SLIDER').'5/script.js')}}"></script>
    <script src="{{asset(env('ROOT').env('FRONT').env('SLIDER').'6/script.js')}}"></script>
    <script src="{{asset(env('ROOT').env('FRONT').env('CARDS').'1/script.js')}}"></script>





@endsection
