@php
	$object = $object ?? $person ?? null;
	$val = $object->$name ?? old($name);
@endphp

<div class="col-md-{{$col}} form-group" @if( isset($hide) && $hide ) style="display:none" @endif>
	@if ($required || (isset($hide) && $hide ) )
		<b class="text-danger"> * </b>
	@endif
	<label for="{{$name}}">@lang($name)</label>

	@if ($type == 'select')

		<select class="form-control" name="{{$name}}" id="{{$name}}" @if($required) required @endif>
			<option value=""> -- انتخاب کنید -- </option>
			@foreach ($options as $option)
				<option @if($val == $option) selected @endif>{{$option}}</option>
			@endforeach
		</select>
	@elseif ($type == 'date')
		<input type="text" class="form-control pdp"  name="{{$name}}" id="{{$name}}" @if($required) required @endif autocomplete="off" value="{{$val}}">
	@else
		<input
			type="{{$type}}"
			name="{{$name}}"
			id="{{$name}}"
			class="form-control"
			@if($required) required @endif
			@isset($ac) autocomplete="off" @endisset
			@isset($placeholder) placeholder="{{$placeholder}}" @endisset
			value="{{$val}}">
	@endif

	@isset($more_info)
		<small class="text-muted"> {{$more_info}} </small>
	@endisset

</div>
