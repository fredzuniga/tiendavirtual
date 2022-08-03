<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Usuarios;
use Hash;


class AuthController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function index(){
        return view('login');
    }

    public function registration(){
        return view('registration');
    }

    public function postLogin(Request $request){

        $request->validate([
            'correo' => 'required',
            'password' => 'required',
        ]);

        $user = Usuarios::where([
            ['correo', '=', $request->input('correo') ]
        ])->first();

        if($user){
            if(Hash::check($request->input('password'), $user->password)){
                Auth::login($user);
                return redirect()->intended('dashboard')->withSuccess('You have Successfully loggedin');
            }
        }
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function postRegistration(Request $request){  

        /*$request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'correo' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);*/

        $data = $request->all();
        $check = $this->create($data);
        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');

    }

    public function dashboard(){
        if(Auth::check()){
            return view('dashboard');
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function create(array $data){
        return Usuarios::create([
            'nombre' => $data['nombre'],
            'apellidos' => $data['apellidos'],
            'correo' => $data['correo'],
            'password' => Hash::make($data['password']),
            'tipo_usuario' => 2,
            'fecha_registro' => date("Y-m-d H:i:s")
        ]);
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
