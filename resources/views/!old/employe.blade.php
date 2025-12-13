@extends('layouts.user')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        
       {{Auth::user()->id}}
            


    </div>
</div>
@endsection
