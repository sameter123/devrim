@extends('back.auth.layouts.app')
@section('content')
    <body class="bg-login">
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="mb-4 text-center">
                            <img src="{{asset(env('ROOT').env('BACK').env('IMAGES').'logo-img.png')}}" width="180"
                                 alt=""/>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center">
                                        <h3 class="">Oturum Aç</h3>
                                        <p>Giriş yapabilmek için lütfen size gönderilen sms içerisindeki kodu girin.</p>
                                    </div>


                                    <div
                                        class="alert border-0 border-start border-5 border-info alert-dismissible fade show py-2">
                                        <div class="d-flex align-items-center">
                                            <div class="font-35 text-info"><i class="bx bx-time"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0 text-info"></h6>
                                                <div> Kod geçerlilik süresi: <span id="timer"></span></div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    $simdiki = date('Y-m-d H:i:s');
                                    $dateTimeS = new DateTime($simdiki);
                                    $timestampS = $dateTimeS->format('U');
                                    $kaydedilen = $user->two_factor_secret_expired;
                                    $dateTimeK = new DateTime($kaydedilen);
                                    $timestampK = $dateTimeK->format('U');
                                    $kalanSaniyeToplam = 300 - ($timestampS - $timestampK);
                                    $kalanDakika = floor($kalanSaniyeToplam / 60);
                                    $kalanSaniye = $kalanSaniyeToplam - ($kalanDakika * 60);
                                    ?>
                                    <script>
                                        document.getElementById('timer').innerHTML = {{$kalanDakika}} + ":" + {{$kalanSaniye}};
                                        startTimer();

                                        function startTimer() {
                                            var presentTime = document.getElementById('timer').innerHTML;
                                            var timeArray = presentTime.split(/[:]+/);
                                            var m = timeArray[0];
                                            var s = checkSecond((timeArray[1] - 1));
                                            if (s == 59) {
                                                m = m - 1
                                            }
                                            if(m<0){
                                                location.href='{{route('giris')}}';
                                                clearInterval(startTimer());
                                            }
                                            document.getElementById('timer').innerHTML =
                                                m + ":" + s;
                                            setTimeout(startTimer, 1000);
                                        }

                                        function checkSecond(sec) {
                                            if (sec < 10 && sec >= 0) {
                                                sec = "0" + sec
                                            }
                                            ; // add zero in front of numbers < 10
                                            if (sec < 0) {
                                                sec = "59"
                                            }
                                            ;
                                            return sec;
                                        }
                                    </script>


                                    <div class="form-body">
                                        @if(count($errors) > 0)
                                            <div
                                                class="alert border-0 border-start border-5 border-warning alert-dismissible fade show py-2">
                                                <div class="d-flex align-items-center">
                                                    <div class="font-35 text-warning"><i class="bx bx-info-circle"></i>
                                                    </div>
                                                    <div class="ms-3">
                                                        <h6 class="mb-1 text-warning">Dikkat! Aşağıdaki hatalar
                                                            nedeniyle oturum açamadınız</h6>
                                                        <div>
                                                            @foreach($errors->all() as $error)
                                                                {{$error}} @if(!$loop->last), @else . @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                            </div>
                                        @endif
                                        @if(session('error'))
                                            <div
                                                class="alert border-0 border-start border-5 border-warning alert-dismissible fade show py-2">
                                                <div class="d-flex align-items-center">
                                                    <div class="font-35 text-warning"><i class="bx bx-info-circle"></i>
                                                    </div>
                                                    <div class="ms-3">
                                                        <h6 class="mb-1 text-warning">Dikkat! Aşağıdaki hatalar
                                                            nedeniyle oturum açamadınız</h6>
                                                        <div>{{session('error')}}</div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                            </div>
                                        @endif

                                        <form method="post" action="{{route('girisSms_post')}}" class="row g-3">
                                            @csrf
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Güvenlik Kodu</label>
                                                <input type="text" name="code" class="form-control"
                                                       id="inputEmailAddress"
                                                       placeholder="6 haneli kodu girin" required autofocus>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <input type="hidden" name="id" value="{{$user->id}}">
                                                    <button type="submit" class="btn btn-outline-primary"><i
                                                            class="bx bxs-lock-open"></i>Oturum Aç
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
@endsection
