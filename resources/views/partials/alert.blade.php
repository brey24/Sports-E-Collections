<div class="row">
	<div class="col-12">
		<div class="alert alert-{{ Session::has('alert') ? Session::get('alert') : "info" }}">
			{{ Session::get('message') }}
		</div>
	</div>
</div>