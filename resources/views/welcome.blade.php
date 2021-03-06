@extends('layouts.app')
@section('title')
<title> اداره کل بهزیستی استان کرمانشاه </title>
@endsection
@section('content')

    <div class="text-center">
        <h1 class="text-light h2 my-4">
            {{-- <strong class="d-block my-4"> سازمان بهزیستی کشور </strong> --}}
            <strong class="d-block my-4"> اداره کل بهزیستی استان کرمانشاه</strong>
            <strong class="d-block my-4"> معاونت اشتغال و کارآفرینی </strong>
        </h1>
        <hr class="border-light w-50">
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

    <img src="{{asset('img/white-logo.png')}}" alt="اداره کل بهزیستی استان کرمانشاه" class="main-logo">

@endsection
