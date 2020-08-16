@extends('site.site')

@section('title', 'Reset Password')

@section('content')

    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

        <div class="login-wrapper wd-500 wd-xs-550 pd-25 pd-xs-40 bg-white rounded shadow-base">
            <div class="signin-logo tx-center tx-28 tx-bold tx-inverse">{!!$company!!}</div>
            <div class="tx-center mg-b-40 mg-t-10">Reset Password</div>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <input type="hidden" name="action" value="submit"/>
                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Email address">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div><!-- form-group -->

                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="New password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div><!-- form-group -->

                <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">

                </div><!-- form-group -->

                <input type="submit" class="btn btn-info btn-block" value="Reset Password"/>
            </form>

        </div><!-- login-wrapper -->
    </div><!-- d-flex -->

@endsection
