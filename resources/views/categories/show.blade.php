@extends('layouts.app')

@section('content')
	
	<div class="container my-5">
		<div class="row">
			<div class="col-12">
				<h1 class="text-center">
					View Category
				</h1>
			</div>
		</div>

		{{-- start alert --}}
		@includeWhen(Session::has('message'), 'partials.alert')

		<div class="row">
			<div class="col-12 col-sm-6 col-md-8 mx-auto">
				@include('categories.partials.card', ['view' => false])
			</div>
		</div>
		@include('sweetalert::alert')
	</div>

@endsection