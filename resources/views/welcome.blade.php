@extends('layouts.app')
@section('content')
    <section class="align-items-center d-flex bg-dark main-banner">

        <div class="banner-container">

            <div class="text-center">
                <h1 class="text-light my-4"><strong> سازمان بهزیستی استان کرمانشاه </strong> </h1>
                <p>
                    <a href="{{route('home')}}" class="btn bg-danger btn-round text-light btn-lg">
                        ورود به کارتابل
                    </a>
                </p>
                <hr class="border-light">
                <a href="{{route('signup', 1)}}" class="btn bg-light btn-round m-1">
                    مددجوی متقاضی شغل
                </a>
                <a href="{{route('signup', 2)}}" class="btn bg-light btn-round m-1">
                    متقاضی تسهیلات (وام)
                </a>
                <a href="{{route('signup', 3)}}" class="btn bg-light btn-round m-1">
                    بیمه خویش فرمائی و کارفرمائی
                </a>
                <a href="{{route('organ.signup')}}" class="btn bg-light btn-round m-1">
                    ثبت نام کارفرمایان
                </a>
            </div>

        </div>

    </section>
@endsection
