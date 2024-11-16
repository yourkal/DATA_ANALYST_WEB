<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>{{ config('app.name', 'Analist App') }}</title> --}}

    <title>Data Hasil Analists Material | PT. Mukti Mandiri Lestari </title>
    <link rel="icon" href="{{ asset('images/LOGO_MUKTI.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Custom CSS (optional) -->
    <style>
        body {
            padding-top: 70px;
        }

        /* Custom style for full-width navbar */
        .navbar {
            width: 100%;
        }
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/HederLogo.png') }}" alt="Logo"
                    style="height: 50px; width: auto; margin-right: 10px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    @auth
                        {{-- Tampilkan menu Dashboard hanya jika user bukan id 2 --}}
                        @if (Auth::id() !== 2)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('analists.dashboard') }}">
                                    Dashboard
                                </a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('analists.index') }}">Edit Data Analist</a>
                        </li>
                        {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('produksi.index') }}">
                            <i class="fas fa-box"></i> Produksi
                        </a>
                    </li> --}}
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link">Logout</button>
                            </form>
                        </li>
                    @endauth

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>


    <!-- Main Content -->
    <div class="container-fluid">
        @yield('content')
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
