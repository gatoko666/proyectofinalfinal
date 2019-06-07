<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\TipoDeTurno;
use Illuminate\Support\Facades\Auth;

class TiposDeTurnosController extends Controller
{
    public function index(Request $request)
        {
            $operador=Auth::id();
            $detalletiposdeturnos = TipoDeTurno::where('IdAdministrador', $operador)-> paginate(10);  
            return view('administrador/menuadministrador/tiposdeturnos/indextipodeturnos', compact('detalletiposdeturnos'));
   
         }


         public function store(Request $request)
         {       
     
             $tipodeturno= new TipoDeTurno;
             $tipodeturno->AbreviacionTurno=$request->AbreviacionTurno;
             $tipodeturno->DescripcionDetalleTipoTurno=$request->DescripcionDetalleTipoTurno;
             $tipodeturno->HoraInicioTurno=$request->HoraInicioTurno;
             $tipodeturno->HoraTerminoTurno=$request->HoraTerminoTurno;
             $tipodeturno->IdAdministrador=Auth::id();   
             $tipodeturno->save();                
                    return redirect('tiposdeturnos')->with('success','Tipo de turno  Agregado correctamente');
                         
         }
         public function edit($IdDetalleTipoTurno)
         {        
            $detalletiposdeturnos = TipoDeTurno::findOrFail($IdDetalleTipoTurno);
            return view('administrador/menuadministrador/tiposdeturnos.editartiposdeturnos', compact('detalletiposdeturnos'));
     
         }
     
     
     
         public function update(Request $request,  $IdDetalleTipoTurno)
         {       
           
             $validatedData = $request->validate([
                 'HoraInicioTurno' => 'required',
                 'HoraTerminoTurno' => 'required',
                 'AbreviacionTurno' => 'required',
                 'DescripcionDetalleTipoTurno' => 'required|max:50',
                 'IdTurnos' => '',  
             ]);
             
             TipoDeTurno::where('IdDetalleTipoTurno', $IdDetalleTipoTurno)->update($validatedData);
             return redirect('tiposdeturnos')->with('success', 'Tipo de turno  is successfully updated');
               }
     
     
               public function destroy($IdDetalleTipoTurno)
               {
                TipoDeTurno::where('IdDetalleTipoTurno',$IdDetalleTipoTurno)->delete();
           
                   return redirect('tiposdeturnos')->with('success','Tipo de turno eliminado correctamente');       
     
               }
     
     

}
