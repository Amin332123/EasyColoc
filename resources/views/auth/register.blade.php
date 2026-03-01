<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Easy Coloc</title>
    <style>
        .auth-container { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 2rem 1rem; background: linear-gradient(135deg, #edf6f9 0%, #f0f8ff 100%); font-family: sans-serif; }
        .auth-card { background: white; padding: 3rem 2.5rem; border-radius: 20px; box-shadow: 0 20px 60px rgba(0, 109, 119, 0.25); max-width: 420px; width: 100%; text-align: center; }
        .logo { color: #006d77; font-weight: bold; font-size: 1.5rem; margin-bottom: 1rem; }
        .auth-card h2 { color: #006d77; font-size: 2rem; margin-bottom: 0.5rem; }
        .auth-card > p { color: #666; margin-bottom: 2.5rem; }
        .auth-form { display: flex; flex-direction: column; gap: 1.2rem; text-align: left; }
        .input-group label { display: block; margin-bottom: 0.4rem; color: #006d77; font-weight: 600; }
        .input-field { width: 100%; padding: 12px; border: 2px solid #e1e8ed; border-radius: 10px; box-sizing: border-box; font-family: inherit; }
        .auth-button { background: linear-gradient(135deg, #006d77 0%, #83c5be 100%); color: white; padding: 14px; border: none; border-radius: 10px; font-weight: 600; cursor: pointer; transition: 0.3s; margin-top: 1rem; width: 100%; }
        .auth-button:hover { opacity: 0.9; transform: translateY(-2px); }
        .auth-link { margin-top: 1.5rem; color: #666; }
        .auth-link a { color: #006d77; text-decoration: none; font-weight: bold; }
        .error-msg { color: #ef4444; font-size: 0.8rem; margin-top: 5px; list-style: none; padding: 0; }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <div class="logo">Easy Coloc</div>
            <h2>Create Account</h2>
            <p>Join us today</p>
            
            <form method="POST" action="{{ route('register') }}" class="auth-form">
                @csrf <div class="input-group">
                    <label for="name">Name</label>
                    <input id="name" class="input-field" type="text" name="name" value="{{ old('name') }}" placeholder="Enter your full name" required autofocus>
                    @if ($errors->has('name'))
                        <ul class="error-msg"><li>{{ $errors->first('name') }}</li></ul>
                    @endif
                </div>

                <div class="input-group">
                    <label for="email">Email</label>
                    <input id="email" class="input-field" type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required>
                    @if ($errors->has('email'))
                        <ul class="error-msg"><li>{{ $errors->first('email') }}</li></ul>
                    @endif
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <input id="password" class="input-field" type="password" name="password" placeholder="Create a password" required autocomplete="new-password">
                    @if ($errors->has('password'))
                        <ul class="error-msg"><li>{{ $errors->first('password') }}</li></ul>
                    @endif
                </div>

                <div class="input-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" class="input-field" type="password" name="password_confirmation" placeholder="Confirm your password" required>
                </div>

                <button type="submit" class="auth-button">Sign Up</button>
            </form>
            
            <p class="auth-link">
                Already have an account? <a href="{{ route('login') }}">Sign in here</a>
            </p>
        </div>
    </div>
</body>
</html>