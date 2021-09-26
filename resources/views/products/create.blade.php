@extends('layouts.app')

@section('content')
	<div class="container my-5">
		<div class="row">
			<div class="col-12">
				<h1 class="text-center">
					Add Product
				</h1>
			</div>
		</div>
		@include('sweetalert::alert')

		{{-- add product section start --}}
		<div class="row">
			<div class="col-12 col-md-10 col-lg-6 mx-auto">
				{{-- add product form start --}}
				<form 
					action="{{ route('products.store') }}" 
					method="post" 
					enctype="multipart/form-data"

				>
					@csrf

					{{-- name --}}
					@include('products.partials.form-group',[
							'name' => 'name',
							'type' => 'text',
							'classes' => ['form-control', 'form-control-sm']
					])

					{{-- price --}}
					@include('products.partials.form-group',[
							'name' => 'price',
							'type' => 'text',
							'classes' => ['form-control', 'form-control-sm']
					])

					{{-- image --}}
					@include('products.partials.form-group',[
							'name' => 'image',
							'type' => 'file',
							'classes' => ['form-control-file', 'form-control-sm']
					])

					{{-- category id--}}
					<label for="category_id">Product Category:</label>
					<select name="category_id" id="category_id" class="form-control form-control-sm">
						@foreach($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>
					
					{{-- description --}}
					<label class="mt-3" for="description">Product Description:</label>
					<textarea 
						name="description" 
						id="description" cols="30" 
						rows="10" 
						class="form-control 
							form-control-sm 
							@error('description') is-invalid @enderror
						"
						
						></textarea>
					@error('description')
					<small class="d-block invalid-feedback">
						<strong>
							{{ $message }}
						</strong>
					</small>
					@enderror

					<button class="btn btn-sm btn-primary mt-3">Add Product</button>
	
				</form>
				{{-- add product form end --}}
			</div>
		</div>
		{{-- add product section end --}}
	</div>
@endsection