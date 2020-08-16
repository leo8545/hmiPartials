@extends('partials.site')

@section('title', 'Login')

@section('content')
<div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

    <div class="login-wrapper wd-500 wd-xs-550 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse">HMI Admin</div>
        <div class="tx-center mg-b-40 mg-t-10">HMI Admin Portal</div>

        <form method="POST" action="{{ route('login') }}" data-parsley-validate>
            @csrf

            <input type="hidden" name="action" value="submit"/>
            <div class="form-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div><!-- form-group -->
            <div class="form-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">
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

        <div class="mg-t-60 tx-center">Not yet a member? <a href="" class="tx-info">Sign Up</a></div>
    </div><!-- login-wrapper -->
</div><!-- d-flex -->
@endsection
