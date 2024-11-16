<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
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
            background-size: cover; /* Changed to cover for better scaling */
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .content {
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
            padding: 40px; /* Padding for the content box */
            border-radius: 10px; /* Rounded corners */
            max-width: 90%; /* Limit width for smaller screens */
            margin: 0 auto; /* Center the content */
        }
        .content h1 {
            font-size: 48px;
            margin-bottom: 10px;
            font-weight: bold;
            color: #ffffff;
        }
        .content p {
            font-size: 20px;
            margin: 0;
            color: #ffffff;
            max-width: 600px; /* Limiting width for better readability */
        }
        .cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin-top: 20px; /* Increased margin for better spacing */
        }
        .card-link {
            text-decoration: none;
            color: inherit;
        }
        .card {
            width: 220px; /* Increased width for better card layout */
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            background-color: #eae0e0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }
        .card i {
            margin-bottom: 15px;
        }
        .icon-blue {
            color: #0056b3;
        }
        .card h3 {
            font-size: 20px; /* Increased font size for titles */
            font-weight: bold;
            margin-bottom: 10px;
        }
        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {
            .content h1 {
                font-size: 36px; /* Smaller font size for smaller screens */
            }
            .content p {
                font-size: 18px; /* Smaller font size for smaller screens */
            }
            .card {
                width: 180px; /* Smaller card width for smaller screens */
            }
        }
        
        @media (max-width: 480px) {
            .content {
                padding: 20px; /* Reduce padding for smaller screens */
            }
            .content h1 {
                font-size: 28px; /* Even smaller font size for very small screens */
            }
            .content p {
                font-size: 16px; /* Even smaller font size for very small screens */
            }
            .card {
                width: 150px; /* Smaller card width for very small screens */
            }
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <div class="hero">
        <div class="content">
            <h1>Selamat Datang</h1>
            <p>Silakan pilih salah satu menu di bawah</p>
            <div class="cards">
                <!-- Card 1 -->
                <a href="{{ route('login') }}" class="card-link">
                    <div class="card">
                        <i class="fa-solid fa-database fa-3x icon-blue"></i>
                        <h3>ANALIST</h3>
                        <button onclick="location.href='{{ route('login') }}'" style="margin-top: 10px; padding: 10px 15px; border: none; border-radius: 5px; background-color: #0056b3; color: white; cursor: pointer;">Masuk</button>
                    </div>
                </a>
                <!-- Card 2 -->
                <a href="{{ route('login') }}" class="card-link">
                    <div class="card">
                        <i class="fa-solid fa-box-open fa-3x icon-blue"></i>
                        <h3>INPUT QTY BARANG</h3>
                        <button onclick="location.href='{{ route('login') }}'" style="margin-top: 10px; padding: 10px 15px; border: none; border-radius: 5px; background-color: #0056b3; color: white; cursor: pointer;">Masuk</button>
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>
</html>