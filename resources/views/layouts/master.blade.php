<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Кредо Рівне</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="/assets/clientside/favicon.ico"/>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/css/clientside/styles.css" rel="stylesheet"/>
    <link href="/css/clientside/product_view_styles.css" rel="stylesheet"/>
    <!-- Font Awesome-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
            crossorigin="anonymous"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="/">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">All Products</a></li>
                        <li>
                            <hr class="dropdown-divider"/>
                        </li>
                        <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                        <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                    </ul>
                </li>
            </ul>
            <!-- Auth-->
            @if (\Illuminate\Support\Facades\Auth::guest())
                <div class="justify-content-around">
                    <a class="btn btn-outline-dark" href="{{ url('/login') }}">Увійти</a>
                    <a class="btn btn-dark" href="{{ url('/register') }}">Зареєструватись</a>
                </div>
            @else
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">Налаштування</a></li>
                            <li><a class="dropdown-item" href="#!">Активність</a></li>
                            @if(\Illuminate\Support\Facades\Auth::user()->role == \App\Constants\Constants::$Admin)
                                <li><a class="dropdown-item" href="{{route('admin')}}">Адмін панель</a></li>
                            @endif
                            <li>
                                <hr class="dropdown-divider"/>
                            </li>
                            <li><a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Вийти</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </li>
                </ul>
        @endif
        <!--Cart-->
            <form class="d-flex">
                <a class="btn btn-outline-dark" style="margin-left: 10px" href="/cart">
                    <i class="bi-cart-fill"></i>
                    {{--<span class="badge bg-dark text-white ms-1 rounded-pill">{{ 0 }}</span>--}}
                </a>
            </form>
        </div>
    </div>
</nav>

@if(session()->has('success'))
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="success-toast" class="toast hide align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body">
                {{session()->get('success')}}
            </div>
        </div>
    </div>
@endif
@if(session()->has('warning'))
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
            <div id="success-toast" class="toast hide align-items-center text-dark bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-body">
                    {{ session()->get('warning') }}
                </div>
            </div>
        </div>
@endif

<!------------------------------------>
@yield('content')
<!------------------------------------>

<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="/js/clientside/scripts.js"></script>
<script src="/js/clientside/toasts.js"></script>
</body>
</html>
