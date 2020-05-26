@extends('layouts.dashboard')
@section('title')
	<title> جستجوی کدرهگیری </title>
@endsection

@section('main')

	<div class="tile">

        <form class="row justify-content-center">
            <div class="col-md-4">
                <label for="code"> کدرهگیری </label>
                <input type="text" class="form-control" id="code" name="code" value="{{$request->code}}">
            </div>
            <div class="col-md-2 align-self-end">
                <button type="submit" class="btn btn-primary btn-block"> جستجو </button>
            </div>
        </form>

        <hr>

        @if ($request->code)

            @if ($job)
                <div class="alert alert-info">
                    <h5> @lang('job_apply') </h5>
                    <hr>
                    <b> {{$job->person->full_name}} </b>
                    <p class="my-2"> وضعیت : {{$job->stat}} </p>
                </div>
            @elseif ($loan)
                <div class="alert alert-info">
                    <h5> @lang('loan_apply') </h5>
                    <hr>
                    <b> {{$loan->person->full_name}} </b>
                    <p class="my-2"> وضعیت : {{$loan->stat}} </p>
                </div>
            @elseif ($insurance)
                <div class="alert alert-info">
                    <h5> @lang('insurance_apply') </h5>
                    <hr>
                    <b> {{$insurance->person->full_name}} </b>
                    <p class="my-2"> وضعیت : {{$insurance->stat}} </p>
                </div>
            @elseif ($organ)
                <div class="alert alert-info">
                    <h5> کارفرما </h5>
                    <hr>
                    <b> {{$organ->full_name}} </b>
                    <p class="my-2"> وضعیت : {{$organ->stat}} </p>
                </div>
            @else

                <div class="alert alert-warning">
                    هیچ آیتمی در سیستم با این کد رهگیری پیدا نشد.
                </div>

            @endif

        @endif

	</div>
@endsection
