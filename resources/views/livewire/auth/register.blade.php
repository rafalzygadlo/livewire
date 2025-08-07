<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4">
        @if ($errors->any())
        <div class="text-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
        </div>
        @endif
           <div wire:loading>loading...</div>
            <div class="box">
                <h2 class="box-header">{{ __('register.title') }}</h2>

                <div class="box-body">
                    <form wire:submit.prevent="register">
                        @csrf

                        <div class="row mb-12">
                            <label for="company_name" class="col-form-label">{{ __('register.company.name') }}</label>
                        </div>
                        <div class="col-md-12">
                                <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" wire:model.defer="company_name" autocomplete="company_name" autofocus>

                                @error('company_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="row mb-12">
                                <label for="email" class="col-form-label">{{ __('register.email') }}</label>
                            </div>
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" wire:model.defer="email" autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        

                        <div class="row">
                            <div class="col-mb-12">
                                <label for="password" class="col-form-label">{{ __('register.password') }}</label>
                            </div>
                           
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" wire:model.defer="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <label for="password-confirm" class="col-form-label">{{ __('register.confirm.password') }}</label>
                            </div>
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" wire:model.defer="pass" autocomplete="new-password">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        <hr>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

