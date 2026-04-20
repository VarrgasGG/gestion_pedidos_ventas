<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto | Sistema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh; display: flex; align-items: center; }
        .card { border-radius: 20px; border: none; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg p-3">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="bi bi-pencil-square fs-2"></i>
                        </div>
                        <h2 class="fw-bold h4">Editar Producto</h2>
                        <p class="text-muted small">Modifique los campos necesarios</p>
                    </div>

                    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Nombre del Producto</label>
                            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" 
                                   value="{{ old('nombre', $producto->nombre) }}">
                            @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Descripción</label>
                            <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" rows="2">{{ old('descripcion', $producto->descripcion) }}</textarea>
                            @error('descripcion') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="row">
                            <div class="col-6 mb-4">
                                <label class="form-label small fw-bold">Precio ($)</label>
                                <input type="number" step="0.01" name="precio" class="form-control @error('precio') is-invalid @enderror" 
                                       value="{{ old('precio', $producto->precio) }}">
                                @error('precio') <div class="text-danger small mt-1" style="font-size: 0.75rem;">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-6 mb-4">
                                <label class="form-label small fw-bold">Stock en Almacén</label>
                                <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" 
                                       value="{{ old('stock', $producto->stock) }}">
                                @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-warning text-white py-2 fw-bold shadow-sm">
                                <i class="bi bi-arrow-repeat me-2"></i>Actualizar Datos
                            </button>
                            <a href="{{ route('productos.index') }}" class="btn btn-light border-0">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>