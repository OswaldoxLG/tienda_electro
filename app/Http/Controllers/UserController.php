<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(6);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'role' => 'required|in:cliente,administrador',
            'password' => 'required|min:6',
        ]);
        
        $validatedData['password'] = bcrypt($validatedData['password']);
        //$validatedData['rol'] = 'cliente';
        
        User::create($validatedData);
        //Alert::success('Éxito', 'El usuario ha sido creado correctamente')->flash();
        //return redirect()->route('user.index');
        return response()->json(['success' =>'usuario creado correctamente']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);
    
        $user = User::find($id);
    
        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            
            Alert::success('Éxito', 'Los datos han sido guardados correctamente')->flash();
        } else {
            Alert::error('Error', 'Usuario no encontrado')->flash();
        }
    
        //return redirect()->route('user.index');
        //Alert::success('Éxito', 'Los datos han sido guardados correctamente')->flash();
        return response()->json(['success' =>'usuario actualizado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Alert::success('Éxito', 'El usuario ha sido eliminado correctamente')->flash();
        return redirect()->route('user.index');
    }
}
