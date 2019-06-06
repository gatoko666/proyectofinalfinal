<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Operador;
use App\TipoDeTurno;
use App\DetalleTurnoAsignado;

use Illuminate\Support\Facades\Auth;

class TurnosController extends Controller
{
    

    public function index(Request $request)
    {
      
        $operador=Auth::id();
        $operadorexterno=Auth::id();
        $detalleoperador = Operador::where('IdAdministrador', $operador)-> paginate(100);
        $detalletiposdeturnos = TipoDeTurno::where('IdAdministrador', $operador)-> paginate(100);  
         return view('administrador/menuadministrador/menuturnos.generarturnos', compact('detalleoperador','detalletiposdeturnos',));
                
    }



                            public function store(Request $request){   
                                //$operador=Auth::id();     
                            //$iddetalletipoturno=TiposDeTurnos::where('IdAdministrador', $operador) ;                         
                           // $IdAdministrador=Auth::id();          
                           //dd( $request->all()   );

/*
                           $rutOperador=$request->RutTrabajador;
                           $NumeroSemanaAno=$request->NumeroSemanaAno;
                           $IdDetalleTipoTurno=$request->IdDetalleTipoTurno;
                           $DiaSemanal=$request->DiaSemanal;
                           $DiaSemanam=$request->DiaSemanam;
                           $DiaSemanamm=$request->DiaSemanamm;
                           $DiaSemanaj=$request->DiaSemanaj;
                           $DiaSemanav=$request->DiaSemanav;
                           $DiaSemanas=$request->DiaSemanas;
                           $DiaSemanad=$request->DiaSemanad;
*/



                           
                            if(count($request->NombreTrabajadori) > 0)
                            {
                            foreach($request->NombreTrabajadori as $trabajador=>$t){
                                 

                                $data2=array(    
                                   
                                    'RutOperador'=>$request->RutTrabajadori[$trabajador],
                                    'NumeroSemanaAno'=>$request->NumeroSemanaAno,
                                    'IdDetalleTipoTurno'=>$request->nombreturnol[$trabajador] ,
                                     'DiaSemana'=>$request->DiaSemanal[$trabajador],
                                     
                                                                
                                );    
                                    
                                DetalleTurnoAsignado::insert($data2);

                                $data2=array(    
                                   
                                    'RutOperador'=>$request->RutTrabajadori[$trabajador],
                                    'NumeroSemanaAno'=>$request->NumeroSemanaAno,
                                    'IdDetalleTipoTurno'=>$request->nombreturnol[$trabajador] ,
                                     'DiaSemana'=>$request->DiaSemanam[$trabajador],
                                     
                                                                
                                );    
                                    
                                DetalleTurnoAsignado::insert($data2);



                                  /*
                                $detalleturnoasignado= new DetalleTurnoAsignado;
                                $detalleturnoasignado=$rutOperador[$trabajador];
                                $detalleturnoasignado=$NumeroSemanaAno;
                                $detalleturnoasignado=$IdDetalleTipoTurno[$trabajador];
                                $detalleturnoasignado=$DiaSemanal;
                               $detalleturnoasignado->save();  
                              
                            
                          DetalleTurnoAsignado::insert($data2); 

                                $detalleturnoasignado= new DetalleTurnoAsignado;
                                $detalleturnoasignado=$rutOperador[$trabajador];
                                $detalleturnoasignado=$NumeroSemanaAno;
                                $detalleturnoasignado=$IdDetalleTipoTurno[$trabajador];                              
                                $detalleturnoasignado=$DiaSemanam;
                                $detalleturnoasignado->save();  
*/
                                       // dd($data2); 
                               // DetalleTurnoAsignado::insert($data2); 
                                    
                        }
                            }                  

                            return redirect()->back()->with('success','data insert successfully');
                        }















}
