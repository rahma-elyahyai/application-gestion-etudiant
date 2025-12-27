<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email </title>
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

        .verify-container {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 3;
            text-align: center;
        }

        .verify-title {
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

        .verify-form {
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            min-width: 400px;
        }

        .info-text {
            color: #666;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 25px;
            text-align: left;
        }

        .verify-button {
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
            margin-bottom: 15px;
        }

        .verify-button:hover {
            background: #0097d1;
        }

        .logout-button {
            width: 100%;
            padding: 15px;
            background: #f5f5f5;
            color: #666;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .logout-button:hover {
            background: #e8e8e8;
            color: #333;
        }

        .success-message {
            background: #efe;
            color: #3c3;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .button-group {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .button-group form {
            flex: 1;
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

    <div class="verify-container">
        <h1 class="verify-title">VERIFY EMAIL</h1>
        
        <div class="logo-circle">
            <div class="logo-inner"></div>
        </div>

        <div class="verify-form">
            <div class="info-text">
                Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="success-message">
                    A new verification link has been sent to the email address you provided during registration.
                </div>
            @endif

            <div class="button-group">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="verify-button">
                        RESEND VERIFICATION EMAIL
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-button">
                        LOG OUT
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>