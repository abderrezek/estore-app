@extends('layouts.app')

@section('title', 'Login E Store')

@section('content')

  <div class="login">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <div class="login-form">
            <form id="forgotPasswordForm" action="{{ route('password.email') }}" method="post">
              @csrf
              @method('POST')

              <div class="row">
                {{-- Email --}}
                <x-input class="col-md-12" type="email" name="email" placeholder="E-mail">E-mail</x-input>

                <div class="col-md-12">
                  <button class="btn">Send Email</button>
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
  <script src="{{ asset('js/forgot-password.js') }}"></script>
@endpush