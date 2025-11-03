<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WARDES - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0b132b; /* biru tua background */
        }
        .login-card {
            max-width: 400px;
            width: 100%;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }
        .form-control:focus {
            border-color: #198754;
            box-shadow: 0 0 5px rgba(25, 135, 84, 0.4);
        }
        .btn-login {
            background-color: #198754;
            border-color: #198754;
            color: #fff;
            font-weight: 600;
        }
        .btn-login:hover {
            background-color: #157347;
            border-color: #146c43;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4 text-dark bg-white login-card">
            
            <!-- Logo -->
            <div class="text-center mb-4">
                <img src="{{ asset('images/wardes.JPG') }}" 
                     alt="Logo Warung Desa" 
                     class="rounded-circle mx-auto d-block mb-3" 
                     style="width: 80px; height: 80px; object-fit: cover;">
                <h2 class="fw-bold text-dark m-0">WARDES</h2>
            </div>

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label text-dark">Email</label>
                    <input type="email" 
                           class="form-control bg-white text-dark" 
                           id="email" 
                           name="email" 
                           placeholder="Enter your email" 
                           required 
                           autofocus>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label text-dark">Password</label>
                    <input type="password" 
                           class="form-control bg-white text-dark" 
                           id="password" 
                           name="password" 
                           placeholder="Enter your password" 
                           required>
                </div>

                <!-- Forgot Password + Submit -->
                <div class="d-flex justify-content-between align-items-center">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="small text-decoration-underline text-dark">
                            Forgot your password?
                        </a>
                    @endif
                    <button type="submit" class="btn btn-login px-4">
                        Log in
                    </button>
                </div>
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
