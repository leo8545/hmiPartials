<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HMI::Login</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/css/bootstrap.css">
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center bg-br-primary h-100">
        <div class="row align-self-center">
            <div class="col">
                <div class="login-wrapper wd-500 wd-xs-550 pd-25 pd-xs-40 bg-white rounded shadow-base">
                    <h3 class="text-center mb-10">Login</h3>
                    <form method="POST" action="{{ route('login') }}" data-parsley-validate>
                        @csrf
                        <input type="hidden" name="action" value="submit"/>
                        <div class="form-group">
                            <input id="email" type="email" class="form-control-lg input-lg w-200 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email" style="width:300px;">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><!-- form-group -->
                        <div class="form-group">
                            <input id="password" type="password" class="form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password" style="width:300px;">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @if (Route::has('password.request'))
                                <a class="tx-info tx-12 d-block mg-t-10" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div><!-- form-group -->
                        <input type="submit" class="btn btn-info btn-block" value="Sign In"/>
                    </form>
                </div><!-- login-wrapper -->
            </div> <!-- col -->
        </div> <!-- row -->
    </div>
</body>
</html>

