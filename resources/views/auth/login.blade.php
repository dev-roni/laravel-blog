<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #332D56;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .login-card {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: white;
        }
        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .login-header h2 {
            color: #71C0BB;
            font-weight: 600;
        }
        .form-control {
            padding: 0.75rem 1rem;
            margin-bottom: 1rem;
        }
        .btn-login {
            width: 100%;
            padding: 0.75rem;
            font-weight: 600;
            background-color: #332D56;
            color:#E3EEB2;
        }
        .btn-login:hover{
            border-color: #332D56;
        }
        .social-login {
            margin: 1.5rem 0;
            text-align: center;
        }
        .social-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin: 0 5px;
            color: white;
            text-decoration: none;
        }
        .facebook {
            background-color: #3b5998;
        }
        .google {
            background-color: #db4437;
        }
        .twitter {
            background-color: #1da1f2;
        }
        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
        }
        .divider::before, .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #dee2e6;
        }
        .divider-text {
            padding: 0 1rem;
            color: #6c757d;
            font-size: 0.875rem;
        }
        .forgot-password {
            text-align: right;
            margin-bottom: 1rem;
        }
        .register-link {
            text-align: center;
            margin-top: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-header">
            <h2>Welcome Back</h2>
            <p class="text-muted">Please sign in to continue</p>
        </div>
        
        <form action="{{route('loged_in')}}" method="POST">
            @csrf
            <div class="mb-3">
                @error('email')
                <label for="email" class="form-label">{{ $message }}</label>
                else
                <label for="email" class="form-label">Your Email</label>
                @enderror
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" placeholder="Enter your email" required>
                </div>
            </div>
            
            <div class="mb-3">
                @error('password')
                <label for="password" class="form-label">{{ $message }}</label>
                @else
                <label for="password" class="form-label">Password</label>
                @enderror
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" placeholder="Enter your password" required>
                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
            
            <div class="d-flex justify-content-between mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
                <div class="forgot-password">
                    <a href="#">Forgot password?</a>
                </div>
            </div>
            
            <button type="submit" class="btn btn-login">Login</button>
            
            <div class="divider">
                <span class="divider-text">OR CONTINUE WITH</span>
            </div>
            
            <div class="social-login">
                <a href="#" class="social-btn facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-btn google"><i class="fab fa-google"></i></a>
                <a href="#" class="social-btn twitter"><i class="fab fa-twitter"></i></a>
            </div>
            
            <div class="register-link">
                <p class="text-muted">Don't have an account? <a href="{{route('registration')}}">Register here</a></p>
            </div>
        </form>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS for password toggle -->
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            const icon = this.querySelector('i');
            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>
</body>
</html>