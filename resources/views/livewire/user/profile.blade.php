<div class="container-fluid">
    <div class="row">
        <div class="col-auto">
            <h1>{{ __('Profile') }}</h1>
        </div>
    </div>
    <hr>

    <div class="row justify-content-md-center">

        <div class="col col-lg-4 col-md-6">
            <h5>Informacje o profilu</h5>
            <p>Zaktualizuj informacje o swoim profilu i adres e-mail.</p>

            {{-- Komunikat o statusie po zapisie --}}
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Komunikat o konieczności weryfikacji emaila --}}
            @if (Auth::user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! Auth::user()->hasVerifiedEmail())
                <div class="alert alert-warning mt-3">
                    <p>
                        Twój adres e-mail jest niezweryfikowany.
                        <button form="send-verification" class="btn btn-link p-0 m-0 align-baseline">Kliknij tutaj, aby ponownie wysłać e-mail weryfikacyjny.</button>
                    </p>
                </div>
            @endif

            {{-- Ukryty formularz do ponownego wysłania weryfikacji --}}
            <form id="send-verification" method="post" action="{{ route('verification.send') }}" class="d-none">
                @csrf
            </form>

            <form wire:submit="save" class="mt-4">
                <!-- Avatar -->
                <div class="mb-3">
                    <label for="photo" class="form-label">Awatar</label>
                    <div class="d-flex align-items-center">
                        <!-- Current Avatar -->
                        @if ($photo)
                            <img src="{{ $photo->temporaryUrl() }}" class="rounded-circle me-3" width="80" height="80">
                        @elseif (Auth::user()->avatar)
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="rounded-circle me-3" width="80" height="80">
                        @else
                            <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center me-3" style="width: 80px; height: 80px; font-size: 2rem;">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                        @endif
                        <div class="flex-grow-1">
                            <input wire:model="photo" type="file" class="form-control @error('photo') is-invalid @enderror" id="photo">
                        </div>
                        @if(Auth::user()->avatar || $photo)
                        <button wire:click.prevent="removeAvatar" type="button" class="btn btn-outline-danger ms-2">
                            Usuń
                        </button>
                        @endif
                    </div>
                    @error('photo') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="first_name" class="form-label">Imię</label>
                    <input wire:model="first_name" id="first_name" type="text" class="form-control form-control-lg @error('first_name') is-invalid @enderror">
                    @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="last_name" class="form-label">Nazwisko</label>
                    <input wire:model="last_name" id="last_name" type="text" class="form-control form-control-lg @error('last_name') is-invalid @enderror">
                    @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input wire:model="email" id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror">
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-primary">Zapisz</button>
            </form>
        </div>
    </div>
</div>
