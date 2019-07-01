<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Operador;
use App\TipoDeTurno;
use App\DetalleTurnoAsignado;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
 



class TurnosControllerOperador extends Controller
{
    
    public function index(Request $request)
    {


        $IdAdministrador=Auth::id(); 
        $turnoOperadorlunes=DB::table('detalletipoturno')
        ->join('turnoasignado', 'detalletipoturno.IdDetalleTipoTurno', '=', 'turnoasignado.IdDetalleTipoTurno') 
      ->join('operador', 'operador.RutOperador', '=', 'turnoasignado.RutOperador')                              
      ->select('operador.NombreOperador','detalletipoturno.AbreviacionTurno','turnoasignado.NumeroSemanaAno','turnoasignado.DiaSemana')
        
      ->where(function ($query) {
       $IdAdministrador=Auth::id();    

       $query->where('operador.IdAdministrador', '=', $IdAdministrador)                       
           
            ->where('turnoasignado.NumeroSemanaAno','=','2019-W24');                            })
                       
      ->orderBy('turnoasignado.NumeroSemanaAno', 'ASC')
       ->orderByRaw(DB::raw("FIELD(turnoasignado.DiaSemana, 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo')"))
       ->get();
      
        return view('operador/menuoperador/menuturnos/revisarturnos',
        compact('turnoOperadorlunes' ));         
                
    }



    public function buscarturnos(Request $request ){
                          
        $numberWeek=$request->NumeroSemanaAno;

        $turnoOperadorlunes=DB::table('detalletipoturno')
        ->join('turnoasignado', 'detalletipoturno.IdDetalleTipoTurno', '=', 'turnoasignado.IdDetalleTipoTurno') 
        ->join('operador', 'operador.RutOperador', '=', 'turnoasignado.RutOperador')                              
        ->select('operador.NombreOperador','detalletipoturno.AbreviacionTurno','turnoasignado.NumeroSemanaAno','turnoasignado.DiaSemana')
        ->where(function ($query) use ($request)  {
        $IdAdministrador=Auth::id();    
         $numberWeek=$request->input('NumeroSemanaAno');
        $query->where('operador.RutOperador', '=', $IdAdministrador)  
        ->where('turnoasignado.NumeroSemanaAno','=',$numberWeek);                     })
                    
       ->orderBy('turnoasignado.NumeroSemanaAno', 'ASC')
        ->orderByRaw(DB::raw("FIELD(turnoasignado.DiaSemana, 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo')"))
        ->get();

        
       return view('operador/menuoperador/menuturnos/revisarturnos',
        compact('turnoOperadorlunes'));     
        


      }


      public function imprimirturnos(  ){
        



        $pdf = PDF::loadView('operador/menuoperador/menuturnos/revisarturnos');
             return $pdf->dowload('turnos.pdf');


       // $pdf=App::make(dompdf.wrapper);
       // $pdf->loadHTML($this->buscarturnos);

      }







}
