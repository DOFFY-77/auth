
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="assets/css/styles.css">
        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <title>Reset password</title>
    </head>
    <body> 
        <div class="login">
            <div class="login__content">
                <div class="login__img">
                    <img src="assets/img/img-login.svg" alt="">
                </div>

                <div class="login__forms">
                    <form action="{{ route('password.email') }}" method="POST" class="login__registre" >
                        @csrf
                        <h1 class="login__title">Reset your password via Email</h1>
    
                        <div class="login__box">
                            <i class='bx bx-user login__icon'></i>
                            <input type="text" placeholder="Email" name="email" class="login__input form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <p style="color: red">{{ $message }}</p>
                        </span>
                    @enderror
                            
    
                        <button type="submit" class="login__button"> {{ __('Send Password Reset Link') }}</button>

      
                    </form>

                </div>
            </div>
        </div>

        <!--===== MAIN JS =====-->
        <script src="assets/js/main.js"></script>
    </body>
</html>
