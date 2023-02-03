@extends("template")

@section("centralniSadrzaj")
<div class="col-md-8">
<br/> <br/> <br/> <br/>



    @isset($errors)
        @foreach($errors->all() as $error)
                {{ $error }}
        @endforeach
    @endisset

    @if(session()->has('message'))
        {{ session('message') }}
    @endif

    @if(session()->has('user'))
        <a href="" id="users-link">Admin - Users</a>
        <a href="" id="settings-link">Admin - Settings</a>
    @endif
    <form action="{{ url("/login") }}" method="POST">
        
        @csrf

        <div class="form-group">
            <label>Email:</label>
            <input type="text" name="email" />
        </div>
        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="lozinka" />
        </div>
        <div class="form-group">
            <input type="submit" name="btnLogin" value = "Uloguj se" />
        </div>
    
    </form>
    </div>
@endsection