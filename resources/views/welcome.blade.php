<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f4f6f9;">

    <div class="container d-flex justify-content-center align-items-center vh-100">
        
        <div class="card shadow p-5 text-center" style="max-width: 500px; width: 100%;">
            
            <h2 class="mb-4">
                Sistema de gestión de pedidos y ventas
            </h2>

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

</body>
</html>