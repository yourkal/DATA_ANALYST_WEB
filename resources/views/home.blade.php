<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="icon" href="{{ asset('images/LOGO_MUKTI.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        .hero {
            background: url('{{ asset('images/GAMBAR_MUKTI.jpeg') }}') no-repeat center;
            background-size: cover;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .content {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 40px;
            border-radius: 10px;
            max-width: 90%;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .content h1 {
            font-size: 48px;
            margin-bottom: 10px;
            font-weight: bold;
            color: #ffffff;
        }

        .content p {
            font-size: 20px;
            margin: 0 0 20px;
            color: #ffffff;
            max-width: 600px;
        }

        .cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin-top: 20px;
        }

        .card-link {
            text-decoration: none;
            color: inherit;
        }

        .card {
            width: 220px;
            height: 220px;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            background-color: #eae0e0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .card i {
            margin-bottom: 15px;
            font-size: 3rem;
            color: #0056b3;
        }

        .card h3 {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card button {
            margin-top: auto;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background-color: #0056b3;
            color: white;
            cursor: pointer;
        }

        .btn-lainnya {
            position: absolute;
            bottom: 10px;
            right: 10px;
            padding: 8px 12px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            background-color: #28a745;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-lainnya:hover {
            background-color: #218838;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {
            .content h1 {
                font-size: 36px;
            }

            .content p {
                font-size: 18px;
            }

            .card {
                width: 180px;
            }
        }

        @media (max-width: 480px) {
            .content {
                padding: 20px;
            }

            .content h1 {
                font-size: 28px;
            }

            .content p {
                font-size: 16px;
            }

            .card {
                width: 150px;
            }

            .btn-lainnya {
                font-size: 12px;
                padding: 6px 10px;
            }
        }

        /* Media Query for Landscape Orientation */
        @media screen and (orientation: landscape) {
            .content {
                padding: 40px; /* Tambahkan padding lebih banyak untuk tampilan lanskap */
            }

            .content h1 {
                font-size: 48px; /* Ukuran font tetap besar */
            }

            .content p {
                font-size: 20px; /* Ukuran font tetap besar */
            }

            .cards {
                flex-direction: row; /* Mengatur kartu dalam satu baris */
                justify-content: center; /* Pusatkan kartu */
                gap: 30px; /* Tambahkan jarak antar kartu */
            }

            .card {
                width: 250px; /* Ukuran kartu sedikit lebih besar */
                height: 250px; /* Ukuran tinggi kartu sedikit lebih besar */
            }

            .btn-lainnya {
                font-size: 16px; /* Ukuran font tombol lebih besar */
                padding: 10px 15px; /* Padding tombol lebih besar */
            }
        }
    </style>
</head>

<body>
    <!-- Hero Section -->
    <div class="hero">
        <div class="content">
            <h1>Selamat Datang</h1>
            <p>Silakan pilih salah satu menu di bawah sesuai dengan role anda</p>
            <div class="cards">
                <!-- Card -->
                <a href="{{ route('analists.dashboard') }}" class="card-link">
                    <div class="card">
                        <i class="fa-solid fa-chart-bar"></i>
                        <h3>Hasil</h3>
                        <button onclick="location.href='{{ route('login') }}'">Masuk</button>
                    </div>
                </a>
            </div>
            <!-- Button to redirect to home2 -->
            {{-- <button onclick="location.href='{{ route('home2') }}'" class="btn-lainnya"> ke Home2</button> --}}
        </div>
    </div>
</body>

</html>