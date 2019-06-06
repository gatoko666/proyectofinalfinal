<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Operador;
use App\TipoDeTurno;
use App\DetalleTurnoAsignado;
use Illuminate\Support\Facades\DB;
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
                    

                           
                            if(count($request->NombreTrabajadori) > 0)
                            {
                            foreach($request->NombreTrabajadori as $trabajador=>$t){
                                 

                                $data2=array(    
                                   
                                    'RutOperador'=>$request->RutTrabajadori[$trabajador],
                                    'NumeroSemanaAno'=>$request->NumeroSemanaAno,
                                    'IdDetalleTipoTurno'=>$request->nombreturnol[$trabajador] ,
                                     'DiaSemana'=>$request->DiaSemanal,
                                     
                                                                
                                );    
                                    
                                DetalleTurnoAsignado::insert($data2);


                                $data2=array(    
                                   
                                    'RutOperador'=>$request->RutTrabajadori[$trabajador],
                                    'NumeroSemanaAno'=>$request->NumeroSemanaAno,
                                    'IdDetalleTipoTurno'=>$request->nombreturnol[$trabajador] ,
                                     'DiaSemana'=>$request->DiaSemanam,
                                     
                                                                
                                );    
                                    
                                DetalleTurnoAsignado::insert($data2);


                                $data2=array(    
                                   
                                    'RutOperador'=>$request->RutTrabajadori[$trabajador],
                                    'NumeroSemanaAno'=>$request->NumeroSemanaAno,
                                    'IdDetalleTipoTurno'=>$request->nombreturnol[$trabajador] ,
                                     'DiaSemana'=>$request->DiaSemanamm,
                                     
                                                                
                                );    
                                    
                                DetalleTurnoAsignado::insert($data2);


                                $data2=array(    
                                   
                                    'RutOperador'=>$request->RutTrabajadori[$trabajador],
                                    'NumeroSemanaAno'=>$request->NumeroSemanaAno,
                                    'IdDetalleTipoTurno'=>$request->nombreturnol[$trabajador] ,
                                     'DiaSemana'=>$request->DiaSemanaj,
                                     
                                                                
                                );    
                                    
                                DetalleTurnoAsignado::insert($data2);

                                $data2=array(    
                                   
                                    'RutOperador'=>$request->RutTrabajadori[$trabajador],
                                    'NumeroSemanaAno'=>$request->NumeroSemanaAno,
                                    'IdDetalleTipoTurno'=>$request->nombreturnol[$trabajador] ,
                                     'DiaSemana'=>$request->DiaSemanav,
                                     
                                                                
                                );    
                                    
                                DetalleTurnoAsignado::insert($data2);

                                $data2=array(    
                                   
                                    'RutOperador'=>$request->RutTrabajadori[$trabajador],
                                    'NumeroSemanaAno'=>$request->NumeroSemanaAno,
                                    'IdDetalleTipoTurno'=>$request->nombreturnol[$trabajador] ,
                                     'DiaSemana'=>$request->DiaSemanas,
                                     
                                                                
                                );    
                                    
                                DetalleTurnoAsignado::insert($data2);

                                $data2=array(    
                                   
                                    'RutOperador'=>$request->RutTrabajadori[$trabajador],
                                    'NumeroSemanaAno'=>$request->NumeroSemanaAno,
                                    'IdDetalleTipoTurno'=>$request->nombreturnol[$trabajador] ,
                                     'DiaSemana'=>$request->DiaSemanad,
                                     
                                                                
                                );    
                                    
                                DetalleTurnoAsignado::insert($data2);
                                 
                        }
                            }                  

                            return redirect()->back()->with('success','Turno Insertado correctamente');
                        }






                        public function turnospresentes(Request $request)
                        {
 
                         //   $request->user()->authorizeRoles([ 'admin']);  

                       //  $IdAAdministrador=Auth::id();
 
                      //  $operadorpresente =DB::table('operador')
//->join('users', 'operador.IdAdministrador', '=', 'users.id')                          
                     //   ->where('IdAdministrador', '=',$IdAAdministrador )
                     //   ->select('NombreOperador')
                  //      ->get() ;
                 
                           //    $turnospresentes = TurnoRegistroAsignado::where('IdAdministrador',   $IdAAdministrador  )-> paginate(100);
  
                       //  return view('administrador/menuadministrador/menuturnos.revisarturnos', compact('turnospresentes','operadorpresente'));

                              $IdAdministrador=Auth::id();

                                    $idoperador=DB::table('operador')
                                    ->where('IdAdministrador', '=',$IdAdministrador )
                                    ->select('NombreOperador')
                                    ->get() ;

                                   
                                $diadelasemana=DB::table('turnoasignado')
                                ->join('operador', 'turnoasignado.RutOperador', '=', 'operador.RutOperador')                              
                                ->select('DiaSemana' )
                                ->get();
                                 
                                $variableasignar=$request->RutTrabajadori;

 
                                $abreviacionturno=DB::table('detalletipoturno')
                                ->join('turnoasignado', 'detalletipoturno.IdDetalleTipoTurno', '=', 'turnoasignado.IdDetalleTipoTurno') 
                                ->join('operador', 'turnoasignado.RutOperador', '=', 'operador.RutOperador')                              
                                ->select('detalletipoturno.AbreviacionTurno' )
                               // ->where('operador.RutOperador', $variableasignar)
                                ->get();

  
                                //dd($diadelasemana);


                            
                         return view('administrador/menuadministrador/menuturnos.revisarturnos', compact('idoperador','diadelasemana','abreviacionturno'));
                    }




















}
