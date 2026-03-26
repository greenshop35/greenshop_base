<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studio Login | Green Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root { --primary-green: #27ae60; --dark-blue: #2c3e50; --light-bg: #f4f7f6; }
        body { font-family: 'Segoe UI', sans-serif; background-color: var(--light-bg); margin: 0; display: flex; align-items: center; justify-content: center; height: 100vh; }
        .login-container { background: white; padding: 40px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); width: 100%; max-width: 400px; text-align: center; border-top: 5px solid var(--primary-green); }
        .login-header i { font-size: 50px; color: var(--primary-green); margin-bottom: 10px; }
        .login-header h2 { color: var(--dark-blue); margin: 10px 0; }
        .login-header p { color: #7f8c8d; font-size: 14px; margin-bottom: 25px; }
        
        .alert-danger { background: #fdeaea; color: #e74c3c; padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 13px; text-align: left; border-left: 4px solid #e74c3c; }
        
        .form-group { position: relative; margin-bottom: 20px; text-align: left; }
        .form-group i.input-icon { position: absolute; left: 15px; top: 42px; color: #bdc3c7; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 600; color: var(--dark-blue); }
        .form-group input { width: 100%; padding: 12px 15px 12px 45px; border: 1px solid #dcdde1; border-radius: 8px; outline: none; box-sizing: border-box; transition: 0.3s; }
        .form-group input:focus { border-color: var(--primary-green); }
        
        /* पासवर्ड दिखाने वाला बटन 👁️ */
        .toggle-password { position: absolute; right: 15px; top: 42px; color: #bdc3c7; cursor: pointer; transition: 0.3s; }
        .toggle-password:hover { color: var(--primary-green); }

        /* रिमेम्बर मी स्टाइल 🌸 */
        .remember-me { display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; font-size: 14px; color: var(--dark-blue); }
        .remember-me input { cursor: pointer; margin-right: 8px; width: auto; }

        .error-text { color: #e74c3c; font-size: 12px; margin-top: 5px; font-weight: 500; }
        .login-btn { width: 100%; background: var(--primary-green); color: white; padding: 12px; border: none; border-radius: 8px; font-size: 16px; font-weight: bold; cursor: pointer; transition: 0.3s; display: flex; align-items: center; justify-content: center; gap: 10px; }
        .login-btn:hover { background: #219150; transform: translateY(-2px); }
        .footer-note { margin-top: 25px; font-size: 11px; color: #bdc3c7; }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <i class="fas fa-user-shield"></i>
            <h2>Studio Login</h2>
            <p>नमस्ते महेंद्र सिंह जी, अपना काम सुरक्षित शुरू करें 🌸</p>
        </div>

        @if ($errors->has('login_error'))
            <div class="alert-danger">
                <i class="fas fa-exclamation-triangle"></i> {{ $errors->first('login_error') }}
            </div>
        @endif

        @if(isset($db_status))
            <div style="background: {{ $db_status['color'] }}15; color: {{ $db_status['color'] }}; padding: 10px; border-radius: 8px; margin-bottom: 20px; font-size: 13px; font-weight: 600; border: 1px solid {{ $db_status['color'] }}30;">
                <i class="fas fa-database"></i> {{ $db_status['msg'] }} ✨
            </div>
        @endif

        <form action="{{ url('/studio/login-process') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>यूजर आईडी (User ID)</label>
                <i class="fas fa-envelope input-icon"></i>
                <input type="text" name="email" value="{{ old('email') }}" placeholder="Email यहाँ लिखें..." required>
                @error('email') <span class="error-text"><i class="fas fa-info-circle"></i> {{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>पासवर्ड (Password)</label>
                <i class="fas fa-lock input-icon"></i>
                <input type="password" name="password" id="passwordField" placeholder="Password लिखें..." required>
                <i class="fas fa-eye toggle-password" id="toggleIcon" onclick="togglePassword()"></i>
                @error('password') <span class="error-text"><i class="fas fa-info-circle"></i> {{ $message }}</span> @enderror
            </div>

            <div class="remember-me">
                <label style="display: flex; align-items: center; cursor: pointer;">
                    <input type="checkbox" name="remember"> मुझे याद रखें 🌸
                </label>
            </div>

            <button type="submit" class="login-btn">
                लॉगिन करें <i class="fas fa-sign-in-alt"></i>
            </button>
        </form>

        <div class="footer-note">Green Shop Studio © 2026 | महेंद्र सिंह जी द्वारा विकसित ✨</div>
    </div>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('passwordField');
            const toggleIcon = document.getElementById('toggleIcon');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>