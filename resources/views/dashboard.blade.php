<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#eef2ff;
        }
    </style>
</head>
<body>

<div class="container py-5">

    <div class="card shadow mx-auto" style="max-width: 600px;">
        <div class="card-body text-center">

            <h1 class="mb-3">Bienvenido, {{ Auth::user()->name }}</h1>
            <p class="text-muted">Has iniciado sesión correctamente.</p>

            <!-- Botón logout -->
            <form action="{{ route('logout') }}" method="POST" class="mb-4">
                @csrf
                <button type="submit" class="btn btn-danger">
                    Cerrar sesión
                </button>
            </form>

            <hr>

            <h4 class="mb-4">
                Sistema de gestión de pedidos y ventas
            </h4>

            <div class="d-grid gap-3">
                <a href="{{ route('clientes.index') }}" class="btn btn-primary">
                    Clientes
                </a>

                <a href="{{ route('pedidos.index') }}" class="btn btn-primary">
                    Pedidos
                </a>

                <a href="{{ route('productos.index') }}" class="btn btn-primary">
                    Productos
                </a>
            </div>

        </div>
    </div>

</div>

<!-- Bootstrap JS (opcional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>