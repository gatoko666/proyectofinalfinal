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
    {/*
        $user = Administrador::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'RutAdministrador' => $data['rut'],
            'password' => Hash::make($data['password']),
        ]);
*/
            




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
        return redirect('/')->with('warning', 'Error al ingresar nuevo usuario');




 
              
                      //  $password=Hash::make($request->password);
/*
                        $request->validate([
                            'name' => 'required|max:50',
                            'email' => 'required|email',                           
                            'RutAdministrador' => 'required',  
                            'password' => 'required ',                             
                                                       
                        ]);                      
                                //dd($request);
                Administrador::create($request->all());*/

        return redirect('/')->with('success','Administrador creado correctamente');
 // return redirect('/')->with('warning','Rut en formato incorrecto');



      // $user->roles()->attach(Role::where('name', 'user')->first());

      // return $user;
    }







}
