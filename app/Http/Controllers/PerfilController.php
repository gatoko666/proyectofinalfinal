<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
Use app\Operador;


class PerfilController extends Controller
{
   
    public function index(Request $request)
    {
       
        return view('administrador/menuadministrador/menuperfil/indexperfil');

     }

     public function indexOperadorPerfil(Request $request)
     {       
         return view('operador/menuoperador/menuperfil/indexperfil'); 
      }




     public function updateperfil( $id )
     {       

        dd(
        $request->all()
        );
       


         $validatedData = $request->validate([
             'HoraInicioTurno' => 'required',
             'HoraTerminoTurno' => 'required',
             'AbreviacionTurno' => 'required',
             'DescripcionDetalleTipoTurno' => 'required|max:50',
             'IdTurnos' => '',  
         ]);
         
         TipoDeTurno::where('IdDetalleTipoTurno', $IdDetalleTipoTurno)->update($validatedData);


         return redirect('perfil')->with('success', 'Perfil Actualizado correctamente');



           }


           public function changePassword(Request $request){

            
                

 
            if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
                // The passwords matches
                return redirect()->back()->with("error","Su contraseña actual no coincide con la contraseña almacenada. Por favor intente de nuevo.");
            }
    
            if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
                //Current password and new password are same
                return redirect()->back()->with("error","La contraseña no puede ser la misma que tiene actualmente. Por favor ingrese otra contraseña.");
            }
    
            $validatedData = $request->validate([
                'current-password' => 'required',
                'new-password' => 'required|string|min:3|confirmed',
            ]);
    
            //Change Password
            $user = Auth::user();
            $user->password = bcrypt($request->get('new-password'));
            $user->save();
    
            return redirect()->back()->with("success","Password changed successfully !");
    
        }

        public function changePasswordOp(Request $request){
 
             
                
 
            if (!(Hash::check($request->get('current-password'), Auth::user()->Password))) {
                // The passwords matches
                return redirect()->back()->with("error","Su contraseña actual no coincide con la contraseña almacenada. Por favor intente de nuevo.");
            }
    
            if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
                //Current password and new password are same
                return redirect()->back()->with("error","La contraseña no puede ser la misma que tiene actualmente. Por favor ingrese otra contraseña.");
            }
    
            $validatedData = $request->validate([
                'current-password' => 'required',
                'new-password' => 'required|string|min:3|confirmed',
            ]);
    
            //Change Password
            $user = Auth::user();
            $user->Password = bcrypt($request->get('new-password'));
            $user->save();
    
            return redirect()->back()->with("success","Password actualizada con éxito !");
    
        }







}


