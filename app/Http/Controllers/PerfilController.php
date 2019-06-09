<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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






}


