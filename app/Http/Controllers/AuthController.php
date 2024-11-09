<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index(){
        return view("modules/auth/login");
    }

    public function registro(){
        return view("modules/auth/registro");
    }

    public function registrar (Request $request){
        $item = new User();
        $item->name = $request->name;
        $item->email = $request->email;
        $item->password = Hash::make($request->password);
        $item->role = 'cliente';
        $item->save();
        return redirect()->route('login');
    }

    public function logear(Request $request){
        $credenciales = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credenciales)){
            return redirect()->route('home');
        } else {
            return redirect()->route('login');
        }
    } 

    
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    } 

    /*
    public function logout(Request $request){
    
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    redirect()->route('login');
} */

    public function home(){
        return view('modules/dashboard/home');
    }
    /*
    public function login(Request $request){
        $request->validate([
            'email' => 'required|String|email',
            'password' => 'required|String',
        ]);

        if($auth = auth()->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('home')->with('success', 'Login successful');
    } 

        return redirect()->back();
}
*/
}
