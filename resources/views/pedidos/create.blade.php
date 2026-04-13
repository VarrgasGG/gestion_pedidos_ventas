<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear pedido</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        form{
            max-width: 900px;
        }
        select, input{
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            margin-bottom: 16px;
        }
        .btn{
            padding: 10px 16px;
            background: #0d6efd;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-danger{
            background: #dc3545;
        }
        .fila-producto{
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
        }
        .error{
            color: red;
            margin-top: -10px;
            margin-bottom: 10px;
        }
        .mensaje{
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
            background: #f8d7da;
            color: #842029;
        }
    </style>
</head>
<body>

    <h1>Crear pedido</h1>

    @if(session('error'))
        <div class="mensaje">{{ session('error') }}</div>
    @endif

    <form action="{{ route('pedidos.store') }}" method="POST">
        @csrf

        <label>Cliente</label>
        <select name="cliente_id" required>
            <option value="">Seleccione un cliente</option>
            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                    {{ $cliente->nombre }}
                </option>
            @endforeach
        </select>
        @error('cliente_id')
            <div class="error">{{ $message }}</div>
        @enderror

        <label>Fecha</label>
        <input type="date" name="fecha" value="{{ old('fecha', date('Y-m-d')) }}" required>
        @error('fecha')
            <div class="error">{{ $message }}</div>
        @enderror

        <label>Estado</label>
        <input type="text" name="estado" value="{{ old('estado', 'pendiente') }}" required>
        @error('estado')
            <div class="error">{{ $message }}</div>
        @enderror

        <h3>Productos del pedido</h3>

        <div id="contenedor-productos">
            <div class="fila-producto">
                <label>Producto</label>
                <select name="productos[]" required>
                    <option value="">Seleccione un producto</option>
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id }}">
                            {{ $producto->nombre }} - Precio: ${{ number_format($producto->precio, 2) }} - Stock: {{ $producto->stock }}
                        </option>
                    @endforeach
                </select>

                <label>Cantidad</label>
                <input type="number" name="cantidades[]" min="1" required>

                <button type="button" class="btn btn-danger" onclick="eliminarFila(this)">Eliminar</button>
            </div>
        </div>

        @error('productos')
            <div class="error">{{ $message }}</div>
        @enderror

        @error('cantidades')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="button" class="btn" onclick="agregarFila()">Agregar otro producto</button>
        <br><br>

        <button type="submit" class="btn">Guardar pedido</button>
        <a href="{{ route('pedidos.index') }}" class="btn">Volver</a>
    </form>

    <script>
        function agregarFila() {
            const contenedor = document.getElementById('contenedor-productos');
            const fila = document.querySelector('.fila-producto').cloneNode(true);

            fila.querySelector('select').value = '';
            fila.querySelector('input').value = '';

            contenedor.appendChild(fila);
        }

        function eliminarFila(boton) {
            const contenedor = document.getElementById('contenedor-productos');
            const filas = document.querySelectorAll('.fila-producto');

            if (filas.length > 1) {
                boton.parentElement.remove();
            } else {
                alert('Debe quedar al menos un producto en el pedido.');
            }
        }
    </script>

</body>
</html>