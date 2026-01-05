<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Company Details') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form wire:submit.prevent="update">
                        <!-- Company Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Company Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Inne pola firmy można dodać tutaj -->

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Save') }}
                            </button>

                            <div wire:loading wire:target="update" class="ms-2">
                                Zapisywanie...
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
