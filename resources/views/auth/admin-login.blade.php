@extends('layouts.appAuth')

@section('title')
  ADMIN Login
@endsection

@section('content')
<section class="material-half-bg">
  <div class="cover"></div>
</section>
<section class="login-content">
  <div class="login-box">
    <form class="login-form" method="POST" action="{{ route('admin.login.submit') }}">
      @csrf
      <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>ADMIN SIGN IN</h3>
      <div class="form-group">
        <label class="control-label">EMAIL</label>
        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus >
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group">
        <label class="control-label">PASSWORD</label>
        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" placeholder="Password" name="password" required>
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group btn-container">
        <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
      </div>
    </form>
  </div>
</section>
@endsection
