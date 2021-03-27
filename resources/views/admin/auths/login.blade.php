@extends('layouts.admin.index')

{{-- Title --}}
@section('title', 'Log in | eShop')

{{-- Styles --}}
@push('styles')
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" data-turbolinks-track="true">
@endpush

@section('class', 'login-page')

@section('content')

  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="{{ route('admin.dashboard') }}" class="h1"><b>eShop</b></a>
      </div>

      <div class="card-body">
        <p class="login-box-msg">Sign in to eShop Panel</p>

        <form id="loginForm" action="{{ route('login') }}" method="post">
          @csrf
          @method('post')

          {{-- Email --}}
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            {{-- Error Email --}}
            @error('email')
              <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          {{-- Password --}}
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            {{-- Error Password --}}
            @error('password')
              <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          {{-- Remember Me --}}
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>

            {{-- Submit --}}
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
          </div>
        </form>

        <p class="mb-1">
          <a href="{{ route('password.request') }}">I forgot my password</a>
        </p>
      </div>
    </div>
  </div>

@endsection

@push('scripts')
  <!-- jquery-validation -->
  <script src="{{ asset('plugins/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('plugins/jquery-validation/additional-methods.min.js') }}"></script>
  <script src="{{ mix('js/admin/auths/login.js') }}"></script>
@endpush
