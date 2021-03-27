<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'eShop')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  {{-- add styles --}}
  @stack('styles')
  <!-- AdminLte style -->
  <link rel="stylesheet" href="{{ asset('css/admin/adminlte.min.css') }}">
</head>
<body class="hold-transition @yield('class', 'sidebar-mini layout-fixed')">

  @auth
    <div class="wrapper">
      {{-- Navbar --}}
      @include('layouts.admin.navbar')

      {{-- Sidebar --}}
      @include('layouts.admin.sidebar')

      {{-- Content Auth --}}
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">

              @yield('breadcrumb')

            </div>
          </div>
        </div>

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">

            @yield('content')

          </div>
        </section>
      </div>

      {{-- Footer --}}
      @include('layouts.admin.footer')
    </div>
  @else
    {{-- Content Not Auth --}}
    @yield('content')
  @endauth

  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  {{-- add scripts --}}
  @stack('scripts')
  <!-- AdminLte script -->
  <script src="{{ asset('js/admin/adminlte.min.js') }}"></script>
</body>
</html>