<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Place your kit's code here -->
    <script src="https://kit.fontawesome.com/182b5a1fc6.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
</head>
<body>

<div class="wrapper">

    <!-- Sidebar -->
    <nav id="sidebar" class="bg-secondary flex-column">
        <h2 class="text-center text-white py-4">Acoustique</h2>
        <nav class="nav flex-column">
            <a class="nav-item nav-link" href={{ route('admin.home') }}>Dashboard</a>
            <a class="nav-item nav-link" href='/admin/products'>Products</a>
        </nav>
    </nav>

    <!-- Page Content -->
    <section id="content">
        <nav class="navbar navbar-light bg-white shadow-sm py-3">
            <div class="container d-flex align-items-center">
                <div class="d-flex align-items-center ml-auto">
                    <img src="https://www.w3schools.com/bootstrap4/img_avatar1.png" alt="John Doe" class="mx-3 rounded-circle" style="width:40px;">
                    <strong class="mr-4">
                        {{ Auth::user()->name }}
                    </strong>
                    <a class="btn btn-outline-primary" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </nav>
        <div class="container pt-5">
            @yield('content')
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
