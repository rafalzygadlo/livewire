<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div wire:loading>{{ __('reset_password.loading') }}</div>
            <div class="box">
                <div class="card-body">
                    <form wire:submit.prevent="sendResetLink">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 d-flex flex-column justify-content-center p-4">
                                <h1 class="box-header mb-3">{{ __('reset_password.title') }}</h1>
                                <p class="mb-4 text-muted">{{ __('reset_password.description') }}</p>
                            </div>
                            <div class="col-md-6 p-4">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="email" class="form-label">{{ __('reset_password.email_label') }}</label>
                                        <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" wire:model.defer="email" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary w-100">
                                            {{ __('reset_password.submit_email') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
