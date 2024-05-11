{{-- @extends('layouts.app1')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                                }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="pin" class="col-md-4 col-form-label text-md-end">{{ __('PIN') }}</label>

                            <div class="col-md-6">
                                <input id="pin" type="text" class="form-control @error('pin') is-invalid @enderror"
                                    name="pin" value="{{ old('pin') }}" required autocomplete="pin" maxlength="6">

                                @error('pin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password')
                                }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm
                                Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="assets/css/styles.css">
    
        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <title>Sign Up</title>
    </head>
    <body> 
        <div class="login">
            <div class="login__content">
                <div class="login__img">
                    <img src="assets/img/img-login.svg" alt="">
                </div>

                <div class="login__forms">
                

                    <form method="POST" action="{{ route('register') }}" class="login__create none" id="login-up">
                        @csrf
                        <h1 class="login__title">Create Account</h1>
    
                        <div class="login__box">
                            <i class='bx bx-user login__icon'></i>
                            <input type="text" placeholder="Name" name="name" class="login__input form-control @error('name') is-invalid @enderror">

                        </div>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <p style="color:red">{{ $message }}</p>
                            </span>
                            @enderror
    
                        <div class="login__box">
                            <i class='bx bx-at login__icon'></i>
                            <input type="text" placeholder="Email" name="email" class="login__input form-control @error('email') is-invalid @enderror">
                        </div> 
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <p style="color:red">{{ $message }}</p>
                        </span>
                        @enderror

                        <div class="login__box">
                            <i class='bx bx-phone login__icon'></i>
                            <input type="text" placeholder="Phone" name="phone" class="login__input form-control @error('phone') is-invalid @enderror">
                        </div>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <p style="color:red">{{ $message }}</p>
                        </span>
                        @enderror

                        <div class="login__box">
                            <i class='bx bx-lock-alt login__icon'></i>
                            <input type="password" placeholder="Password" name="password" class="login__input form-control @error('password') is-invalid @enderror">
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <p style="color:red">{{ $message }}</p>
                        </span>
                        @enderror

                        <div class="login__box">
                            <i class='bx bx-lock-alt login__icon'></i>
                            <input type="password" placeholder="Confirme Password" name="password_confirmation" class="login__input">
                        </div>
                        
                        <div class="login__box">
                            <i class='bx bx-lock-alt login__icon'></i>
                            <input type="text" placeholder="PIN" name="pin" class="login__input form-control @error('pin') is-invalid @enderror">
                        </div>
                        @error('pin')
                        <span class="invalid-feedback" role="alert">
                            <p style="color:red">{{ $message }}</p>
                        </span>
                        @enderror

                        <button type="submit" class="login__button">Sign Up</button>

                        <div>
                            <span class="login__account">Already have an Account ?</span>
                            <a href="/login" class="login__signup" id="sign-in">Sign In</a>
                        </div>


                    </form>
                </div>
            </div>
        </div>

        <!--===== MAIN JS =====-->
        <script src="assets/js/main.js"></script>
    </body>
</html>