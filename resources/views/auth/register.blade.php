@extends('layouts.appAuth')

@section('title')
  Register
@endsection

@section('content')
<section class="material-half-bg">
      <div class="cover"></div>
</section>
<div class="col-md-4" style="margin: 8% 33.8%">
  <div class="tile">
    <div class="tile-body">
    <form class="login-form" method="POST" action="{{ route('register') }}">
      @csrf

      <br/>
      <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user" style="margin-left: 30%"></i>SIGN UP</h3><hr/>
      <div class="row mb-4">
        <div class="col-md-6">
          <label>First Name</label>
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
          </div>

          <div class="col-md-6">
          <label>Last Name</label>
          <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ old('surname') }}" required autofocus>

          @if ($errors->has('surname'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('surname') }}</strong>
              </span>
          @endif
        </div>
      </div>
      <div class="form-group">
        <label class="control-label">Email</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group">
        <label class="control-label">Password</label>
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group">
        <label class="control-label">Confirm password</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
      </div>
      <div class="form-group btn-container">
        <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endsection
