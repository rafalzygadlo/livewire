<div class="container-fluid">
    <div class="row">
        <div class="col-auto">
            <h1>{{ __('Users') }}</h1>
        </div>
    </div>

    <hr>
    <div class="col">
        <button type="button" class="btn btn-primary" wire:click="openModal()">+</button>
    </div>
    <hr>

    <div class="row justify-content-center">
        <div class="h-50">
            <livewire:user.user-table />
        </div>
    </div>

    <livewire:user.user-form />

</div>
