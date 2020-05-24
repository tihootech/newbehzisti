@extends('layouts.dashboard')
@section('title')
	<title> لیست مسئولین شهرستان ها </title>
@endsection

@section('main')

	<div class="tile">

		<div class="table-responsive mb-3">
			<table class="table table-sm table-bordered table-striped table-hover fixed-width text-center">
				<thead>
					<tr>
						<th> ردیف </th>
						<th> وضعیت </th>
						<th style="min-width:200px"> نام مسئول </th>
						<th> @lang('phone') </th>
						<th> استان </th>
						<th> @lang('city') </th>
						<th> @lang('national_code') </th>
						<th> @lang('birth_date') </th>
						<th> @lang('educations') </th>
						<th> @lang('workshop_location') </th>
						<th style="min-width:200px"> نام کارگاه </th>
						<th> @lang('postal_code') </th>
						<th style="min-width:175px"> @lang('service') </th>
						<th> @lang('shifts') </th>
						<th> @lang('shift_hours') </th>
						<th> @lang('meal') </th>
						<th style="min-width:150px"> @lang('payment_amount') </th>
						<th style="min-width:200px"> @lang('offered_payment') </th>
						<th> @lang('madadjus_insurance') </th>
						<th> @lang('full_insurance') </th>
						<th colspan="2"> عملیات </th>
					</tr>
				</thead>
				<tbody>
					@foreach ($organs as $r => $organ)
						<tr>
							<th> {{$r+1}} </th>
							<td class="
								@if($organ->status == 1)
									bg-warning
								@elseif($organ->status == 2)
									bg-info text-light
								@elseif($organ->status == 3)
									bg-danger text-light
								@else bg-success text-light
							@endif">
								{{$organ->stat}}
							</td>
							<td> {{$organ->full_name}} </td>
							<td dir="ltr"> {{$organ->phone}} </td>
							<td> {{$organ->state}} </td>
							<td> {{$organ->city}} </td>
							<td> {{$organ->national_code}} </td>
							<td> {{$organ->birth_date}} </td>
							<td> {{$organ->educations}} </td>
							<td> {{$organ->workshop_location}} </td>
							<td> {{$organ->workshop_title}} </td>
							<td> {{$organ->postal_code}} </td>
							<td> {{$organ->service}} </td>
							<td> {{$organ->shifts}} </td>
							<td> {{$organ->shift_hours}} </td>
							<td> {{$organ->meal}} </td>
							<td> {{$organ->payment_amount}} </td>
							<td> {{nf($organ->offered_payment)}} ریال </td>
							<td> {{$organ->madadjus_insurance}} </td>
							<td> {{$organ->full_insurance}} </td>
							<td>
								<form class="d-inline" action="{{route('organ.destroy', $organ)}}" method="post">
									@method('DELETE')
									@csrf
									<button type="button" class="btn btn-sm btn-outline-danger delete">
										حذف
									</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		{{$organs->links()}}
	</div>
@endsection
