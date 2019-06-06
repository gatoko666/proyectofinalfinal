<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Operador;
use Illuminate\Support\Facades\DB;
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


            public function __construct()
                    {
                        $this->middleware('auth:operador');
                    }


    public function loginOperador(Request $request)
    {       

        
       // $nombreOperador = Operador::where('Correo','Correo', $operador);
       // $correoOperador = Operador::where('IdAdministrador', $operador);
  
        $userdata = array(
            'Correo'     => $request->email,
            'password'  =>  $request->password
        );
                    

         if (Auth::guard('operador')->attempt($userdata)   ) {
            echo 'pasaste';
/*

            $operador = DB::table('operador')
                ->whereColumn('Correo', 'password')
                ->first();
 

*/        //  dd(Auth::guard('operador')->Correo);
              return redirect('/indexoperador');
                           

            // return redirect('/indexoperador' , compact('operador'));

        }else{
            echo 'Fallaste';
            return redirect('/')->with('warning', 'Error al ingresar como operador');
             
         
         }      
         
    }


            public function authenticated(){

                return redirect('operador.indexoperador');
            }































}
