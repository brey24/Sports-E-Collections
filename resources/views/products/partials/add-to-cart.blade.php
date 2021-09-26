<form action="{{route('cart.update', $product->id)}}" method="post" class="my-2">
	@csrf
	@method('PUT')
	<input type="number" name="quantity" id="" class="form-control form-control-sm" min="1" value="1">
	<button class="btn btn-sm btn-success w-100 mt-1">Add to Cart</button>
</form>
