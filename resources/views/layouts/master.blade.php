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
    @yield('includes')
</head>
<body>

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

<!------------------------------------>
@yield('footer')
<!------------------------------------>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="/js/clientside/scripts.js"></script>
<script src="/js/clientside/toasts.js"></script>
@yield('scripts')
</body>
</html>
