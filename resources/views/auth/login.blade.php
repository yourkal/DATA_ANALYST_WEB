<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background: url('{{ asset('images/HederLogo.png') }}') no-repeat center;
            background-size: 60%; /* Ukuran gambar diperkecil menjadi 60% dari lebar layar */
            background-position: top center; /* Menempatkan gambar di tengah atas */
            height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        .form-container {
            background: rgba(255, 255, 255, 0.8); /* Transparansi */
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
            margin-top: 95px; /* Tambahkan margin atas untuk memindahkan form ke bawah */
        }
        h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }
        .form-container label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }
        .form-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            transition: 0.3s ease;
        }
        .form-container button:hover {
            background-color: #0056b3;
        }
        .form-container a {
            display: block;
            text-align: center;
            margin-top: 10px;
            text-decoration: none;
            color: #007bff;
            font-size: 14px;
        }
        .form-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Login</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="text" id="password" name="password" required>
            
            <button type="submit">Login</button>
        </form>
        <a href="#">Masukan Username Dan Password Sesuai Admin</a>
        <a href="#">Analist dan Input Qty Barang</a>
    </div>
</body>
</html>