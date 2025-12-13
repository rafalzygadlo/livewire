@extends('layouts.user')

@section('content')
<h1>{{ __('Home') }}</h1>
<div class="container-fluid">
    <div class="row justify-content-center">
        
        <div class="col-md-1">
            <div class="card">
                <a class="nav-link" href="{{ route('user.home') }}">{{ __('Home') }}</a>
            </div>    
        </div>
        <div class="col-md-1">
            <div class="card">
            <a class="nav-link" href="{{ route('employee.index') }}">{{ __('Employe') }}</a>
            </div>    
        </div>

        <div class="col-md-1">
            <div class="card">
            <a class="nav-link" href="{{ route('user.home') }}">{{ __('Home') }}</a>
            </div>    
        </div>

        <div class="col-md-1">
            <div class="card">
            <a class="nav-link" href="{{ route('user.home') }}">{{ __('Home') }}</a>
            </div>    
        </div>
            


        </div>
    </div>
</div>
@endsection
