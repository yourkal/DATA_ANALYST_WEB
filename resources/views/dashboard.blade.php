@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('images/LOGO_MUKTI.png') }}" type="image/x-icon">
    <title>Data Analists Material | PT.Mukti Mandiri Lestari 2</title>
    
    <!-- Font Awesome & Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        body {
            background-color: #f0f2f5;
            padding-top: 70px;
        }
        
        /* Styling untuk Navbar */
        .navbar {
            width: 100%;
        }

        /* Styling untuk heading */
        .heading h2 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Styling untuk Cards */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card h4 {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .card h3 {
            font-size: 2rem;
            font-weight: bold;
        }

        .card .btn {
            font-size: 0.9rem;
            font-weight: bold;
        }

        /* Styling untuk icon */
        .card i {
            font-size: 4rem;
            color: rgba(255, 255, 255, 0.7);
            position: absolute;
            top: -20px;
            right: -20px;
            opacity: 0.4;
        }

        /* Responsive Layout */
        @media (max-width: 768px) {
            .card h3 {
                font-size: 1.5rem;
            }

            .card h4 {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

    <!-- Main Content -->
    <div class="container-fluid">
        <div class="heading">
            <h2 class="my-4">
                <i class="fas fa-tachometer-alt"></i> Dashboard Data Analist PT. Mukti Mandiri Lestari 2
            </h2>
        </div>
    
        <!-- Row for Cards -->
        <div class="row">
            <!-- Card for Total Data Analist -->
            <div class="col-md-4">
                <div class="card bg-primary text-white mb-4 position-relative">
                    <i class="fas fa-database"></i> <!-- Ikon besar di background -->
                    <div class="card-body">
                        <h4>Total Data Analist</h4>
                        <h3>{{ $totalAnalists }}</h3>
                        <a href="{{ route('analists.index') }}" class="btn btn-light mt-3">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
