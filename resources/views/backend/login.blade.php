@extends('layouts.master')

@section('page_title') Login @endsection

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="">Login</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

        @if(Session::has('message'))
        <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('message') }}</div>
        @endif
      <form action="{{ route('backend.login.process') }}" method="post">
        @csrf

        @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" value="admin@admin.com">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" value="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12 mb-2">
            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!--<p class="mt-3">
        <a href="">I forgot my password</a>
      </p>-->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
@endsection
