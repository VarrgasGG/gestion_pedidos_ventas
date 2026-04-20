<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Gestión</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        /* Efecto sutil para las tarjetas de navegación */
        .btn-nav {
            transition: all 0.3s ease;
            border: none;
            padding: 1.2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-radius: 12px;
        }
        .btn-nav:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            
            <div class="card border-0 shadow-lg" style="border-radius: 20px;">
                <div class="card-body p-5">
                    
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="text-start">
                            <h6 class="text-uppercase text-muted small fw-bold mb-1">Bienvenido de nuevo,</h6>
                            <h2 class="h4 fw-bold mb-0 text-dark">{{ Auth::user()->name }}</h2>
                        </div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3">
                                <i class="bi bi-box-arrow-right me-1"></i> Salir
                            </button>
                        </form>
                    </div>

                    <div class="alert alert-light border-0 mb-4 py-3" style="background-color: #f8f9ff;">
                        <i class="bi bi-info-circle-fill text-primary me-2"></i>
                        <span class="text-muted small">Panel de administración activo.</span>
                    </div>

                    <hr class="my-4 opacity-50">

                    <div class="mb-4 d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold m-0">Menú de Gestión</h5>
                        <a href="{{ route('usuarios.create') }}" class="btn btn-success btn-sm rounded-pill px-3">
                            <i class="bi bi-person-plus-fill me-1"></i> Registrar
                        </a>
                    </div>

                    <div class="d-grid gap-3">
                        <a href="{{ route('clientes.index') }}" class="btn btn-primary btn-nav shadow-sm text-start">
                            <span><i class="bi bi-people-fill me-3"></i> Gestión de Clientes</span>
                            <i class="bi bi-chevron-right small"></i>
                        </a>

                        <a href="{{ route('pedidos.index') }}" class="btn btn-primary btn-nav shadow-sm text-start" style="background-color: #4e73df;">
                            <span><i class="bi bi-cart-check-fill me-3"></i> Control de Pedidos</span>
                            <i class="bi bi-chevron-right small"></i>
                        </a>

                        <a href="{{ route('productos.index') }}" class="btn btn-primary btn-nav shadow-sm text-start" style="background-color: #2e59d9;">
                            <span><i class="bi bi-box-seam-fill me-3"></i> Inventario Productos</span>
                            <i class="bi bi-chevron-right small"></i>
                        </a>
                    </div>

                    <div class="text-center mt-5">
                        <p class="text-muted x-small mb-0" style="font-size: 0.8rem;">
                            © 2024 Sistema de Gestión • v1.2
                        </p>
                    </div>

                </div>
            </div> </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>