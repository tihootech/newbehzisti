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

		<select id="{{$name}}"
			class="@isset($multiple) select2 @else form-control @endisset"
			@isset($multiple) multiple @endisset
			name="{{isset($multiple) ? $name.'[]' : $name}}"
			@if($required) required @endif>

			@unless (isset($multiple))
				<option value=""> -- انتخاب کنید -- </option>
			@endunless
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

	@isset($select_all)
		<div class="mt-1">
			<a href="#" class="select-all" data-id="{{$name}}"> انتخاب همه موارد </a>
		</div>
	@endisset

</div>
