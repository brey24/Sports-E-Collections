<div class="card mb-2">
  <div class="card-body">
    <h4 class="cart-title text-center">
      {{ $category->name }}
    </h4>
  </div>
  <div class="card-footer text-center">
    @if(!isset($view))
      {{-- view --}}
      <a href="{{ route('categories.show', $category->id) }}" class="btn btn-success btn-sm mx-2">View</a>
    @endif
    {{-- edit --}}
    {{-- <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm mx-2">Edit</a> --}}
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-sm mx-2" data-toggle="modal" data-target="#staticBackdrop1{{$category->id}}">
     Edit
    </button>
    {{-- delete --}}
     <button type="button" class="btn btn-danger btn-sm mx-2" data-toggle="modal" data-target="#staticBackdrop2{{$category->id}}">
     Delete
    </button>
  

    
  </div>
</div>

<!-- Modal Edit-->
<div class="modal fade" id="staticBackdrop1{{$category->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-12">
        <h1 class="text-center">
          Edit Category
        </h1>
      </div>

      
        {{-- start form --}}
        <form action="{{ route('categories.update', $category->id) }}" method="post">
          @csrf
          @method('PUT')
          <label for="name">Category name:</label>
          <input 
            type="text" 
            name="name" 
            id="name" 
            class="form-control 
              form-control-sm 
              @error('name')is-invalid
              @enderror
            " 
            value="{{ $category->name }}" 
            autofocus
            autocomplete="name" 
            required 
          >
          @error('name')
            <small class="d-block invalid-feedback">
              <strong>{{ $message }}</strong>
            </small>
          @enderror
          <button class="btn btn-sm btn-warning mt-1">Edit</button>
        </form>
        {{-- end form --}}
        @include('sweetalert::alert')
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>


<!-- Modal Delete-->
<div class="modal fade" id="staticBackdrop2{{$category->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5 class="text-center">Are you sure you want to delete {{$category->name}}?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <form action="{{ route('categories.destroy', $category->id) }}" method="post" class="d-inline-block mx-2">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger btn-sm">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>