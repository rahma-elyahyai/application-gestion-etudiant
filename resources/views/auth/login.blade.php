<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            overflow: hidden;
        }

        .background-grid {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: repeat(3, 1fr);
            z-index: 1;
        }

        .background-grid::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 2;
        }

        .grid-item {
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .grid-item:nth-child(1) { background-image: url('https://images.unsplash.com/photo-1497366216548-37526070297c?w=500'); }
        .grid-item:nth-child(2) { background-image: url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=500'); }
        .grid-item:nth-child(3) { background-image: url('https://images.unsplash.com/photo-1556761175-4b46a572b786?w=500'); }
        .grid-item:nth-child(4) { background-image: url('https://images.unsplash.com/photo-1553877522-43269d4ea984?w=500'); }
        .grid-item:nth-child(5) { background-image: url('https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=500'); }
        .grid-item:nth-child(6) { background-image: url('https://images.unsplash.com/photo-1551434678-e076c223a692?w=500'); }
        .grid-item:nth-child(7) { background-image: url('https://images.unsplash.com/photo-1531482615713-2afd69097998?w=500'); }
        .grid-item:nth-child(8) { background-image: url('https://images.unsplash.com/photo-1553877522-43269d4ea984?w=500'); }
        .grid-item:nth-child(9) { background-image: url('https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=500'); }
        .grid-item:nth-child(10) { background-image: url('https://images.unsplash.com/photo-1557804506-669a67965ba0?w=500'); }
        .grid-item:nth-child(11) { background-image: url('https://images.unsplash.com/photo-1524758631624-e2822e304c36?w=500'); }
        .grid-item:nth-child(12) { background-image: url('https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=500'); }

        .login-container {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 3;
            text-align: center;
        }

        .login-title {
            color: white;
            font-size: 2.5rem;
            font-weight: 300;
            letter-spacing: 8px;
            margin-bottom: 40px;
            text-transform: uppercase;
        }

        .logo-circle {
            width: 80px;
            height: 80px;
            margin: 0 auto 30px;
            border: 3px solid white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-inner {
            width: 50px;
            height: 50px;
            border: 3px solid white;
            border-radius: 50%;
            border-left-color: transparent;
            border-bottom-color: transparent;
            transform: rotate(45deg);
        }

        .login-form {
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            min-width: 400px;
        }

        .input-group {
            margin-bottom: 20px;
            position: relative;
        }

        .input-group input {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .input-group input:focus {
            outline: none;
            border-color: #00a8e8;
        }

        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            font-size: 14px;
            color: #666;
        }

        .checkbox-group input {
            margin-right: 8px;
        }

        .login-button {
            width: 100%;
            padding: 15px;
            background: #00a8e8;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .login-button:hover {
            background: #0097d1;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            font-size: 13px;
        }

        .form-footer a {
            color: #666;
            text-decoration: none;
            transition: color 0.3s;
        }

        .form-footer a:hover {
            color: #00a8e8;
        }

        .social-login {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .social-login p {
            font-size: 14px;
            color: #666;
            margin-bottom: 15px;
        }

        .social-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .social-button {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: transform 0.3s;
            color: white;
            text-decoration: none;
        }

        .social-button:hover {
            transform: scale(1.1);
        }

        .social-button.facebook { background: #3b5998; }
        .social-button.twitter { background: #1da1f2; }
        .social-button.google { background: #dd4b39; }

        .error-message {
            background: #fee;
            color: #c33;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .success-message {
            background: #efe;
            color: #3c3;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="background-grid">
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
        <div class="grid-item"></div>
    </div>

    <div class="login-container">
        <h1 class="login-title"> LOGIN </h1>
        
        <div class="logo-circle">
            <div class="logo-inner"></div>
        </div>

        <div class="login-form">
            <!-- Session Status -->
            @if (session('status'))
                <div class="success-message">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="input-group">
                    <i>👤</i>
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        placeholder="Email Address" 
                        value="{{ old('email') }}" 
                        required 
                        autofocus 
                        autocomplete="username"
                    />
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="input-group">
                    <i>🔒</i>
                    <input 
                        id="password" 
                        type="password" 
                        name="password" 
                        placeholder="Password" 
                        required 
                        autocomplete="current-password"
                    />
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="checkbox-group">
                    <input id="remember_me" type="checkbox" name="remember">
                    <label for="remember_me">Keep Me Logged In</label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="login-button">LOG IN</button>

                <!-- Footer Links -->
                <div class="form-footer">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">FORGOT PASSWORD?</a>
                    @endif
                    
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">NEW USER? REGISTER</a>
                    @endif
                </div>

                <!-- Social Login -->
                <div class="social-login">
                    <p>Or Login Using :</p>
                    <div class="social-buttons">
                        <a href="{{ route('google.redirect') }}" class="social-button google">G+</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>