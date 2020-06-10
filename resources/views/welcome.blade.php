@extends('layouts.app')
@section('title')
<title> اداره کل بهزیستی استان کرمانشاه </title>
@endsection
@section('content')

    <div class="text-center">
        <h1 class="text-light h2 my-4">
            <strong class="d-block my-4"> سازمان بهزیستی کشور </strong>
            <strong class="d-block my-4"> اداره کل بهزیستی استان کرمانشاه</strong>
            <strong class="d-block my-4"> معاونت اشتغال و کارآفرینی </strong>
        </h1>
        <hr class="border-light w-50">
        <a href="{{route('signup', 1)}}" class="btn bg-light btn-round m-1" data-popover data-content="این آیتم صرفا مختص مددجویان تحت پوششی است که مجوز راه اندازی شغلی را نداشته و یا تمایلی به دریافت تسهیلات ندارند و متقاضی اشتغال در دستگاه های اجرایی و یا کارگاه های تولیدی و خدماتی هستند.">
            مددجوی متقاضی شغل
        </a>
        <a href="{{route('signup', 2)}}" class="btn bg-light btn-round m-1" data-popover data-content="این آیتم مختص مددجویان تحت پوششی است که دارای مجوز راه اندازی کسب و کار بوده ، قبلا از تسهیلات سازمان بهزیستی استفاده ننموده اند و یا نسبت به تسویه تسهیلات دریافتی اقدام نموده اند و در حال حاضر  جهت ایجاد و یا توسعه شغل خود نیازمند استفاده از تسهیلات سازمان بهزیستی هستند.">
            متقاضی تسهیلات (وام)
        </a>
        <a href="{{route('signup', 3)}}" class="btn bg-light btn-round m-1" data-popover data-content="این آیتم مختص مددجویان تحت پوششی است که به صورت خویش فرمائی نسبت به بیمه پردازی اقدام نموده اند و یا در کارگاه های تولیدی مشغول به فعالیت هستند و کارفرما نسبت به بیمه پردازی ایشان اقدام نموده است.">
            بیمه خویش فرمائی و کارفرمائی
        </a>
        <a href="{{route('organ.signup')}}" class="btn bg-light btn-round m-1" data-popover data-content="این آیتم مختص کارفرمایانی است که تمایل به همکاری با اداره کل بهزیستی داشته و مایل هستند که به دلیل مسئولیت اجتماعی و یا دریافت تسهیلات و مشوق های حمایتی بیمه ای نسبت به جذب مددجویان تحت پوشش در کارگاه های تولیدی یا خدماتی خود اقدام نمایند.">
            ثبت نام کارفرمایان
        </a>
    </div>

    {{-- <img src="{{asset('img/favicon.png')}}" alt="اداره کل بهزیستی استان کرمانشاه" class="main-logo"> --}}

@endsection
