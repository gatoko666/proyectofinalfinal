<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Administrador;
use App\Operador;
use Illuminate\Support\Facades\Hash;
use Freshwork\ChileanBundle\Rut;
use App\Services\PayUService\Exception;
use App\Http\Requests\ValidarRegistrar;
use Validator;





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

     

    protected function registrar(ValidarRegistrar $request)
    {

        
        try {
           
            $pass1=$request->password|'required|min:8';
            
            $pass2con=$request->password_confirmation|'required|min:8';
            


            if($pass1==$pass2con){

                $insertAdmin=new Administrador;
                //$insertAdmin->RutAdministrador=Rut::parse($request->rut)->number(); 
               // $insertAdmin->RutAdministrador=Rut::parse($request->rut)->fix()->format(); 
                           
                 $insertAdmin->RutAdministrador=Rut::parse($request->rut)->number(); 
                $insertAdmin->name=$request->name;
                $insertAdmin->email=$request->email;        
                $insertAdmin->password=Hash::make($request->password);     
                $insertAdmin->save();

            }else {
                return redirect('/')->with('warning', 'Las contraseñas no coinciden.');

            }
          

        } catch (\Exception   $exception) {

            return redirect('/')->with('warning', 'Error al ingresar nuevo usuario');
        }
       




        return redirect('/')->with('success','Administrador creado correctamente');

    }







}
