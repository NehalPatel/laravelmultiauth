@extends('layouts.admin.default')

@section('content')
<div class="kt-login__signin">
    <div class="kt-login__head">
        <h3 class="kt-login__title">Sign In To Admin</h3>
    </div>
    <form class="kt-form" method="POST" action="{{ route('admin.login') }}">
        @csrf
        <div class="input-group">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="input-group">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="row kt-login__extra">
            <div class="col">
                <label class="kt-checkbox">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
                    <span></span>
                </label>
            </div>
            @if (Route::has('password.request'))
            <div class="col kt-align-right">
                <a href="javascript:;" id="kt_login_forgot" class="kt-login__link">Forget Password ?</a>
            </div>
            @endif
        </div>
        <div class="kt-login__actions">
            <button id="kt_login_signin_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">Sign In</button>
        </div>
    </form>
</div>
<div class="kt-login__signup">
    <div class="kt-login__head">
        <h3 class="kt-login__title">Sign Up</h3>
        <div class="kt-login__desc">Enter your details to create your account:</div>
    </div>
    <form class="kt-form" action="">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Fullname" name="fullname">
        </div>
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off">
        </div>
        <div class="input-group">
            <input class="form-control" type="password" placeholder="Password" name="password">
        </div>
        <div class="input-group">
            <input class="form-control" type="password" placeholder="Confirm Password" name="rpassword">
        </div>
        <div class="row kt-login__extra">
            <div class="col kt-align-left">
                <label class="kt-checkbox">
                    <input type="checkbox" name="agree">I Agree the <a href="#" class="kt-link kt-login__link kt-font-bold">terms and conditions</a>.
                    <span></span>
                </label>
                <span class="form-text text-muted"></span>
            </div>
        </div>
        <div class="kt-login__actions">
            <button id="kt_login_signup_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">Sign Up</button>&nbsp;&nbsp;
            <button id="kt_login_signup_cancel" class="btn btn-light btn-elevate kt-login__btn-secondary">Cancel</button>
        </div>
    </form>
</div>
<div class="kt-login__forgot">
    <div class="kt-login__head">
        <h3 class="kt-login__title">Forgotten Password ?</h3>
        <div class="kt-login__desc">Enter your email to reset your password:</div>
    </div>
    <form class="kt-form" action="">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Email" name="email" id="kt_email" autocomplete="off">
        </div>
        <div class="kt-login__actions">
            <button id="kt_login_forgot_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">Request</button>&nbsp;&nbsp;
            <button id="kt_login_forgot_cancel" class="btn btn-light btn-elevate kt-login__btn-secondary">Cancel</button>
        </div>
    </form>
</div>
<div class="kt-login__account">
    <span class="kt-login__account-msg">
        Don't have an account yet ?
    </span>
    &nbsp;&nbsp;
    <a href="javascript:;" id="kt_login_signup" class="kt-login__account-link">Sign Up!</a>
</div>
@endsection