<table class="table table-sm table-striped table-bordered">
    <thead>
        <tr>
            <th> # </th>
            <th> نام و نام خانوادگی شخص </th>
            <th> شهر </th>
            <th> تاریخ ایجاد </th>
            <th> تاریخ آخرین تغییر </th>
            <th> عملیات </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($actions[$type] as $i => $apply)
            <tr>
                <th> {{$i+1}} </th>
                <td> {{$apply->full_name ?? $apply->person->full_name ?? '-'}} </td>
                <td> {{$apply->city ?? $apply->person->city ?? '-'}} </td>
                <td> {{date_picker_date($apply->created_at)}} </td>
                <td> {{date_picker_date($apply->updated_at)}} </td>
                <td> <a href="#{{$type}}-modal-{{$apply->id}}" data-toggle="modal" class="btn btn-outline-primary btn-sm"> بررسی </a> </td>
            </tr>
        @endforeach
    </tbody>
</table>

@foreach ($actions[$type] as $i => $apply)
    <div class="modal fade" id="{{$type}}-modal-{{$apply->id}}" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <form class="modal-content" action="{{route('apply.reject', [$type, $apply->id])}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{$apply->full_name ?? $apply->person->full_name ?? '-'}}
                        <span class="badge {{$apply->status == 1 ? 'badge-warning' : 'badge-success'}}">
                            {{$apply->status == 1 ? 'درخواست جدید' : 'ویرایش یافته'}}
                        </span>
                        <span class="badge badge-primary">
                            @lang($type.'_apply')
                        </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row justify-content-center modal-summury">

                        @if ($type == 'organ')
                            <div class="col-md-6">
                                <p> @lang('in_charge_first_name') : <span> {{$apply->in_charge_first_name}} </span> </p>
                            </div>
                            <div class="col-md-6">
                                <p> @lang('in_charge_last_name') : <span> {{$apply->in_charge_last_name}} </span> </p>
                            </div>
                            <div class="col-md-6">
                                <p> @lang('state') : <span> {{$apply->state}} </span> </p>
                            </div>
                            <div class="col-md-6">
                                <p> @lang('city') : <span> {{$apply->city}} </span> </p>
                            </div>
                            <div class="col-md-6">
                                <p> @lang('national_code') : <span> {{$apply->national_code}} </span> </p>
                            </div>
                            <div class="col-md-6">
                                <p> @lang('birth_date') : <span> {{$apply->birth_date}} </span> </p>
                            </div>
                            <div class="col-md-6">
                                <p> @lang('educations') : <span> {{$apply->educations}} </span> </p>
                            </div>
                            <div class="col-md-6">
                                <p> @lang('workshop_location') : <span> {{$apply->workshop_location}} </span> </p>
                            </div>
                            <div class="col-md-6">
                                <p> @lang('postal_code') : <span> {{$apply->postal_code}} </span> </p>
                            </div>
                            <div class="col-md-6">
                                <p> @lang('service') : <span> {{$apply->service}} </span> </p>
                            </div>
                            <div class="col-md-6">
                                <p> @lang('shifts') : <span> {{$apply->shifts}} </span> </p>
                            </div>
                            <div class="col-md-6">
                                <p> @lang('shift_hours') : <span> {{$apply->shift_hours}} </span> </p>
                            </div>
                            <div class="col-md-6">
                                <p> @lang('meal') : <span> {{$apply->meal}} </span> </p>
                            </div>
                            <div class="col-md-6">
                                <p> @lang('phone') : <span> {{$apply->phone}} </span> </p>
                            </div>
                            <div class="col-md-6">
                                <p> @lang('workshop_title') : <span> {{$apply->workshop_title}} </span> </p>
                            </div>
                            <div class="col-md-6">
                                <p> @lang('payment_amount') : <span> {{$apply->payment_amount}} </span> </p>
                            </div>
                            <div class="col-md-6">
                                <p> @lang('offered_payment') : <span> {{$apply->offered_payment ? nf($apply->offered_payment).' ریال' : '-'}} </span> </p>
                            </div>
                            <div class="col-md-6">
                                <p> @lang('madadjus_insurance') : <span> {{$apply->madadjus_insurance}} </span> </p>
                            </div>
                            <div class="col-md-6">
                                <p> @lang('full_insurance') : <span> {{$apply->full_insurance}} </span> </p>
                            </div>
                            <div class="col-md-12">
                                <p> @lang('address') : <span> {{$apply->address}} </span> </p>
                            </div>
                        @else
                            <div class="col-md-4">
                                <p> نام : <span>{{$apply->person->full_name ?? '-'}}</span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('city') : <span> {{$apply->person->city ?? '-'}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('lifestyle') : <span> {{$apply->person->lifestyle ?? '-'}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('postal_code') : <span> {{$apply->person->postal_code ?? '-'}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('national_code') : <span> {{$apply->person->national_code ?? '-'}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('father_name') : <span> {{$apply->person->father_name ?? '-'}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('birth_certificate_number') : <span> {{$apply->person->birth_certificate_number ?? '-'}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('birth_date') : <span> {{$apply->person->birth_date ?? '-'}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> ارجاع دهنده : <span> {{$apply->person->refrence ?? '-'}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('madadkar_name') : <span> {{$apply->person->madadkar_name ?? '-'}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('marital_status') : <span> {{$apply->person->marital_status ?? '-'}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('family_members') : <span> {{$apply->person->family_members ?? '-'}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('gender') : <span> {{$apply->person->gender ?? '-'}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('education') : <span> {{$apply->person->education ?? '-'}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('field_of_study') : <span> {{$apply->person->field_of_study ?? '-'}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('academic_orientation') : <span> {{$apply->person->academic_orientation ?? '-'}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('warden_type') : <span> {{$apply->person->warden_type ?? '-'}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('health_status') : <span> {{$apply->person->health_status ?? '-'}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('disables_in_family') : <span> {{$apply->person->disables_in_family ?? '-'}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('mobile') : <span> {{$apply->person->mobile ?? '-'}} </span> </p>
                            </div>
                            <div class="col-md-12">
                                <p> @lang('address') : <span> {{$apply->person->address ?? '-'}} </span> </p>
                            </div>
                        @endif

                        @if ($type == 'job')
                            <div class="col-md-12">
                                <p> @lang('skill_type') : <span> {{$apply->skill_type}} </span> </p>
                            </div>
                            <div class="col-md-12">
                                <p> @lang('interests') : <span> {{$apply->interests}} </span> </p>
                            </div>
                            <div class="col-md-12">
                                <p> @lang('vehicle_type') : <span> {{$apply->vehicle_type}} </span> </p>
                            </div>
                        @endif

                        @if ($type == 'loan')
                            <div class="col-md-4">
                                <p> @lang('workshop_name') : <span> {{$apply->workshop_name}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('license_type') : <span> {{$apply->license_type}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('license_system') : <span> {{$apply->license_system}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('plan_title') : <span> {{$apply->plan_title}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('required_finance') : <span> {{$apply->required_finance}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('suggested_bank') : <span> {{$apply->suggested_bank}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('insurance_number') : <span> {{$apply->insurance_number}} </span> </p>
                            </div>
                        @endif

                        @if ($type == 'insurance')
                            <div class="col-md-4">
                                <p> @lang('license_type') : <span> {{$apply->license_type}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('license_system') : <span> {{$apply->license_system}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('plan_title') : <span> {{$apply->plan_title}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('insurance_status') : <span> {{$apply->insurance_status}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('insurance_number') : <span> {{$apply->insurance_number}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('workshop_name') : <span> {{$apply->workshop_name}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('monthly_amount') : <span> {{$apply->monthly_amount}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('shaba') : <span> {{$apply->shaba}} </span> </p>
                            </div>
                            <div class="col-md-4">
                                <p> @lang('bank') : <span> {{$apply->bank}} </span> </p>
                            </div>
                        @endif

                        @unless ($type == 'organ')
                            <div class="col-md-12">
                                <p> @lang('information') : <span> {{$apply->person->information ?? '-'}} </span> </p>
                            </div>
                        @endunless

                    </div>

                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <input type="text" class="form-control" name="rejection_reason" placeholder="در صورت رد کردن علت رد کردن نیز باید ذکر شود" required>
                        <div class="text-center mt-3">
                            <button type="button" class="btn mx-1 btn-secondary" data-dismiss="modal">
                                <i class="fa fa-arrow-right ml-1"></i> انصراف
                            </button>
                            <button type="submit" class="btn mx-1 btn-warning"> <i class="fa fa-times ml-1"></i> رد کردن </button>
                            <button type="button" class="btn mx-1 btn-success" onclick="$('#{{$type}}-accept-form-{{$apply->id}}').submit()">
                                <i class="fa fa-check ml-1"></i> تایید اطلاعات
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <form id="{{$type}}-accept-form-{{$apply->id}}" class="d-none" action="{{route('apply.accept', [$type, $apply->id])}}" method="post">
        @csrf
    </form>
@endforeach
