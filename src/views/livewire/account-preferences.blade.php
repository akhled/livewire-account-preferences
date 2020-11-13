<form wire:submit.prevent="save" class="container">
    {{-- Name field --}}
    <div class="form-group row">
        <label for="accountName" class="col-2 col-form-label">Name</label>
        <div class="col-10">
            <input type="text" class="form-control" name="accountName" id="accountName" wire:model="user.name">
        </div>
    </div>

    {{-- Email field --}}
    <div class="form-group row">
        <label for="accountEmail" class="col-2 col-form-label">Email</label>
        <div class="col-10">
            <input type="email" class="form-control" name="accountEmail" id="accountEmail" wire:model="user.email">
        </div>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
</form>