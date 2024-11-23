<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::paginate(4);
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
        ]);

        Producto::create($request->all());
        //Alert::success('Éxito', 'El producto ha sido creado correctamente')->flash();
        //return redirect()->route('producto.index');
        return response()->json(['success' =>'producto creado correctamente']);
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $producto = Producto::find($id);
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
        ]);

        $producto = Producto::find($id);

        
        if ($producto) {
            $producto->nombre = $request->nombre;
            $producto->descripcion = $request->descripcion;
            $precio = str_replace(',', '.', $request->precio);
            $producto->save();
            Alert::success('Éxito', 'Los datos han sido guardados correctamente')->flash();
        } else {
            Alert::error('Error', 'Producto no encontrado')->flash();
        }
    
        //return redirect()->route('producto.index');
        //Alert::success('Éxito', 'Los datos han sido guardados correctamente')->flash();
        return response()->json(['success' =>'producto actualizado correctamente']);
    }

    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        Alert::success('Éxito', 'El usuario ha sido eliminado correctamente')->flash();
        return redirect()->route('producto.index');
    }
}
