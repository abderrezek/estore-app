@extends("layouts.app")

@section('title', 'Reset Password')

@section("content")

  <div class="login">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <div class="login-form">
            <form id="resetPasswordForm" action="{{ route('password.update') }}" method="post">
              @csrf
              @method('POST')
              <input type="hidden" name="token" value="{{ request()->route('token') }}">

              <div class="row">
                {{-- Email --}}
                <x-input class="col-12" type="email" name="email" placeholder="E-mail" value="{{ request()->email }}">
                  E-mail
                </x-input>

                {{-- Password --}}
                <x-input class="col-12" type="password" name="password" placeholder="Password">
                  Password
                </x-input>

                {{-- Retype Password --}}
                <x-input class="col-12" type="password" name="password_confirmation" placeholder="Password Confirmation">
                  Retype Password
                </x-input>

                <div class="col-md-12">
                  <button class="btn">Reset Password</button>
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
  <script src="{{ asset('js/reset-password.js') }}"></script>
@endpush