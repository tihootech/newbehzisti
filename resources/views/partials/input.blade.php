<div class="col-md-{{$col}} form-group">
	<label for="{{$name}}">@lang($name)</label>
	<input
		type="{{$type}}"
		name="{{$name}}"
		class="form-control"
		@if($required) required @endif
		@isset($ac) autocomplete="off" @endisset
		value="{{$value ?? old($name)}}">
</div>
