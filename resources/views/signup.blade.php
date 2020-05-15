@extends('layouts.app')

@section('title')
<title>
    @if ($type == 1)
        مددجوی متقاضی شغل
    @elseif ($type == 2)
        متقاضی تسهیلات (وام)
    @elseif ($type == 3)
        بیمه خویش فرمائی و کارفرمائی
    @elseif ($type == 4)
        ثبت نام کارفرمایان
    @endif
</title>
@endsection

@section('content')

<section class="align-items-center d-flex bg-dark main-banner">

    <div class="banner-container">

        <div class="card">
            <div class="card-header text-center">
                <h1 class="h3">
                    @if ($type == 1)
                        مددجوی متقاضی شغل
                    @elseif ($type == 2)
                        متقاضی تسهیلات (وام)
                    @elseif ($type == 3)
                        بیمه خویش فرمائی و کارفرمائی
                    @elseif ($type == 4)
                        ثبت نام کارفرمایان
                    @endif
                </h1>
                <p class="mb-0">
                    مرحله {{$step}} :
                    @if ($step == 1)
                         ایجاد حساب کاربری
                    @endif
                </p>
            </div>
            <div class="card-body pb-5">

                <div class="mb-4">
                    @include('partials.errors_and_messages')
                </div>


                @include('steps.step_'.$step)

            </div>
            <div class="card-footer d-flex">
                @if ($step > 1)
                    <a href="#" class="btn btn-secondary btn-round ml-auto"> مرحله قبل </a>
                @endif
                <a href="#" class="btn btn-danger btn-round mr-auto"> مرحله بعد </a>
            </div>
        </div>

    </div>

</section>


@endsection
