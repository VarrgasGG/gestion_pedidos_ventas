<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::with('cliente')->orderBy('id', 'desc')->get();
        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        $clientes = Cliente::orderBy('nombre')->get();
        $productos = Producto::orderBy('nombre')->get();

        return view('pedidos.create', compact('clientes', 'productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fecha' => 'required|date',
            'estado' => 'required|string|max:255',
            'productos' => 'required|array|min:1',
            'productos.*' => 'required|exists:productos,id',
            'cantidades' => 'required|array|min:1',
            'cantidades.*' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();

        try {
            $total = 0;

            $pedido = Pedido::create([
                'cliente_id' => $request->cliente_id,
                'fecha' => $request->fecha,
                'estado' => $request->estado,
                'total' => 0,
            ]);

            foreach ($request->productos as $index => $productoId) {
                $producto = Producto::findOrFail($productoId);
                $cantidad = $request->cantidades[$index];

                if ($cantidad > $producto->stock) {
                    throw new \Exception("No hay suficiente stock para el producto: {$producto->nombre}");
                }

                $precioUnitario = $producto->precio;
                $subtotal = $cantidad * $precioUnitario;
                $total += $subtotal;

                $pedido->productos()->attach($producto->id, [
                    'cantidad' => $cantidad,
                    'precio_unitario' => $precioUnitario,
                    'subtotal' => $subtotal,
                ]);

                $producto->stock -= $cantidad;
                $producto->save();
            }

            $pedido->total = $total;
            $pedido->save();

            DB::commit();

            return redirect()->route('pedidos.index')
                ->with('success', 'Pedido registrado correctamente.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    public function show(Pedido $pedido)
    {
        $pedido->load('cliente', 'productos');
        return view('pedidos.show', compact('pedido'));
    }

    public function edit(Pedido $pedido)
    {
        //
    }

    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    public function destroy(Pedido $pedido)
    {
        DB::beginTransaction();

        try {
            foreach ($pedido->productos as $producto) {
                $producto->stock += $producto->pivot->cantidad;
                $producto->save();
            }

            $pedido->productos()->detach();
            $pedido->delete();

            DB::commit();

            return redirect()->route('pedidos.index')
                ->with('success', 'Pedido eliminado correctamente.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('pedidos.index')
                ->with('error', $e->getMessage());
        }
    }
}