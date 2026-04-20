<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes | Gestión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh; }
        .card { border-radius: 15px; border: none; }
        .table thead { background-color: #f8f9fa; }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-body p-4">
                    <h2 class="fw-bold h4 mb-4"><i class="bi bi-person-plus me-2 text-primary"></i>Registrar Cliente</h2>
                    
                    <form action="{{ route('clientes.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Nombre Completo</label>
                            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" placeholder="Nombre del cliente">
                            @error('nombre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label small fw-bold">Teléfono</label>
                                <input type="number" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono') }}" placeholder="Ej. 12345678">
                                @error('telefono') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label small fw-bold">Email</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="correo@ejemplo.com">
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold">Dirección</label>
                            <textarea name="direccion" class="form-control @error('direccion') is-invalid @enderror" rows="2" placeholder="Dirección física">{{ old('direccion') }}</textarea>
                            @error('direccion') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary py-2 fw-bold">Guardar Cliente</button>
                            <a href="{{ route('clientes.index') }}" class="btn btn-link text-muted">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
