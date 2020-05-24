@extends('layouts.dashboard')
@section('title')
	<title> لیست مددجویان </title>
@endsection

@section('main')

	<div class="tile">

		<div class="table-responsive mb-3">
			<table class="table table-bordered table-sm table-striped table-hover fixed-width text-center">
				<thead>
					<tr>
						<th> ردیف </th>
						<th> وضعیت </th>
						<th style="min-width:200px"> نام </th>
						<th> @lang('city') </th>
						<th> @lang('lifestyle') </th>
						<th style="min-width:200px"> @lang('address') </th>
						<th> @lang('postal_code') </th>
						<th> @lang('national_code') </th>
						<th> @lang('father_name') </th>
						<th> @lang('birth_certificate_number') </th>
						<th> @lang('birth_date') </th>
						<th> ارجاع دهنده </th>
						<th style="min-width:200px"> @lang('madadkar_name') </th>
						<th> @lang('marital_status') </th>
						<th> @lang('family_members') </th>
						<th> @lang('gender') </th>
						<th> @lang('education') </th>
						<th> @lang('field_of_study') </th>
						<th> @lang('academic_orientation') </th>
						<th> @lang('warden_type') </th>
						<th> @lang('health_status') </th>
						<th style="min-width:200px"> @lang('disables_in_family') </th>
						<th> @lang('mobile') </th>

						@if ($type == 'job')
							<th style="min-width:200px"> @lang('skill_type') </th>
							<th style="min-width:200px"> @lang('interests') </th>
							<th> @lang('vehicle_type') </th>
						@endif

						@if ($type == 'loan')
							<th> @lang('workshop_name') </th>
							<th> @lang('license_type') </th>
							<th style="min-width:200px"> @lang('license_system') </th>
							<th> @lang('plan_title') </th>
							<th style="min-width:200px"> @lang('required_finance') </th>
							<th> @lang('suggested_bank') </th>
							<th> @lang('insurance_number') </th>
						@endif

						@if ($type == 'insurance')
							<th> @lang('license_type') </th>
							<th style="min-width:200px"> @lang('license_system') </th>
							<th> @lang('plan_title') </th>
							<th> @lang('insurance_status') </th>
							<th> @lang('insurance_number') </th>
							<th> @lang('workshop_name') </th>
							<th style="min-width:200px"> @lang('monthly_amount') </th>
							<th style="min-width:200px"> @lang('shaba') </th>
							<th> @lang('bank') </th>
						@endif

						<th style="min-width:200px"> @lang('information') </th>
						<th> عملیات </th>
					</tr>
				</thead>
				<tbody>
					@foreach ($applies as $r => $apply)
						<tr>
							<th> {{$r+1}} </th>
							<td class="
								@if($apply->status == 1)
									bg-warning
								@elseif($apply->status == 2)
									bg-info text-light
								@elseif($apply->status == 3)
									bg-danger text-light
								@else bg-success text-light
							@endif">
								{{$apply->stat}}
							</td>
							<td> {{$apply->person->full_name ?? '-'}} </td>
							<td> {{$apply->person->city ?? '-'}} </td>
							<td> {{$apply->person->lifestyle ?? '-'}} </td>
							<td data-content="{{$apply->person->address}}"> {{short($apply->person->address, 20)}} </td>
							<td> {{$apply->person->postal_code ?? '-'}} </td>
							<td> {{$apply->person->national_code ?? '-'}} </td>
							<td> {{$apply->person->father_name ?? '-'}} </td>
							<td> {{$apply->person->birth_certificate_number ?? '-'}} </td>
							<td> {{$apply->person->birth_date ?? '-'}} </td>
							<td> {{$apply->person->reference ?? '-'}} </td>
							<td> {{$apply->person->madadkar_name ?? '-'}} </td>
							<td> {{$apply->person->marital_status ?? '-'}} </td>
							<td> {{$apply->person->family_members ?? '-'}} </td>
							<td> {{$apply->person->gender ?? '-'}} </td>
							<td> {{$apply->person->education ?? '-'}} </td>
							<td> {{$apply->person->field_of_study ?? '-'}} </td>
							<td> {{$apply->person->academic_orientation ?? '-'}} </td>
							<td> {{$apply->person->warden_type ?? '-'}} </td>
							<td> {{$apply->person->health_status ?? '-'}} </td>
							<td> {{$apply->person->disables_in_family ?? '-'}} </td>
							<td dir="ltr"> {{$apply->person->mobile ?? '-'}} </td>

							@if ($type == 'job')
								<td data-content="{{$apply->skill_type}}"> {{short($apply->skill_type, 20)}} </td>
								<td data-content="{{$apply->interests}}"> {{short($apply->interests, 20)}} </td>
								<td> {{$apply->vehicle_type}} </td>
							@endif

							@if ($type == 'loan')
								<td> {{$apply->workshop_name}} </td>
								<td> {{$apply->license_type}} </td>
								<td> {{$apply->license_system}} </td>
								<td> {{$apply->plan_title}} </td>
								<td> {{nf($apply->required_finance)}} ریال </td>
								<td> {{$apply->suggested_bank}} </td>
								<td> {{$apply->insurance_number}} </td>
							@endif

							@if ($type == 'insurance')
								<td> {{$apply->license_type}} </td>
								<td> {{$apply->license_system}} </td>
								<td> {{$apply->plan_title}} </td>
								<td> {{$apply->insurance_status}} </td>
								<td> {{$apply->insurance_number}} </td>
								<td> {{$apply->workshop_name}} </td>
								<td> {{nf($apply->monthly_amount)}} ریال </td>
								<td> {{$apply->shaba}} </td>
								<td> {{$apply->bank}} </td>
							@endif

							<td data-content="{{$apply->person->information}}"> {{short($apply->person->information, 20)}} </td>
							<td>
								<form class="d-inline" action="{{route('apply.destroy', [$type, $apply->id])}}" method="post">
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

		{{$applies->links()}}

	</div>
@endsection
