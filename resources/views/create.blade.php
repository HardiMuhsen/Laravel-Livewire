<div>
<form wire:Submit.prevent="submit" class="bg-light border p-2">
    <h1 class="m-3">Create Card :</h1>
    <input type="text" wire:model.defer="name" class="form-control @error('name') border-danger @enderror form-control-lg mt-3" placeholder="Name">
    @error('name') <span class="text-danger mx-2"> {{ $message }}</span>@enderror
    <textarea cols="30" rows="10" style="resize: none" class="form-control @error('description') border border-danger @enderror form-control-lg mt-3" placeholder="Description" wire:model.defer="description"></textarea>
    @error('description') <span class="text-danger mx-2"> {{ $message }}</span>@enderror
    <button class="btn btn-dark btn-lg w-100 my-2">Create Card</button>
</form>
</div>
