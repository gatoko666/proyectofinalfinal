<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Administrador;
use Illuminate\Support\Facades\Hash;
use Freshwork\ChileanBundle\Rut;

class AdminController extends Controller
{
    
    

    public function loginAdministrador(Request $request)
    {
  
        $userdata = array(
            'email'     => $request->email,
            'password'  =>   $request->password
        );
    
         
        //dd($userdata);
         if (Auth::attempt($userdata)) {
                         // Authentication passed...

             return redirect('/indexadministrador');
        }else{
         
             
             return redirect('/')->with('warning', 'Error al ingresar como Administrador');
         }
    }



    





}
