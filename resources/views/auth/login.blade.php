@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="login-box">
                <div class="login-logo">
                  <a href="#"><b>User</b>Login</a>
                </div>
                <!-- /.login-logo -->
                <div class="login-box-body">
                  <p class="login-box-msg">Sign in to start your session</p>

                   <form method="POST" action="{{ route('user.login') }}">
                    @csrf

                    <div class="form-group has-feedback">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group has-feedback">

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                      <div class="col-xs-8">
                        <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    &nbsp&nbsp&nbsp&nbsp&nbsp<label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                      </div>
                      <br>
                      <br>
                      <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                      </div>
                    </div>
                  </form>
                  @if (Route::has('user.register'))
                            <a class="nav-link" href="{{ route('user.register') }}">{{ __('Register') }}</a>
                    @endif
                  @if (Route::has('user.password.request'))
                        <a class="btn btn-link" href="{{ route('user.password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                 <br>

                </div>
                <!-- /.login-box-body -->
              </div>
        </div>
    </div>
</div>
@endsection
