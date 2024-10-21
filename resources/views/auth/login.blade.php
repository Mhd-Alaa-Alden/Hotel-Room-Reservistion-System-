<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/loginStyle.css') }}" />
    <title>Login | ANS-Hotels</title>
</head>
<div class="my-element">

    <body>
        <div class="container" id="container">
            <div class="form-container sign-up">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <h1>Create Account</h1>
                    <span>or use your email for registeration</span>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                        placeholder="Full Name">

                    @error('name')
                        <span class="invalid-feedback alertt alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email"
                        placeholder="Email Address ">

                    @error('email')
                        <span class="invalid-feedback alertt alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input class="form-control " type="number" name="phone" placeholder="Phone Number" />


                    <input id="password" type="password" class="form-control " placeholder="Enter your Password "
                        @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback alertt alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password" placeholder="Confirm your phone ">
                    <input class="form-control " type="file" name="filename" placeholder="Upload Your photo"
                        accept="image/*" />

                    <button type="submit">
                        {{ __('Register') }}
                    </button>
                </form>
            </div>
            <div class="form-container sign-in">
                <form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
                    @csrf
                    <h1>Sign In</h1>
                    <span>or use your email password</span>
                    <input type="email" placeholder="Email" name="email" />
                    <input type="password" placeholder="Password" name="password" />
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    <button>Sign In</button>
                </form>
            </div>
            <div class="toggle-container">
                <div class="toggle">
                    <div class="toggle-panel toggle-left">
                        <img src="{{ asset('img/favicon/logo_white.png') }}" alt="">
                        <h1>Welcome Back!</h1>
                        <p>Enter your personal details to use all of site features</p>
                        <button class="hidden" id="login">Sign In</button>
                    </div>
                    <div class="toggle-panel toggle-right">
                        <img src="{{ asset('img/favicon/logo_white.png') }}" alt="">
                        <h1>Hello, Friend!</h1>
                        <p>
                            Register with your personal details to use all of site features
                        </p>
                        <button class="hidden" id="register">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/loginScript.js') }}"></script>
    </body>
</div>

</html>
