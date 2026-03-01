<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Easy Coloc</title>
    <style>
        .auth-container { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 2rem 1rem; background: linear-gradient(135deg, #edf6f9 0%, #f0f8ff 100%); font-family: sans-serif; }
        .auth-card { background: white; padding: 3rem 2.5rem; border-radius: 20px; box-shadow: 0 20px 60px rgba(0, 109, 119, 0.25); max-width: 420px; width: 100%; text-align: center; }
        .logo { color: #006d77; font-weight: bold; font-size: 1.5rem; margin-bottom: 1rem; }
        .auth-card h2 { color: #006d77; font-size: 2rem; margin-bottom: 0.5rem; }
        .auth-card > p { color: #666; margin-bottom: 2.5rem; }
        .auth-form { display: flex; flex-direction: column; gap: 1.5rem; text-align: left; }
        .input-group label { display: block; margin-bottom: 0.5rem; color: #006d77; font-weight: 600; }
        .input-field { width: 100%; padding: 12px; border: 2px solid #e1e8ed; border-radius: 10px; box-sizing: border-box; }
        .auth-button { background: linear-gradient(135deg, #006d77 0%, #83c5be 100%); color: white; padding: 14px; border: none; border-radius: 10px; font-weight: 600; cursor: pointer; transition: 0.3s; }
        .auth-button:hover { opacity: 0.9; transform: translateY(-2px); }
        .auth-link { margin-top: 1.5rem; color: #666; }
        .auth-link a { color: #006d77; text-decoration: none; font-weight: bold; }
        /* Error Style */
        .error-msg { color: #ef4444; font-size: 0.8rem; margin-top: 5px; list-style: none; padding: 0; }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <div class="logo">Easy Coloc</div>
            <h2>Welcome Back</h2>
            <p>Sign in to your account</p>

            @if (session('status'))
                <div style="color: green; margin-bottom: 1rem;">{{ session('status') }}</div>
            @endif
            
            <form method="POST" action="{{ route('login') }}" class="auth-form">
                @csrf <div class="input-group">
                    <label for="email">Email</label>
                    <input id="email" class="input-field" type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required autofocus autocomplete="username">
                    @if ($errors->has('email'))
                        <ul class="error-msg"><li>{{ $errors->first('email') }}</li></ul>
                    @endif
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <input id="password" class="input-field" type="password" name="password" placeholder="Enter your password" required autocomplete="current-password">
                    @if ($errors->has('password'))
                        <ul class="error-msg"><li>{{ $errors->first('password') }}</li></ul>
                    @endif
                </div>

                <div class="checkbox-group">
                    <label class="checkbox-label">
                        <input type="checkbox" name="remember" class="checkbox-input">
                        <span>Remember me</span>
                    </label>
                </div>

                <button type="submit" class="auth-button">Sign In</button>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="text-align: center; color: #006d77; font-size: 0.8rem; text-decoration: none;">
                        Forgot your password?
                    </a>
                @endif
            </form>
            
            <p class="auth-link">
                Don't have an account? <a href="{{ route('register') }}">Sign up here</a>
            </p>
        </div>
    </div>
</body>
</html>