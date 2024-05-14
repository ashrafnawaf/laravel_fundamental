<!DOCTYPE html>
<html lang="en" class="h-100" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">
</head>

<body class="container-fluid d-flex flex-column h-100">
    <header class="px-5">
        <nav class="navbar navbar-expand-lg navbar-info bg-info px-5 rounded-bottom">
            <a class="navbar-brand fw-bold" href="">Toko Amandemy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-2">
                    @auth
                        @if (Auth::user()->hasRole('superadmin'))
                            <li class="nav-item">
                                <a class="btn btn-dark" href="{{ route('list-product', ['user_id' => Auth::id()]) }}">Manage Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-dark" href="{{ route('list-users') }}">Manage Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-danger" href="{{ route('logout') }}">Logout</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="btn btn-dark" href="{{ route('list-product', ['user_id' => Auth::id()]) }}">Manage Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-danger" href="{{ route('logout') }}">Logout</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="btn btn-dark" href="{{ route('register') }}">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-dark" href="{{ route('login') }}">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>
    </header>

    <main class="flex-shrink-0">
        @yield('content')
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    @stack('scripts')
</body>

</html>
