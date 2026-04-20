<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | Sistema</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .card {
            border-radius: 20px;
            border: none;
        }
        .form-control {
            border-radius: 10px;
            padding: 0.75rem 1rem;
        }
        .input-group-text {
            background-color: #f8f9fa;
            border-radius: 10px 0 0 10px;
            border-right: none;
        }
        .input-group .form-control {
            border-radius: 0 10px 10px 0;
        }
        .btn-dark-custom {
            background-color: #111827;
            border: none;
            border-radius: 10px;
            padding: 0.75rem;
            transition: all 0.3s ease;
        }
        .btn-dark-custom:hover {
            background-color: #1f2937;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            
            <div class="card shadow-lg p-3">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="bi bi-shield-lock-fill fs-2"></i>
                        </div>
                        <h2 class="fw-bold h4">Iniciar sesión</h2>
                        <p class="text-muted small">Ingresa tus credenciales para continuar</p>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success border-0 py-2 small text-center mb-4">
                            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Correo electrónico</label>
                            <div class="input-group @error('email') is-invalid @enderror">
                                <span class="input-group-text @error('email') border-danger @enderror">
                                    <i class="bi bi-envelope text-muted"></i>
                                </span>
                                <input type="email" name="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       value="{{ old('email') }}" 
                                       placeholder="nombre@ejemplo.com" required autofocus>
                            </div>
                            @error('email')
                                <div class="invalid-feedback small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold">Contraseña</label>
                            <div class="input-group @error('password') is-invalid @enderror">
                                <span class="input-group-text @error('password') border-danger @enderror">
                                    <i class="bi bi-key text-muted"></i>
                                </span>
                                <input type="password" name="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       placeholder="••••••••" required>
                            </div>
                            @error('password')
                                <div class="invalid-feedback small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-dark btn-dark-custom fw-bold">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Ingresar al Sistema
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-center mt-4">
                <p class="text-muted small">© 2026 Panel de Gestión Administrativa</p>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>