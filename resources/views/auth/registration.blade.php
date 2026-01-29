<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #332D56;
        }
        .registration-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .registration-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .registration-header h2{
            color: #71C0BB;
        }
        .form-label {
            font-weight: 500;
        }
        .btn-register {
            width: 100%;
            padding: 10px;
            font-weight: 600;
            background-color: #332D56;
            color: #E3EEB2;
        }
        .btn-register:hover{
            border-color:#332D56;
        }
        .login-link {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="registration-container">
            <div class="registration-header">
                <h2>Create Your Account</h2>
                <p class="text-muted">Fill in the form below to get started</p>
            </div>
            
            <form action="{{ route('user_create') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="mb-3">
                        @error('name')
                            <label for="Name" class="form-label text-danger">{{ $message }}</label>
                        @else
                            <label for="Name" class="form-label">Name</label>
                        @enderror
                        <input type="text" class="form-control" name="name" id="Name" value="{{old('name')}}" required>
                    </div>
                </div>
                
                <div class="mb-3">
                    @error('email')
                        <label for="email" class="form-label text-danger">{{ $message }}</label>
                    @else
                        <label for="email" class="form-label">Email Address</label>
                    @enderror
                    <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" required>
                </div>
                
                <div class="mb-3">
                    @error('phone')
                        <label for="phone" class="form-label text-danger">{{ $message }}</label>
                    @else
                        <label for="phone" class="form-label">Phone Number</label>
                    @enderror
                    <input type="tel" class="form-control" name="phone" value="{{old('phone')}}" id="phone">
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6 mb-3 mb-md-0">
                        @error('password')
                            <label for="password" class="form-label text-danger">{{ $message }}</label>
                        @else
                            <label for="password" class="form-label">Password</label>
                        @enderror
                        <input type="password" class="form-control" name="password" value="{{old('password')}}"  id="password" required>
                    </div>
                    <div class="col-md-6">
                        @error('password_confirmation')
                            <label for="password_confirmation" class="form-label text-danger">{{ $message }}</label>
                        @else
                            <label for="confirmPassword" class="form-label ">Confirm Password</label>
                        @enderror
                        <input type="password" class="form-control" name="password_confirmation" id="confirmPassword" required>
                    </div>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="terms" required>
                    <label class="form-check-label" for="terms">I agree to the <a href="#">Terms and Conditions</a></label>
                </div>
                
                <button type="submit" name="submit" class="btn regi-btn btn-register">Register</button>
                
                <div class="login-link">
                    <p class="text-muted">Already have an account? <a href="{{route('login_view')}}">Login here</a></p>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Flash success Message (Positioned at top-right) -->
    @if(session('success'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="flash-message">
            <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('flash-message').style.display = 'none';
        }, 100000);
    </script>
    @endif

    <!-- Flash failed Message (Positioned at top-right) -->
    @if(session('falied'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="flash-message">
            <i class="bi bi-check-circle me-2"></i> {{ session('falied') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('flash-message').style.display = 'none';
        }, 100000);
    </script>
    @endif
</body>
</html>