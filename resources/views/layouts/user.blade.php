<!doctype html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.user.name', 'User') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" >
    
    <script src="{{ asset('/js/bootstrap.bundle.js') }}"></script>
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/font/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/app.css') }}">

    
    @livewireStyles
        
</head>
<body >
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.user.name', 'usr.sys') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('home.index') }}">{{ __('Home') }}</a>
                        </li> -->
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        
                        <!-- Authentication Links -->
                        @if(!Auth::guard('user')->check())
                            
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item">
                        
                                <a class="nav-link" href="{{ route('home.index') }}"><i class="bi bi-house-door-fill"></i></a>
                                
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bi bi-person-circle"></i>
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('home.index') }}"> @lang('home.link')</a>
                                <a class="dropdown-item" href="{{ route('settings.index') }}">@lang('settings.link')</a>
                                <a class="dropdown-item" href="{{ route('profile.index') }}">@lang('profile.link')</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"> {{ __('Logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">     
        {{$slot}}
        </main>
       
        <footer class="bd-footer py-4 py-md-5 mt-5 bg-body-tertiary">
  <div class="container py-4 py-md-5 px-4 px-md-3 text-body-secondary">
    <div class="row">
      <div class="col-lg-3 mb-3">
        <a class="d-inline-flex align-items-center mb-2 text-body-emphasis text-decoration-none" href="/" aria-label="Bootstrap">
          <span class="fs-5">CRM System </span>
        </a>
        <ul class="list-unstyled small">
          <li class="mb-2">Designed and built with all the love in the world by the <a href="/docs/5.3/about/team/">Bootstrap team</a> with the help of <a href="https://github.com/twbs/bootstrap/graphs/contributors">our contributors</a>.</li>
          <li class="mb-2">Code licensed <a href="https://github.com/twbs/bootstrap/blob/main/LICENSE" target="_blank" rel="license noopener">MIT</a>, docs <a href="https://creativecommons.org/licenses/by/3.0/" target="_blank" rel="license noopener">CC BY 3.0</a>.</li>
          <li class="mb-2">Currently v5.3.3.</li>
        </ul>
      </div>
      <div class="col-6 col-lg-2 offset-lg-1 mb-3">
        <h5>Links</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><a href="/">Home</a></li>
          <li class="mb-2"><a href="/docs/5.3/">Docs</a></li>
          <li class="mb-2"><a href="/docs/5.3/examples/">Examples</a></li>
          <li class="mb-2"><a href="https://icons.getbootstrap.com/">Icons</a></li>
          <li class="mb-2"><a href="https://themes.getbootstrap.com/">Themes</a></li>
          <li class="mb-2"><a href="https://blog.getbootstrap.com/">Blog</a></li>
          <li class="mb-2"><a href="https://cottonbureau.com/people/bootstrap" target="_blank" rel="noopener">Swag Store</a></li>
        </ul>
      </div>
      <div class="col-6 col-lg-2 mb-3">
        <h5>Guides</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><a href="/docs/5.3/getting-started/">Getting started</a></li>
          <li class="mb-2"><a href="/docs/5.3/examples/starter-template/">Starter template</a></li>
          <li class="mb-2"><a href="/docs/5.3/getting-started/webpack/">Webpack</a></li>
          <li class="mb-2"><a href="/docs/5.3/getting-started/parcel/">Parcel</a></li>
          <li class="mb-2"><a href="/docs/5.3/getting-started/vite/">Vite</a></li>
        </ul>
      </div>
      <div class="col-6 col-lg-2 mb-3">
        <h5>Projects</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><a href="https://github.com/twbs/bootstrap" target="_blank" rel="noopener">Bootstrap 5</a></li>
          <li class="mb-2"><a href="https://github.com/twbs/bootstrap/tree/v4-dev" target="_blank" rel="noopener">Bootstrap 4</a></li>
          <li class="mb-2"><a href="https://github.com/twbs/icons" target="_blank" rel="noopener">Icons</a></li>
          <li class="mb-2"><a href="https://github.com/twbs/rfs" target="_blank" rel="noopener">RFS</a></li>
          <li class="mb-2"><a href="https://github.com/twbs/examples/" target="_blank" rel="noopener">Examples repo</a></li>
        </ul>
      </div>
      <div class="col-6 col-lg-2 mb-3">
        <h5>Community</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><a href="https://github.com/twbs/bootstrap/issues" target="_blank" rel="noopener">Issues</a></li>
          <li class="mb-2"><a href="https://github.com/twbs/bootstrap/discussions" target="_blank" rel="noopener">Discussions</a></li>
          <li class="mb-2"><a href="https://github.com/sponsors/twbs" target="_blank" rel="noopener">Corporate sponsors</a></li>
          <li class="mb-2"><a href="https://opencollective.com/bootstrap" target="_blank" rel="noopener">Open Collective</a></li>
          <li class="mb-2"><a href="https://stackoverflow.com/questions/tagged/bootstrap-5" target="_blank" rel="noopener">Stack Overflow</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>

</div>
    
    @livewireScripts
</body>
</html>
