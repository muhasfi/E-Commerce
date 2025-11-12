<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: #fff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 380px;
        }
        .login-card h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #333;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
            transition: 0.3s;
        }
        .form-group input:focus {
            border-color: #667eea;
            box-shadow: 0 0 6px rgba(102,126,234,0.5);
        }
        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            margin-bottom: 1rem;
        }
        .form-actions a {
            color: #667eea;
            text-decoration: none;
        }
        .form-actions a:hover {
            text-decoration: underline;
        }
        button {
            width: 100%;
            padding: 10px;
            border: none;
            background: #667eea;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background: #5563d8;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h2>Admin Login</h2>

        <!-- Status & Error -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            <div class="form-group">
                <input type="text" name="identity" value="{{ old('identity') }}" placeholder="Email or Username" required autofocus>
            </div>

            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <div class="form-actions">
                <label>
                    <input type="checkbox" name="remember"> Remember me
                </label>
                @if (Route::has('admin.password.request'))
                    <a href="{{ route('admin.password.request') }}">Forgot?</a>
                @endif
            </div>

            <button type="submit">Log in</button>
        </form>
    </div>
</body>
</html>
