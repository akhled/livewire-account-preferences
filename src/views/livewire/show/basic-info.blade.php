<div class="container">
    {{-- Name field --}}
    <div class="form-group row">
        <label for="accountName" class="col-2 col-form-label">Name</label>
        <div class="col-10">
            {{ $name }}
        </div>
    </div>

    {{-- Email field --}}
    <div class="form-group row">
        <label for="accountEmail" class="col-2 col-form-label">Email</label>
        <div class="col-10">
            {{ $email }}
        </div>
    </div>

    <a href="{{ config('livewire-account-preferences.routes.edit', config('lwap.routes.edit')) }}" class="btn btn-primary">Edit</a>
</div>
