@extends('layouts.app')
<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);
body {
    font-family: "Trirong", serif;
    background-color: rgb(91, 163, 240);
    background-image: url("http://www.bukittinggikota.go.id/backend/img/gallery/721c38960ff0e7b4dec71b736e5fd7e9.jpg");
    background-size: 100%;
    background-repeat: no-repeat;
    color: #ddd;
}
.login-form {
  background: rgba( 255, 255, 255, 0.25 );
    box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
    backdrop-filter: blur( 10.0px );
    -webkit-backdrop-filter: blur( 10.0px );
    border-radius: 10px;
    border: 1px solid rgba( 255, 255, 255, 0.18 );
    max-width: 50%;
    margin: 0px auto;
    padding: auto;
    margin-top: 5%;
    align-items: center;
    text-align: center;    
}
input {
    width: 80%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    border-radius: 5px;
}
input:focus{
    outline: none;
    border: 0;
    padding: 12px 20px;
    border: 1px solid transparent;
    border-bottom-color: #ccc;
    transition: 0.4s;
}
.button {
    background-color: rgba( 255, 255, 255, 0.25 );
    border-radius: 5px;
    box-shadow: 5px 5px #888888;
}
.button:hover {
  background-image: linear-gradient(to right top, #ffc75f,#d65db1);
  transform: scale(1, 1);
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;
}
.forgot{
    bottom: auto;
    padding: 12px 20px;
    margin: 8px 0;
    text-align: center;
}
.forgot a {
    color: ghostwhite;
    text-decoration: none;
}
.forgot:hover{
   cursor: pointer;
   color: ghostwhite;
}
</style>

@section('content')

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">
<body>
    <div class="box">
        <form class="login-form" action="{{ route('register') }}" method="post">
          @csrf
            <h1>Register</h1>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Passwor">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                            
            {{-- <input autocomplete="off" type="email" placeholder="Email" id="email" name="email"/>
            <input autocomplete="off" type="password" placeholder="Password" id="password" name="password"/> --}}
            <input type="submit" class="button" value="REGISTER" />
            <div class="forgot">
                <a href="#">Have an Account?</a>
                <a href="{{ route('login')}}">Login</a>
            </div>            
        </form>
    </div>
</body>
</html>

@endsection
