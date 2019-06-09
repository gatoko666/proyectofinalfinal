<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Administrador;
use App\Operador;
use Illuminate\Support\Facades\Hash;
use Freshwork\ChileanBundle\Rut;
use App\Services\PayUService\Exception;



class LoginController extends Controller
{



    public function loginOperador(Request $request)
    {
      
        $userdata = array(
            'Correo'     => $request->email,
            'password'  =>  $request->password
        );   
         if (Auth::guard('operador')->attempt($userdata)) {
            echo 'pasaste';
             return redirect('/indexoperador');
        }else{
            echo 'Fallaste';
            return redirect('/')->with('warning', 'Error al ingresar como operador');
                     
         }   
    }

    


/*
    public function __construct() {
        $this->middleware('auth:operador');
    }
*/


    public function inicio()
    {
       // return view('login.login');
    }

   


    


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

     

    protected function registrar(Request $request)
    {
        try {
            
            $insertAdmin=new Administrador;
            $insertAdmin->RutAdministrador=Rut::parse($request->rut)->number(); 
            $insertAdmin->name=$request->name;
            $insertAdmin->email=$request->email;        
            $insertAdmin->password=Hash::make($request->password);     
            $insertAdmin->save();

        } catch (\Exception   $exception) {

            return redirect('/')->with('warning', 'Error al ingresar nuevo usuario');
        }
       




        return redirect('/')->with('success','Administrador creado correctamente');

    }







}
