<div class="container-fluid">
    <h1 class="mb-4">{{ __('Home') }}</h1>

    <div class="row row-cols-sm-3 row-cols-md-4 row-cols-lg-6 row-cols-xl-6 g-4">

        <div class="col">
            <a href="{{ route('user.index') }}" class="text-decoration-none">
                <div class="card card-tile text-center h-100">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <i class="bi bi-people-fill fs-1 mb-2"></i>
                        <h5 class="card-title mb-0">Użytkownicy</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="{{ route('word.index') }}" class="text-decoration-none">
                <div class="card card-tile text-center h-100">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <i class="bi bi-book-half fs-1 mb-2"></i>
                        <h5 class="card-title mb-0">Słownik</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="{{ route('company.index') }}" class="text-decoration-none">
                <div class="card card-tile text-center h-100">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <i class="bi bi-building fs-1 mb-2"></i>
                        <h5 class="card-title mb-0">Moja Firma</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="{{ route('profile.index') }}" class="text-decoration-none">
                <div class="card card-tile text-center h-100">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <i class="bi bi-person-circle fs-1 mb-2"></i>
                        <h5 class="card-title mb-0">Mój Profil</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col">
            <a href="{{ route('logout') }}" class="text-decoration-none">
                <div class="card card-tile text-center h-100">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <i class="bi bi-box-arrow-right fs-1 mb-2"></i>
                        <h5 class="card-title mb-0">Wyloguj</h5>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>
