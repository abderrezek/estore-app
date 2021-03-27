@extends("layouts.app")

@section('title', 'Add Password')

@section("content")

  <div class="login">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 mx-auto">
          <div class="login-form">
            <form id="newPasswordForm" action="{{ route('new-password', ['provider' => request()->provider]) }}" method="post">
              @csrf
              @method('POST')

              <div class="row">
                {{-- Password --}}
                <x-input type="password" name="password" placeholder="Password">Password</x-input>

                {{-- Retype Password --}}
                <x-input type="password" name="password_confirmation" placeholder="Password">Retype Password</x-input>

                <div class="col-md-12">
                  <button class="btn">Add Password</button>
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
  <script src="{{ asset('js/new-password.js') }}"></script>
@endpush