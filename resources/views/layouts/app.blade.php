<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>@yield('title', 'E Store')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="eCommerce HTML Template Free Download" name="keywords">
    <meta content="eCommerce HTML Template Free Download" name="description">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <!-- CSS Libraries -->
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha512-znmTf4HNoF9U6mfB6KlhAShbRvbt4CvCaHoNV0gyssfToNQ/9A0eNdUbvsSwOIUoJdMjFG2ndSvr0Lo3ZpsTqQ==" crossorigin="anonymous" />
    @if (Route::is('home'))
      {{-- Slick --}}
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" />
    @endif
    {{-- Template Stylesheet --}}
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
  </head>

  <body>
    <!-- Top bar Start -->
    <div class="top-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <i class="fa fa-envelope"></i>
                    support@email.com
                </div>
                <div class="col-sm-6">
                    <i class="fa fa-phone-alt"></i>
                    +012-345-6789
                </div>
            </div>
        </div>
    </div>
    <!-- Top bar End -->

    <!-- Nav Bar Start -->
    <div class="nav">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
          <a href="#" class="navbar-brand">MENU</a>
          <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav mr-auto">
              <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
              <a href="product-list.html" class="nav-item nav-link">Products</a>
              <a href="product-detail.html" class="nav-item nav-link">Product Detail</a>
              <a href="cart.html" class="nav-item nav-link">Cart</a>
              <a href="checkout.html" class="nav-item nav-link">Checkout</a>
              {{-- <a href="{{ route('my-account.index') }}" class="nav-item nav-link">My Account</a> --}}
              <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">More Pages</a>
                <div class="dropdown-menu">
                  <a href="wishlist.html" class="dropdown-item">Wishlist</a>
                  @guest
                  {{-- <a href="{{ route('auth') }}" class="dropdown-item">Login & Register</a> --}}
                  @endguest
                  <a href="contact.html" class="dropdown-item">Contact Us</a>
                </div>
              </div>
            </div>
            <div class="navbar-nav ml-auto">
              <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">User Account</a>
                <div class="dropdown-menu">
                  @guest
                    <a href="{{ route('login') }}" class="dropdown-item">Login</a>
                    <a href="{{ route('register') }}" class="dropdown-item">Register</a>
                  @else
                    <link-logout csrf="{{ csrf_token() }}" />
                  @endguest
                </div>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <!-- Nav Bar End -->

    <!-- Bottom Bar Start -->
    <div class="bottom-bar">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-md-3">
            <div class="logo">
              <a href="{{ route('home') }}">
                <img src="{{ asset('imgs/logo.png') }}" alt="Logo">
              </a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="search">
              <input type="text" placeholder="Search">
              <button><i class="fa fa-search"></i></button>
            </div>
          </div>
          <div class="col-md-3">
            <div class="user">
              <a href="wishlist.html" class="btn wishlist">
                <i class="fa fa-heart"></i>
                <span>(0)</span>
              </a>
              <a href="cart.html" class="btn cart">
                <i class="fa fa-shopping-cart"></i>
                <span>(0)</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Bottom Bar End -->

      {{-- Start Mail Notification bar --}}
  {{-- @if (!is_null(auth()->user()))
      @if (!auth()->user()->hasVerifiedEmail())
          <div class="alert alert-warning" role="alert" style="margin-top: -15px;">
              Email not Verified <a id="email-sender" class="alert-link" href="{{ route('verification.send') }}">click here to resend</a>
          </div>
          <form id="email-form" action="{{ route('verification.send') }}" method="post" style="display: none;">
              @csrf
          </form>
      @endif
  @endif --}}
      {{-- End Mail Notification bar --}}
      {{-- Start Mail Notification Send succefull --}}
      {{-- @if (session('status') == 'verification-link-sent')
          <div class="alert alert-info mt-2 alert-dismissible fade show" role="alert">
              A new email verification link has been emailed to you!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
      @endif --}}
      {{-- End Mail Notification Send succefull --}}

    <!-- Breadcrumb Start -->
    @yield("breadcrumb")
    <!-- Breadcrumb End -->

    <!-- Content Body -->
    @yield("content")

    <!-- Footer Start -->
    <div class="footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="footer-widget">
              <h2>Get in Touch</h2>
              <div class="contact-info">
                <p><i class="fa fa-map-marker"></i>123 E Store, Los Angeles, USA</p>
                <p><i class="fa fa-envelope"></i>email@example.com</p>
                <p><i class="fa fa-phone"></i>+123-456-7890</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="footer-widget">
              <h2>Follow Us</h2>
              <div class="contact-info">
                <div class="social">
                  <a href=""><i class="fab fa-twitter"></i></a>
                  <a href=""><i class="fab fa-facebook-f"></i></a>
                  <a href=""><i class="fab fa-linkedin-in"></i></a>
                  <a href=""><i class="fab fa-instagram"></i></a>
                  <a href=""><i class="fab fa-youtube"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="footer-widget">
              <h2>Company Info</h2>
              <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms & Condition</a></li>
              </ul>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="footer-widget">
              <h2>Purchase Info</h2>
              <ul>
                <li><a href="#">Pyament Policy</a></li>
                <li><a href="#">Shipping Policy</a></li>
                <li><a href="#">Return Policy</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="row payment align-items-center">
          <div class="col-md-6">
            <div class="payment-method">
              <h2>We Accept:</h2>
              <img src="{{ asset('imgs/payment-method.png') }}" alt="Payment Method" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="payment-security">
              <h2>Secured By:</h2>
              <img src="{{ asset('imgs/godaddy.svg') }}" alt="Payment Security" />
              <img src="{{ asset('imgs/norton.svg') }}" alt="Payment Security" />
              <img src="{{ asset('imgs/ssl.svg') }}" alt="Payment Security" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer End -->

    <!-- Scripts -->
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js" integrity="sha512-0QbL0ph8Tc8g5bLhfVzSqxe9GERORsKhIn1IrpxDAgUsbBGz/V7iSav2zzW325XGd1OMLdL4UiqRJj702IeqnQ==" crossorigin="anonymous"></script>
    @if (Route::is('home'))
      {{-- Slick --}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>
      <script src="{{ asset('js/slick.js') }}"></script>
    @endif
    <script src="{{ asset('js/main.js') }}"></script>

    @stack("scripts")
  </body>
</html>