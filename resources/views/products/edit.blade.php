@extends('layouts.app')
@section('content')

	<div class="container">
		<div class="row">
			<div class="col-12 col-md-8 col-lg-6 mx-auto">
				<h1 class="text-center">Edit Product</h1>
			</div>
		</div>

		@include('sweetalert::alert')

		{{-- edit form start --}}
		<div class="row">
			<div class="col-12 col-md-8 col-lg-6 mx-auto">
				<form 
					action="{{ route('products.update', $product->id)}}"
					method="post" 
					enctype="multipart/form-data" 
				>
					@csrf
					@method('PUT')

					{{-- name --}}
					@include('products.partials.form-group',[
						'name' => 'name',
						'type' => 'text',
						'value' => $product->name,
						'classes' => ['form-control', 'form-control-sm']
					])

					{{-- price --}}
					@include('products.partials.form-group',[
						'name' => 'price',
						'type' => 'text',
						'value' => $product->price,
						'classes' => ['form-control', 'form-control-sm']
					])

					{{-- image --}}
					@include('products.partials.form-group',[
						'name' => 'image',
						'type' => 'file',
						'classes' => ['form-control-file', 'form-control-sm']
					])
					
					{{-- start name --}}
						{{-- <label for="name">Product name:</label>
						<input 
							type="text" 
							name="name" 
							id="name" 
							class="
								form-control 
								form-control-sm
								@error('name')
								is-invalid
								@enderror
							"
						>
						@error('name')
							<small class="d-block invalid-feedback">
								<strong>							
									{{ $message }}
								</strong>
							</small>
						@enderror --}}
					{{-- end name --}}

					{{-- start price --}}
						{{-- <label for="price">Product price:</label>
						<input 
							type="text" 
							name="price" 
							id="price" 
							class="
								form-control 
								form-control-sm
								@error('price')
								is-invalid
								@enderror
							"
						>
						@error('price')
							<small class="d-block invalid-feedback">
								<strong>							
									{{ $message }}
								</strong>
							</small>
						@enderror --}}
					{{-- end price --}}

					{{-- start image --}}
						{{-- <label for="image">Product image:</label>
						<input 
							type="file" 
							name="image" 
							id="image" 
							class="
								form-control-file 
								form-control-sm
								@error('image')
								is-invalid
								@enderror
							"
						>
						@error('image')
							<small class="d-block invalid-feedback">
								<strong>							
									{{ $message }}
								</strong>
							</small>
						@enderror --}}
					{{-- end image --}}

					{{-- start category_id --}}
					<label for="category_id">Product Category</label>
					<select name="category_id" id="category_id" class="form-control form-control-sm">
						@foreach($categories as $category)
							<option 
								value="{{$category->id}}"
								{{ $category->id === $product->category_id ? "selected" : ""}}
							>
								{{$category->name}}
							</option>
						@endforeach
						
					</select>
					@error('category_id')
						<small class="d-block invalid-feedback">
							<strong>							
								{{ $message }}
							</strong>
						</small>
					@enderror
					{{-- end category_id --}}


					{{-- start description --}}
					<label for="description">Product description</label>
					<textarea name="description" id="description" cols="30" rows="10" class="form-control form-control-sm">{{$product->description}}</textarea>
					@error('description')
						<small class="d-block invalid-feedback">
							<strong>							
								{{ $message }}
							</strong>
						</small>
					@enderror
					{{-- end description --}}

					<button class="btn btn-sm btn-warning my-2">Edit Product</button>
					

				</form>
			</div>
		</div>
		{{-- edit form end --}}
	</div>

@endsection