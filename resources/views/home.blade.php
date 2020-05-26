@extends('layouts.dashboard')

@section('title')
    <title> داشبورد شما </title>
@endsection

@section('main')

    @if (is('admin') && count($solicits))
        <div class="tile">
            <h4 class="text-center"> <i class="fa fa-list ml-1"></i> کارفرمایانی که نیاز به مددجو دارند </h4>
            <hr>
            @include('partials.solicits_table')
        </div>
    @endif

    <div class="tile">
        @admins

            <h4 class="text-center"> <i class="fa fa-list ml-1"></i> لیست درخواست هایی که به بررسی احتیاج دارند </h4>
            <hr>
            @if ($actions_count)
                <div class="row justify-content-center">
                    @if (count($actions['job']))
                        <div class="col-md-6">
                            <h5 class="text-primary text-center my-3"> @lang('job_apply') </h5>
                            @include('partials.apply_table', ['type' => 'job'])
                        </div>
                    @endif
                    @if (count($actions['loan']))
                        <div class="col-md-6">
                            <h5 class="text-primary text-center my-3"> @lang('loan_apply') </h5>
                            @include('partials.apply_table', ['type' => 'loan'])
                        </div>
                    @endif
                    @if (count($actions['insurance']))
                        <div class="col-md-6">
                            <h5 class="text-primary text-center my-3"> @lang('insurance_apply') </h5>
                            @include('partials.apply_table', ['type' => 'insurance'])
                        </div>
                    @endif
                    @if (count($actions['organ']))
                        <div class="col-md-6">
                            <h5 class="text-primary text-center my-3"> @lang('organ_apply') </h5>
                            @include('partials.apply_table', ['type' => 'organ'])
                        </div>
                    @endif
                </div>
            @else
                <div class="alert alert-info">
                    <i class="fa fa-check ml-1"></i>
                    درحال حاضر
                    ثبت نام جدیدی برای بررسی وجود ندارد.
                </div>
            @endif

        @endadmins
    </div>
@endsection
