<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>TotesLab @yield('title')</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="{{asset('assets/fonts/simple-line-icons.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/smoothproducts.css')}}">
    @yield('head')
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="{{route('home')}}">TotesLab</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('register')}}">Register</a></li>
                    @endguest

                    @auth
                    
                        @if(Auth::user()->role == 'member')
                            <li class="nav-item"><a class="nav-link" href="{{route('cart/page/1')}}">Shopping Cart</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('transaction')}}">Transaction History</a></li>
                        @endif

                        @if(Auth::user()->role == 'admin')
                            <li class="nav-item"><a class="nav-link" href="{{route('product/create')}}">Add Product</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('cart/page/1')}}">View Transactions</a></li>
                        @endif

                        <li class="nav-item">
                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                                <button class="nav-link btn btn-link">Logout</button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    
    @yield('content')

    <footer class="page-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="{{route('register')}}">Sign up</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                        <li><a href="#">Forums</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2020 TotesLab</p>
        </div>
    </footer>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="{{asset('assets/js/smoothproducts.min.js')}}"></script>
    <script src="{{asset('assets/js/theme.js')}}"></script>
    @yield('body')
</body>

</html>