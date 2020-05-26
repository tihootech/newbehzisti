@extends('layouts.dashboard')
@section('title')
	<title> لیست مددجویان </title>
@endsection

@section('main')

	<div class="tile">

		@include('partials.madadjus_table', ['list' => $applies, 'imode' => 0])

		{{$applies->links()}}

	</div>
@endsection
