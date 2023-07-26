<div>
<div class="position-fixed top-0 left-0 vh-100 w-100 text-center" style="z-index: 999999;background: rgba(0, 0, 0, 0.5);" wire:loading>
<h3 class="text-white position-absolute" style="transform: translate(-50%, -50%); top:50%; left:50%">Loading...</h3>
</div>
  
<div class="container">
    <input type="text" placeholder="Search" class="form-control form-control-lg my-3" wire:model="search">
    <div>
      @if (session()->has('message'))
        <div class="alert alert-danger"> {{ session('message') }}
        </div>
      @endif
    </div>


    <livewire:create  />



    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger m-2">{{ $error }}</div>
        @endforeach
    @endif
    


    <div class="row g-4 my-4">
      @foreach ($posts as $post)
      <div class="col-md-3 col-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{ $post->name }}</h5>
            <p class="card-text">{{ Str::limit($post->description, 30, '...') }}</p>
            <button class="btn btn-danger btn-sm" wire:click="delete({{ $post->id }})">Delete</button>
            <span class="btn btn-primary btn-sm" data-bs-toggle="modal" wire:click="SelectToUpdate({{ $post->id }})"  data-bs-target="#edit{{ $post->id }}">Edit</span>
           

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="edit{{ $post->id }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form wire:submit.prevent="update({{ $post->id }})" class="modal-content">
      
      <div class="modal-body">
        <input type="text" wire:model.defer="name" class="form-control form-control-lg my-2">
        <input type="text" wire:model.defer="description" class="form-control form-control-lg my-2">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
      </div>
    </form>
  </div>
</div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  
@if ($search && $posts->total() < 1)

    <div class="text-center my-4"><h1>No Result For : {{ $search }}</h1></div>
@endif

@if ($limit <= $posts->total())
    

<div class="d-flex justify-content-center my-4">
    <div class="btn btn-dark btn-lg" wire:click="LoadMore">Load More</div>
</div>
@endif
</div>
</div>
</div>
