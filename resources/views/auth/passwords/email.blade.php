@extends('site.site')

@section('title', 'Reset Password')

@section('content')
<div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

    <div class="login-wrapper wd-500 wd-xs-550 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse">{!!$company!!}</div>
        <div class="tx-center mg-b-40 mg-t-10">Reset Password</div>

        <form method="POST" action="{{ route('password.email') }}" data-parsley-validate>
            @csrf

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <input type="hidden" name="action" value="submit"/>
            <div class="form-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


                <a class="tx-info tx-12 d-block mg-t-10" href="{{ route('login') }}">
                    Login
                </a>


            </div><!-- form-group -->

            <input type="submit" class="btn btn-info btn-block" value="Send Password Reset Link"/>
        </form>

        <div class="mg-t-60 tx-center">Not yet a member? <a href="" class="tx-info">Sign Up</a></div>
    </div><!-- login-wrapper -->
</div><!-- d-flex -->
@endsection
