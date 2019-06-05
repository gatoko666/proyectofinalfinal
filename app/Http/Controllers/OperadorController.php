<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Operador;
use Illuminate\Support\Facades\Hash;
use Freshwork\ChileanBundle\Rut;

class OperadorController extends Controller
{
    /*
    public function __construct() {
        $this->middleware('auth:operador');
    }

*/

            protected $guard='operador' ;


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





            public function authenticated(){

                return redirect('operador.indexoperador');
            }














}
