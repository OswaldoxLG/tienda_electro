<?php

namespace App\Http\Controllers;
use App\Models\Pedido;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::paginate(4);
        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        return view('pedidos.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'estado' => 'required|in:pendiente,completado,cancelado',
            'total' => 'required|numeric',
        ]);

        Pedido::create($validatedData);
        Alert::success('Éxito', 'El pedido ha sido creado correctamente')->flash();
        return redirect()->route('pedido.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('pedidos.edit', compact('pedido'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required|string',
            'total' => 'required|numeric',
        ]);

        $pedido = Pedido::findOrFail($id);

        if ($pedido) {
            $pedido->estado = $request->estado;
            $pedido->total = $request->total;
            $pedido->save();
            Alert::success('Éxito', 'Los datos han sido guardados correctamente')->flash();
        } else {
            Alert::error('Error', 'Pedido no encontrado')->flash();
        }
    
        return redirect()->route('pedido.index');
        Alert::success('Éxito', 'Los datos han sido guardados correctamente')->flash();
    }

    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();
        Alert::success('Éxito', 'El usuario ha sido eliminado correctamente')->flash();
        return redirect()->route('pedido.index');
    }
}
