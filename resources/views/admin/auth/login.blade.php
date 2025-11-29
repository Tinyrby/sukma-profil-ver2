<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - SideS</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 400px;
        }

        .login-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }

        .login-header h3 {
            margin: 0;
            font-weight: 600;
        }

        .login-header p {
            margin: 10px 0 0 0;
            opacity: 0.9;
            font-size: 14px;
        }

        .login-body {
            padding: 40px 30px;
        }

        .form-control {
            border-radius: 5px;
            padding: 12px 15px;
            border: 1px solid #ddd;
            margin-bottom: 15px;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px;
            border-radius: 5px;
            font-weight: 600;
            transition: transform 0.2s;
        }

        .btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .input-group-text {
            background: transparent;
            border-right: none;
            border-radius: 5px 0 0 5px;
        }

        .form-control.with-icon {
            border-left: none;
            border-radius: 0 5px 5px 0;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h3><i class="fas fa-city"></i> SideS</h3>
            <p>Admin Login - Sistem Informasi Desa Sukma</p>
        </div>

        <div class="login-body">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first() }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form action="{{ route('admin.login') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" class="form-control with-icon" name="username" placeholder="Username" required>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" class="form-control with-icon" name="password" placeholder="Password" required>
                    </div>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">
                        Ingat saya
                    </label>
                </div>

                <button type="submit" class="btn btn-primary btn-login w-100">
                    <i class="fas fa-sign-in-alt"></i> Login
                </button>
            </form>

            <div class="text-center mt-4">
                <small class="text-muted">
                    <i class="fas fa-info-circle"></i>
                    Default: admin / admin123
                </small>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>