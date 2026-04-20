<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Pedido | Sistema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh; }
        .card { border-radius: 20px; border: none; }
        .fila-producto { background-color: #f8f9fa; border-radius: 12px; transition: all 0.2s; }
        .fila-producto:hover { background-color: #f1f3f5; }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg p-3">
                <div class="card-body">
                    <h2 class="fw-bold h4 mb-4 text-center text-primary"><i class="bi bi-cart-plus me-2"></i>Registrar Nuevo Pedido</h2>

                    @if(session('error'))
                        <div class="alert alert-danger border-0">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('pedidos.store') }}" method="POST">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold small">Cliente</label>
                                <select name="cliente_id" class="form-select border-primary" required>
                                    <option value="">Seleccione un cliente</option>
                                    @foreach($clientes as $cliente)
                                        <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                                            {{ $cliente->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold small">Fecha del Pedido</label>
                                <input type="date" name="fecha" class="form-control" value="{{ old('fecha', date('Y-m-d')) }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold small">Estado Inicial</label>
                                <input type="text" name="estado" class="form-control" value="{{ old('estado', 'pendiente') }}" required text-uppercase>
                            </div>
                        </div>

                        <hr>
                        <h5 class="fw-bold mb-3 small text-uppercase text-muted">Productos del Pedido</h5>

                        <div id="contenedor-productos">
                            <div class="fila-producto p-3 mb-3 border">
                                <div class="row align-items-end">
                                    <div class="col-md-7 mb-2">
                                        <label class="form-label small">Producto</label>
                                        <select name="productos[]" class="form-select" required>
                                            <option value="">Seleccione un producto...</option>
                                            @foreach($productos as $producto)
                                                <option value="{{ $producto->id }}">
                                                    {{ $producto->nombre }} - ${{ number_format($producto->precio, 2) }} (Stock: {{ $producto->stock }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label class="form-label small">Cantidad</label>
                                        <input type="number" name="cantidades[]" class="form-control" min="1" placeholder="0" required>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <button type="button" class="btn btn-outline-danger w-100" onclick="eliminarFila(this)">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-outline-primary btn-sm rounded-pill mb-4" onclick="agregarFila()">
                            <i class="bi bi-plus-circle me-1"></i> Agregar otro producto
                        </button>

                        <div class="d-grid gap-2 border-top pt-4">
                            <button type="submit" class="btn btn-primary py-3 fw-bold">
                                <i class="bi bi-cloud-upload-fill me-2"></i>GUARDAR PEDIDO
                            </button>
                            <a href="{{ route('pedidos.index') }}" class="btn btn-link text-muted">Cancelar operación</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function agregarFila() {
        const contenedor = document.getElementById('contenedor-productos');
        const filas = document.querySelectorAll('.fila-producto');
        const nuevaFila = filas[0].cloneNode(true);

        nuevaFila.querySelector('select').value = '';
        nuevaFila.querySelector('input').value = '';
        contenedor.appendChild(nuevaFila);
    }

    function eliminarFila(boton) {
        const filas = document.querySelectorAll('.fila-producto');
        if (filas.length > 1) {
            boton.closest('.fila-producto').remove();
        } else {
            alert('El pedido debe tener al menos un producto.');
        }
    }
</script>
</body>
</html>