
<div class="container-fluid">

    <div class="row">
        
    <h1>{{ __('Home') }}</h1>
    
    <div class="col">
        <a href="{{ route('user.index') }}">Users</a><br
        <a href="{{ route('word.index') }}">Words</a><br>
        <h3>{{ __('Account') }}</h3>
        <a href="{{ route('profile.index') }}">Profile</a><br>
        <a href="{{ @route('logout') }}">Logout</a><br>
    </div>
       
    </div>
</div>

