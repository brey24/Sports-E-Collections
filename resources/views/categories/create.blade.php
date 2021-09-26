@extends('layouts.app')

@section('content')
	<div class="container my-5">
		<div class="row">
			<div class="col-12">
				<h1 class="text-center">
					Create New Category
				</h1>
			</div>
		</div>
		{{-- @if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif --}}

		{{-- start form section --}}
		<div class="row">
			<div class="col-12 col-sm-6 mx-auto">
				<form action="{{ route('categories.store') }}" method="post">
					@csrf
					<label for="name">Category name:</label>
					<input type="text" name="name" id="name" class="form-control form-control-sm">
					<button class="btn btn-sm btn-primary mt-1">Create Category</button>
				</form>
			</div>
			@include('sweetalert::alert')
		</div>
		{{-- end form section --}}
	</div>
@endsection