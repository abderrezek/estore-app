@extends("layouts.app")

@section('title', 'Login E Store')

@section("content")

  <!-- Breadcrumb Start -->
  <div class="breadcrumb-wrap">
    <div class="container-fluid">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Login</li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumb End -->

  <div class="login">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <div class="login-form">
            <form id="loginForm" action="{{ route('login') }}" method="post">
              @csrf
              @method('POST')

              <div class="row">
                {{-- Email / Mobile --}}
                <x-input name="name" placeholder="E-mail / Mobile">E-mail / Mobile</x-input>

                {{-- Password --}}
                <x-input type="password" name="password" placeholder="Password">Password</x-input>

                <div class="col-md-12">
                  <div class="row">
                    {{-- Remember me --}}
                    <div class="col-md-6">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="remember">Keep me signed in</label>
                      </div>
                    </div>

                    {{-- Forgot Password --}}
                    <div class="col-md-6">
                      <a href="{{ route('password.request') }}">Forgot pasword</a>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <button class="btn">Sign in</button> or <a href="{{ route('register') }}">Sign up</a>
                </div>

                <div class="col-md-12 mt-2">
                  <a class="btn" href="{{ route("socialite.redirect", ["provider" => "google"]) }}">
                    <strong>
                      <i class="fab fa-google"></i> Sign in with Google
                    </strong>
                  </a>
                  <a class="btn mx-1" href="{{ route("socialite.redirect", ["provider" => "facebook"]) }}">
                    <strong>
                      <i class="fab fa-facebook"></i> Sign in with Facebook
                    </strong>
                  </a>
                </div>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@push('scripts')
  <!-- jquery-validation -->
  <script src="{{ asset('plugins/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('plugins/jquery-validation/additional-methods.min.js') }}"></script>
  <script src="{{ asset('js/login.js') }}"></script>
@endpush