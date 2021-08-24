<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="/">Кредо</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li><a @routeactive('home') aria-current="page" href="{{route('home')}}">Головна</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">Товари</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('all.products')}}">Всі Товари</a></li>
                        <li>
                            <hr class="dropdown-divider"/>
                        </li>
                        <li><a class="dropdown-item" href="#!!@@!#!@#!@#@!#!@#">Популярні</a></li>
                        <li><a class="dropdown-item" href="##!!@@!#!@#!@#@!#!@#">Нові</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="#!!@@!#!@#!@#@!#!@#">Про Нас</a></li>
            </ul>
            <!-- Auth-->
            @if (\Illuminate\Support\Facades\Auth::guest())
                <div class="justify-content-around mx-2">
                    <a class="btn btn-outline-dark" href="{{ route('login') }}">Увійти</a>
                    <a class="btn btn-dark" href="{{ route('register') }}">Зареєструватись</a>
                </div>
            @else
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">Налаштування</a></li>
                            <li><a class="dropdown-item" href="{{route('account.notifications')}}">Сповіщення</a></li>
                            @if(\Illuminate\Support\Facades\Auth::user()->role == \App\Constants\Constants::$Admin)
                                <li><a class="dropdown-item" href="{{route('admin')}}">Адмін панель</a></li>
                            @endif
                            <li>
                                <hr class="dropdown-divider"/>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Вийти</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </li>
                </ul>
                <!--Notifications-->
                <a class="btn btn-outline-dark p-2 me-2" href="{{route('account.notifications') }}">
                    <i class="far fa-bell"></i>
                </a>
                <!--Orders-->
                <a class="btn btn-outline-dark p-2 me-2" href="{{route('orders') }}">
                    <i class="far fa-list-alt"></i>
                </a>
        @endif
            <!--Cart-->
            <a class="btn btn-outline-dark p-2" href="{{route('cart') }}">
                <i class="bi-cart-fill"></i>
            </a>
        </div>
    </div>
</nav>
