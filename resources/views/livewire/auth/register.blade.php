<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4">
           
            <div class="box">
                <h1 class="box-header">{{ __('Register') }}</h1>

                <div class="card-body">
                    <form wire:submit.prevent="register" novalidate>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="company_name" class="col-form-label">{{ __('Company Name') }}</label>
                            </div>
                            <div class="col-md-12">
                                <input id="company_name" type="text" class="form-control form-control-lg @error('company_name') is-invalid @enderror" wire:model.defer="company_name" required autocomplete="organization">
                                @error('company_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="email" class="col-form-label">{{ __('Email Address') }}</label>
                            </div>
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" wire:model.defer="email" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="password" class="col-form-label">{{ __('Password') }}</label>
                            </div>
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" wire:model.defer="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>
                            </div>
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control form-control-lg" wire:model.defer="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                    </form>
                     <div wire:loading>loading...</div>
                </div>
            </div>
        </div>
    </div>
</div>
