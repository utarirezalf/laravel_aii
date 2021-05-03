@extends('layouts.app')
<style>
    html {
    box-sizing: border-box;
    font-size: 62.5%;
  }
  html *,
  html *:before,
  html *:after {
    box-sizing: inherit;
  }
  
  body {
    background-color: #3e818e;
  }
  
  .container {
    display: grid;
    place-items: center;
    height: 100vh;
  }
  
  .box {
    position: relative;
    display: flex;
    align-items: center;
    width: 90%;
    max-width: 600px;
    padding: 220px 20px 20px;
    overflow: hidden;
    background-color: white;
    border-radius: 5px;
    box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.3);
  }
  @media (min-width: 768px) {
    .box {
      min-height: 400px;
      padding: 0;
    }
    .box__toggle:checked + .box__image {
      left: 300px;
    }
  }
  @media (max-width: 767px) {
    .box__toggle:checked ~ .form--register {
      width: 100%;
      height: auto;
      opacity: 1;
    }
    .box__toggle:checked ~ .form--login {
      width: 0;
      height: 0;
      opacity: 0;
    }
  }
  .box__image {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1;
    width: 100%;
    height: 200px;
    object-fit: cover;
    object-position: 0 bottom;
    transition: 0.4s ease-in-out;
  }
  @media (min-width: 768px) {
    .box__image {
      width: 300px;
      height: 100%;
      object-position: center;
    }
  }
  
  .form {
    width: 100%;
    overflow: hidden;
    text-align: left;
    transition: 0.3s;
  }
  @media (min-width: 768px) {
    .form {
      width: 300px;
      padding: 0 20px;
    }
  }
  .form__title {
    margin-bottom: 20px;
    font-family: "Montserrat", sans-serif;
    font-size: 1.8rem;
    font-weight: 700;
  }
  .form--login {
    opacity: 1;
    transition: opacity 0.5s ease;
  }
  .form--register {
    width: 0;
    height: 0;
    opacity: 0;
    transition: opacity 0.5s ease;
  }
  @media (min-width: 768px) {
    .form--register {
      width: 300px;
      height: auto;
      opacity: 1;
    }
  }
  .form__helper {
    position: relative;
    margin-bottom: 15px;
  }
  .form__helper:last-of-type {
    margin-bottom: 0;
  }
  .form__label {
    position: absolute;
    bottom: 10px;
    left: 0;
    color: black;
    font-family: "Lato", sans-serif;
    font-size: 1.4rem;
    transition: 0.3s;
  }
  .form__input {
    position: relative;
    width: 100%;
    padding: 5px 0;
    color: black;
    background-color: transparent;
    border-width: 0;
    border-bottom: 1px solid black;
    outline: none;
    font-family: "Lato", sans-serif;
    font-size: 1.4rem;
  }
  .form__input::placeholder {
    opacity: 0;
  }
  .form__input:not(:placeholder-shown) + .form__label {
    bottom: 25px;
    color: #2E8E79;
    font-size: 1.2rem;
  }
  .form__input:focus {
    border-bottom-color: #2E8E79;
  }
  .form__input:focus + .form__label {
    bottom: 25px;
    color: #2E8E79;
    font-size: 1.2rem;
  }
  .form__button {
    display: block;
    width: 100%;
    margin-top: 20px;
    padding: 10px;
    color: white;
    background-color: #2E8E79;
    border: 0;
    cursor: pointer;
    font-family: "Lato", sans-serif;
    font-size: 1.2rem;
    font-weight: 300;
    letter-spacing: 1px;
    text-transform: uppercase;
  }
  .form__text {
    margin-top: 10px;
    font-family: "Lato", sans-serif;
    font-size: 1.4rem;
  }
  .form__link {
    color: #2E8E79;
    cursor: pointer;
  }
</style>

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div> --}}

<!DOCTYPE html>
<html lang="en" >
    <head>
    <meta charset="UTF-8">
    <title>CodePen - Responsive login and sign up box with slide and label effect</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="./style.css">

    </head>
    <body>
    <!-- partial:index.partial.html -->
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Montserrat:wght@600&display=swap" rel="stylesheet">

    <body>
        <div class="container">
            <div class="box">
                <input type="checkbox" id="toggle" class="box__toggle" hidden>
                <img src="{{asset('assets/img/header-bg.jpg')}}" alt="Picture by Autumn Studio" class="box__image">
                
                <form class="form form--register" method="POST" action="{{ route('register') }}">
                    @csrf
                    <h1 class="form__title">Sign up</h1>

                    <div class="form__helper">
                        <input type="text" name="name" id="name" placeholder="Nama" class="form__input" />
                        <label class="form__label" for="name">Nama</label>
                    </div>

                    <div class="form__helper">
                        <input type="email" name="email" id="email" placeholder="Email" class="form__input" />
                        <label class="form__label" for="email">Email</label>
                    </div>

                    <div class="form__helper">
                        <input type="password" name="password" id="new-user-password" placeholder="Password" class="form__input" />
                        <label class="form__label" for="new-user-password">Password</label>
                    </div>

                    <div class="form__helper">
                        <input type="password" name="password" id="confirm-password" Placeholder="Confirm password" class="form__input" />
                        <label class="form__label" for="confirm-password">Confirm password</label>
                    </div>

                    <button type="submit" class="form__button">Register</button>

                    <p class="form__text">Already have an account? <label for="toggle" class="form__link">Sign in!</label>
                </form>

                <form class="form form--login" method="POST" action="{{ route('login') }}" >
                    @csrf
                    <h1 class="form__title">Sign in</h1>

                    <div class="form__helper">
                        <input type="email" name="email" id="email" placeholder="Email" class="form__input" />
                        <label class="form__label" for="email">Email</label>
                    </div>

                    <div class="form__helper">
                        <input type="password" name="password" id="password" placeholder="Password" class="form__input" />
                        <label class="form__label" for="password">Password</label>
                    </div>

                    <button type="submit" class="form__button">Login</button>

                    <p class="form__text">Don't have an account? <label for="toggle" class="form__link">Sign up!</label>
                </form>
            </div>
        </div>
    </body>
    <!-- partial -->
    
    </body>
</html>


@endsection
