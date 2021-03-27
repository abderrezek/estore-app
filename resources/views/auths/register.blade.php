@extends("layouts.app")

@section('title', 'Register E Store')

@section("content")

  <!-- Breadcrumb Start -->
  <div class="breadcrumb-wrap">
    <div class="container-fluid">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Register</li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumb End -->

  <div class="login">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <div class="login-form">
            <form id="registerForm" action="{{ route('register') }}" method="post">
              @csrf
              @method('POST')

              <div class="row">
                {{-- First name --}}
                <x-input name="first_name" placeholder="First Name">First Name</x-input>

                {{-- last name --}}
                <x-input name="last_name" placeholder="Last Name">Last Name</x-input>

                {{-- E-mail --}}
                <x-input type="email" name="email" placeholder="E-mail">E-mail</x-input>

                {{-- Mobile --}}
                <x-input type="text" name="mobile" placeholder="Mobile No">Mobile No</x-input>

                {{-- Password --}}
                <x-input type="password" name="password" placeholder="Password">Password</x-input>

                {{-- Retype Password --}}
                <x-input type="password" name="password_confirmation" placeholder="Password">Retype Password</x-input>

                <div class="col-md-12">
                  <button class="btn">Sign up</button> or <a href="{{ route('login') }}">Sign in</a>
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
  <script src="{{ asset('js/register.js') }}"></script>
@endpush