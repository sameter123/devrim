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
                                        <p>Giriş yapabilmek için lütfen kullanıcı bilgilerinizi girin.</p>
                                    </div>
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

                                        <form method="post" action="{{route('giris_post')}}" class="row g-3">
                                            @csrf
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Email
                                                    Adresiniz</label>
                                                <input type="email" name="email" class="form-control"
                                                       id="inputEmailAddress"
                                                       placeholder="Email Adresinizi Girin" required>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Şifreniz</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" name="password"
                                                           class="form-control border-end-0"
                                                           id="inputChoosePassword" placeholder="Şifrenizi Girin"
                                                           required>
                                                    <a href="javascript:;" class="input-group-text bg-transparent">
                                                        <i class='bx bx-hide'></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check form-switch">
                                                    <input name="remember" class="form-check-input" type="checkbox"
                                                           id="flexSwitchCheckChecked" checked>
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Beni
                                                        Hatırla</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-end"><a
                                                    href="{{route('sifremi_unuttum')}}">Şifremi Unuttum ?</a>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
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
