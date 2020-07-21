@extends('layouts.admin.auth')

@section('content')
<div class="kt-grid kt-grid--ver kt-grid--root">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url({{ config('panel.paths.assets') }}/media/bg/bg-3.jpg);">
            <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                <div class="kt-login__container">
                    <div class="kt-login__logo">
                        <a href="#">
                            <img src="{{ config('panel.paths.assets') }}/media/logos/logo-5.png">
                        </a>
                    </div>
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
                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember me') }}
                                        <span></span>
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                <div class="col kt-align-right">
                                    <a href="{{ route('admin.password.request') }}" id="kt_login_forgot" class="kt-login__link">{{ __('Forget Password ?') }}</a>
                                </div>
                                @endif
                            </div>
                            <div class="kt-login__actions">
                                <button id="kt_login_signin_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">{{ __('Sign In') }}</button>
                            </div>
                        </form>
                    </div>
                    <div class="kt-login__account">
                        <span class="kt-login__account-msg">
                            {{ __('Don\'t have an account yet ?') }}
                        </span>

                        @if (Route::has('admin.register'))
                            &nbsp;&nbsp;
                            <a href="{{ route('admin.register') }}" id="kt_login_signup" class="kt-login__account-link">{{ __('Sign Up!') }}</a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
