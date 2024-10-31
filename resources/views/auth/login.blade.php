<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="icon" href="{{ asset('images/LOGO_MUKTI.png') }}" type="image/x-icon"> <!-- Ganti dengan jalur favicon Anda -->
    <style>
        /* Gaya CSS Anda di sini */
        body {
            display: flex;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .left {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f4f4f4;
        }
        .logo {
            width: 50%;
            height: auto;
            max-width: 500px;
        }
        .right {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f4f4f4;
        }
        .form-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }

        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }
            .left, .right {
                flex: none;
                height: auto;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="left">
        <img src="{{ asset('images/HederLogo.png') }}" alt="Logo" class="logo">
    </div>
    <div class="right">
        <div class="form-container">
            <h2>Login</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div>
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div>
                    <label for="password">Password:</label>
                    <input type="text" id="password" name="password" required>
                </div>
                @if ($errors->has('loginError'))
                    <div class="error-message">
                        <strong>{{ $errors->first('loginError') }}</strong>
                    </div>
                @endif
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>