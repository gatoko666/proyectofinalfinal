<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\TipoDeTurno;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Requests\ValidarTipoDeTurno;
use Illuminate\Support\Facades\Crypt;


class TiposDeTurnosController extends Controller
{
    public function index(Request $request)
        {
            $operador=Auth::id();
            $detalletiposdeturnos = TipoDeTurno::where('IdAdministrador', $operador)-> paginate(10);  
            return view('administrador/menuadministrador/tiposdeturnos/indextipodeturnos', compact('detalletiposdeturnos'));
   
         }


         public function store(ValidarTipoDeTurno $request)
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
            $IdDetalleTipoTurno =  Crypt::decrypt($IdDetalleTipoTurno);
            $detalletiposdeturnos = TipoDeTurno::findOrFail($IdDetalleTipoTurno);
            return view('administrador/menuadministrador/tiposdeturnos.editartiposdeturnos', compact('detalletiposdeturnos'));
     
         }
     
     
     
         public function update(ValidarTipoDeTurno $request,  $IdDetalleTipoTurno)
         {       
           
             $validatedData = $request->validate([
                 'HoraInicioTurno' => 'required',
                 'HoraTerminoTurno' => 'required',
                 'AbreviacionTurno' => 'required',
                 'DescripcionDetalleTipoTurno' => 'required|max:50',
                 'IdTurnos' => '',  
             ]);
             
             TipoDeTurno::where('IdDetalleTipoTurno', $IdDetalleTipoTurno)->update($validatedData);
             return redirect('tiposdeturnos')->with('success', 'Tipo de turno  es actualizado correctamente.');
               }
     
     
               public function destroy($IdDetalleTipoTurno)
               {

                try {
                    TipoDeTurno::where('IdDetalleTipoTurno',$IdDetalleTipoTurno)->delete();
           
                    return redirect('tiposdeturnos')->with('success','Tipo de turno eliminado correctamente');      
                    
                } catch (\Throwable $th) {
                    return redirect('tiposdeturnos')->with('error','Problema al eliminar el Tipo de turno');   
                }



              
     
               }
     
     

}
