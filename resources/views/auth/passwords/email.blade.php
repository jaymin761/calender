@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="login-box">
                <div class="login-logo">
                  <a href="#"><b>Reset Password</a>
                </div>
                <!-- /.login-logo -->
                <div class="login-box-body">

                   <form method="POST" action="{{ route('user.password.email') }}">
                    @csrf

                    <div class="form-group has-feedback">
                        <label for="">Email Address</label><input id="email" type="email" placeholder="Enter email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                      <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </div>
                    </div>
                  </form>

                </div>
                <!-- /.login-box-body -->
              </div>
        </div>
    </div>
</div>
@endsection
