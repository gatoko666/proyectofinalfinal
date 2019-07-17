<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Operador;
use App\TipoDeTurno;
use App\DetalleTurnoAsignado;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Mail;
 


class TurnosController extends Controller
{
    

    public function index(Request $request)
    {
      
        $operador=Auth::id();
        $operadorexterno=Auth::id();
        $detalleoperador = Operador::where('IdAdministrador', $operador)->where('estadoop', '0')-> paginate(100);
        $detalletiposdeturnos = TipoDeTurno::where('IdAdministrador', $operador)-> paginate(100);  
        // return view('administrador/menuadministrador/menuturnos.generarturnos', compact('detalleoperador','detalletiposdeturnos',));






         return view('administrador/menuadministrador/menuturnos.generarturnos')->with(compact('detalleoperador','detalletiposdeturnos'));
         
         
                
    }



                            public function store(Request $request){

                            //dd(   $request->all()       );

                    
                              $numberWeek=$request->NumeroSemanaAno;
                              $turnoOperadorlunes=DB::table('detalletipoturno')
                              ->join('turnoasignado', 'detalletipoturno.IdDetalleTipoTurno', '=', 'turnoasignado.IdDetalleTipoTurno') 
                            ->join('operador', 'operador.RutOperador', '=', 'turnoasignado.RutOperador')                              
                            ->select('operador.NombreOperador','operador.RutOperador','detalletipoturno.AbreviacionTurno','turnoasignado.NumeroSemanaAno','turnoasignado.DiaSemana')
                            ->where(function ($query) use ($request)  {
                              $IdAdministrador=Auth::id();    
                               $numberWeek=$request->input('NumeroSemanaAno');
                              $query->where('operador.IdAdministrador', '=', $IdAdministrador)  
                              ->where('turnoasignado.NumeroSemanaAno','=',$numberWeek);                          })
                                          
                           //  ->orderBy('turnoasignado.NumeroSemanaAno', 'ASC')
                            //  ->orderByRaw(DB::raw("FIELD(turnoasignado.DiaSemana, 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo')"))
                              ->value('operador.NombreOperador');   
                     //dd(   $turnoOperadorlunes       ); 
                     

                  

                                if(!($turnoOperadorlunes)){
                                  try {                                 
                                    if(count($request->NombreTrabajadori) > 0)
                                {
                                foreach($request->NombreTrabajadori as $trabajador=>$t){   

                                  $Admin=Auth::user()->name;
                                  $NumernoSemanaAno=$request->NumeroSemanaAno;
                                  $NombreTrabajador=$request->NombreTrabajadori[$trabajador];
                                  $CorreoOp=$request->CorreoTrabajadori[$trabajador];  
                                  $RutOperador=$request->RutTrabajadori[$trabajador];   
                                    $data2=array(                                           
                                        'RutOperador'=>$request->RutTrabajadori[$trabajador],
                                        'NumeroSemanaAno'=>$request->NumeroSemanaAno,
                                        'IdDetalleTipoTurno'=>$request->nombreturnol[$trabajador] ,
                                         'DiaSemana'=>$request->DiaSemanal,   
                                         'created_at'=>Carbon::now(),                                                                 
                                    );          
                                    DetalleTurnoAsignado::insert($data2);  
                                    $data2=array(                                           
                                        'RutOperador'=>$request->RutTrabajadori[$trabajador],
                                        'NumeroSemanaAno'=>$request->NumeroSemanaAno,
                                        'IdDetalleTipoTurno'=>$request->nombreturnom[$trabajador] ,
                                         'DiaSemana'=>$request->DiaSemanam, 
                                         'created_at'=>Carbon::now(),    
                                    );                                         
                                    DetalleTurnoAsignado::insert($data2);  
                                    $data2=array(                                           
                                        'RutOperador'=>$request->RutTrabajadori[$trabajador],
                                        'NumeroSemanaAno'=>$request->NumeroSemanaAno,
                                        'IdDetalleTipoTurno'=>$request->nombreturnomm[$trabajador] ,
                                         'DiaSemana'=>$request->DiaSemanamm,  
                                         'created_at'=>Carbon::now(),   
                                    );                                           
                                    DetalleTurnoAsignado::insert($data2);   
                                    $data2=array(                                           
                                        'RutOperador'=>$request->RutTrabajadori[$trabajador],
                                        'NumeroSemanaAno'=>$request->NumeroSemanaAno,
                                        'IdDetalleTipoTurno'=>$request->nombreturnoj[$trabajador] ,
                                         'DiaSemana'=>$request->DiaSemanaj,     
                                         'created_at'=>Carbon::now(),   
                                    );                                            
                                    DetalleTurnoAsignado::insert($data2);    
                                    $data2=array(    
                                       
                                        'RutOperador'=>$request->RutTrabajadori[$trabajador],
                                        'NumeroSemanaAno'=>$request->NumeroSemanaAno,
                                        'IdDetalleTipoTurno'=>$request->nombreturnov[$trabajador] ,
                                         'DiaSemana'=>$request->DiaSemanav,   
                                         'created_at'=>Carbon::now(),   
                                    );                                            
                                    DetalleTurnoAsignado::insert($data2);    
                                    $data2=array(                                           
                                        'RutOperador'=>$request->RutTrabajadori[$trabajador],
                                        'NumeroSemanaAno'=>$request->NumeroSemanaAno,
                                        'IdDetalleTipoTurno'=>$request->nombreturnos[$trabajador] ,
                                         'DiaSemana'=>$request->DiaSemanas,    
                                         'created_at'=>Carbon::now(),       
                                    );                                            
                                    DetalleTurnoAsignado::insert($data2);    
                                    $data2=array(                                           
                                        'RutOperador'=>$request->RutTrabajadori[$trabajador],
                                        'NumeroSemanaAno'=>$request->NumeroSemanaAno,
                                        'IdDetalleTipoTurno'=>$request->nombreturnod[$trabajador] ,
                                         'DiaSemana'=>$request->DiaSemanad,  
                                         'created_at'=>Carbon::now(),        
                                    );
                                    DetalleTurnoAsignado::insert($data2);             
                                    $this->notificarOperadorTurnos($Admin,$NumernoSemanaAno,$NombreTrabajador,$CorreoOp);                              
                            }                     
                                }             
                                return redirect()->back()->with('success','Turno Insertado correctamente. Notifiación realizada con éxito.');
                                  } catch (\Throwable $th) {
                                    return redirect()->back()->with('error', 'Error al ingresar los turnos.');                            
                                  }
                                  return redirect()->back()->with('error', 'Error al ingresar los turnos.');    
                                }else{
                                  return redirect()->back()->with('error', 'Existe un operador con turnos asignados,favor de editar el turno del operador.'); 
                                }
                     
                        }



                         function notificarOperadorTurnos($Admin,$NumernoSemanaAno,$NombreTrabajador,$CorreoOp){                        
                          $data = array(
                             // 'name' => "Turno Semana ",
                             'nombreadmin' => "$Admin",
                             'semana' => "$NumernoSemanaAno",
                             'nombretrabajador' => "$NombreTrabajador",  
                              'correooperador' => "$CorreoOp",  
                          );      
                        //  $correo=$data->correooperador;
                       //  $correo=var_dump($data["correooperador"]);
                       //  $operadorName=var_dump($data["nombretrabajador"]);
                            $correo=$data["correooperador"];
                            $operadorName=$data["nombretrabajador"];
                            $semana=$data["semana"];
                          Mail::send('partials.tnotificacion', $data,function ($message)use ($correo,$operadorName,$semana) {                                      
                            
                            //$correo=var_dump($data["correooperador"]);                         
                            //dd($correo);
                           // $correo=array_get($correo,'Correo');        
                              
                             try     {
                                          $message->from('adturnmail@gmail.com', 'Gestor de turnos Adturn.');                      
                                          $message->to($correo);  
                                          $message->subject('Turnos de la Semana '.$semana); 
                                            /* Envio del Email */   
                                      }
                             catch (\Exception $e)
                                      {
                                           echo("Error al enviar el correo");
                                       }    
                          });                
                            
                      }





                        public function turnospresentes(Request $request)
                        {        
                              $IdAdministrador=Auth::id(); 
                                     $idoperador=DB::table('operador')
                                    ->where('IdAdministrador', '=',$IdAdministrador )
                                    ->select('NombreOperador','RutOperador')
                                    ->get() ;                                 
                                // abreviacion del detalle de turno
                               $abreviacionturno=DB::table('detalletipoturno')
                                 ->join('turnoasignado', 'detalletipoturno.IdDetalleTipoTurno', '=', 'turnoasignado.IdDetalleTipoTurno') 
                               ->join('operador', 'turnoasignado.RutOperador', '=', 'operador.RutOperador')                              
                               ->select('detalletipoturno.AbreviacionTurno' )
                              //  ->where('operador.RutOperador', $variableasignar)
                                ->get();        
                                $IdAdministrador=Auth::id(); 
                             $turnoOperadorlunes=DB::table('detalletipoturno')
                             ->join('turnoasignado', 'detalletipoturno.IdDetalleTipoTurno', '=', 'turnoasignado.IdDetalleTipoTurno') 
                           ->join('operador', 'operador.RutOperador', '=', 'turnoasignado.RutOperador')                              
                           ->select('operador.NombreOperador','detalletipoturno.AbreviacionTurno','turnoasignado.NumeroSemanaAno','turnoasignado.DiaSemana')
                           //->where('operador.IdAdministrador', $IdAdministrador)
                          // ->Where('turnoasignado.DiaSemana','=','lunes')
                          // ->Where('turnoasignado.NumeroSemanaAno','=','2019-W24')      
                           ->where(function ($query) {
                            $IdAdministrador=Auth::id();   
                            $query->where('operador.IdAdministrador', '=', $IdAdministrador)                       
                                 //   ->where('turnoasignado.DiaSemana', '=', 'lunes')   
                                 ->where('turnoasignado.NumeroSemanaAno','=','2019-W24');                            })
                            //->groupBy('turnoasignado.NumeroSemanaAno')                        
                           ->orderBy('turnoasignado.NumeroSemanaAno', 'ASC')
                            ->orderByRaw(DB::raw("FIELD(turnoasignado.DiaSemana, 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo')"))
                            ->get();
                            //dd($turnoOperador);
                              // ORDER BY turnoasignado.NumeroSemanaAno ASC,
                              //FIELD(turnoasignado.DiaSemana, 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo')
                           return view('administrador/menuadministrador/menuturnos.revisarturnos',
                            compact('turnoOperadorlunes' ));                                
                         //return view('administrador/menuadministrador/menuturnos.revisarturnos', compact('idoperador','abreviacionturno'));
                        // return view('administrador/menuadministrador/menuturnos.revisarturnos');
                    }





                      public function buscarturnos(Request $request ){
                          
                        $numberWeek=$request->NumeroSemanaAno;
                        $turnoOperadorlunes=DB::table('detalletipoturno')
                        ->join('turnoasignado', 'detalletipoturno.IdDetalleTipoTurno', '=', 'turnoasignado.IdDetalleTipoTurno') 
                      ->join('operador', 'operador.RutOperador', '=', 'turnoasignado.RutOperador')                              
                      ->select('operador.estadoop','operador.NombreOperador','operador.RutOperador','detalletipoturno.AbreviacionTurno','turnoasignado.NumeroSemanaAno','turnoasignado.DiaSemana')
                      ->where(function ($query) use ($request)  {
                        $IdAdministrador=Auth::id();    
                         $numberWeek=$request->input('NumeroSemanaAno');
                        $query->where('operador.IdAdministrador', '=', $IdAdministrador)  
                        ->where('turnoasignado.NumeroSemanaAno','=',$numberWeek);                          })
                                    
                       ->orderBy('turnoasignado.NumeroSemanaAno', 'ASC')
                        ->orderByRaw(DB::raw("FIELD(turnoasignado.DiaSemana, 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo')"))
                        ->get();
                        
                       return view('administrador/menuadministrador/menuturnos.revisarturnos',
                        compact('turnoOperadorlunes' ));     
                      }





                      public function editarTurnos(Request $request){

                       // dd(                        $request->all()                          );
                          $numeroSemana=$request->NumeroSemanaAno[0];                          
                          //dd($numeroSemana);
                        $data2=array(                                       
                          'NombreOperador'=>$request->NombreOperador ,
                          'AbreviacionTurno'=>$request->AbreviacionTurno ,
                          'NumeroSemanaAno'=>$request->NumeroSemanaAno  ,
                           'DiaSemana'=>$request->DiaSemana ,                                   
                                                      
                      );
                      $numberWeek=$request->NumeroSemanaAno[0];
                      //dd($numberWeek);
                        $turnoOperadorlunes=DB::table('detalletipoturno')
                        ->join('turnoasignado', 'detalletipoturno.IdDetalleTipoTurno', '=', 'turnoasignado.IdDetalleTipoTurno') 
                      ->join('operador', 'operador.RutOperador', '=', 'turnoasignado.RutOperador')                              
                      ->select('operador.NombreOperador','operador.RutOperador','operador.Correo','detalletipoturno.AbreviacionTurno','detalletipoturno.IdDetalleTipoTurno','turnoasignado.NumeroSemanaAno','turnoasignado.DiaSemana')
                      ->where(function ($query) use ($request)  {
                        $IdAdministrador=Auth::id();    
                         $numberWeek=$request->input('NumeroSemanaAno');
                        $query->where('operador.IdAdministrador', '=', $IdAdministrador)  
                        ->where('turnoasignado.NumeroSemanaAno','=',$numberWeek);                })
                                    
                       ->orderBy('turnoasignado.NumeroSemanaAno', 'ASC')
                        ->orderByRaw(DB::raw("FIELD(turnoasignado.DiaSemana, 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo')"))
                        ->get();
                     
                         

                        $operador=Auth::id();
                        $operadorexterno=Auth::id();
                        $detalleoperador = Operador::where('IdAdministrador', $operador)-> paginate(100);
                        $detalletiposdeturnos = TipoDeTurno::where('IdAdministrador', $operador)-> paginate(100);  

                        
                       
                        return view('administrador/menuadministrador/menuturnos.editarturno', compact('turnoOperadorlunes','detalletiposdeturnos'));

                      }






                      public function actualizarTurnos(Request $request){
                          
                          $DiaSemana=$request->DiaSemana;
                          $NumeroSemanaAno=$request->NumeroSemanaAno; 
                          
                          
                          ///////////////// 

                          $numberWeek=$request->NumeroSemanaAno;
                          $turnoOperadorlunes=DB::table('detalletipoturno')
                          ->join('turnoasignado', 'detalletipoturno.IdDetalleTipoTurno', '=', 'turnoasignado.IdDetalleTipoTurno') 
                        ->join('operador', 'operador.RutOperador', '=', 'turnoasignado.RutOperador')                              
                        ->select('operador.NombreOperador','operador.RutOperador','detalletipoturno.AbreviacionTurno','turnoasignado.NumeroSemanaAno','turnoasignado.DiaSemana')
                        ->where(function ($query) use ($request)  {
                          $IdAdministrador=Auth::id();    
                           $numberWeek=$request->input('NumeroSemanaAno');
                          $query->where('operador.IdAdministrador', '=', $IdAdministrador)  
                          ->where('turnoasignado.NumeroSemanaAno','=',$numberWeek);                          })
                                      
                         ->orderBy('turnoasignado.NumeroSemanaAno', 'ASC')
                          ->orderByRaw(DB::raw("FIELD(turnoasignado.DiaSemana, 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo')"))
                          ->get();
                        
                          ///////////
                          

                            if(($request->NombreTrabajadori))
                            {
                            foreach($request->NombreTrabajadori as $trabajador=>$t){   
                              $Admin=Auth::user()->name;
                              $RutOperador=$request->RutOperador[$trabajador];  
                              $NumeroSemanaAno=$request->NumeroSemanaAno[$trabajador];
                              $DiaSemana=$request->DiaSemana[$trabajador];
                              $AbreviacionTurno=$request->tipodeTurnoCambiar[$trabajador];
                              $NombreTrabajador=$request->NombreTrabajadori[$trabajador];
/*
                              foreach ($request->AbreviacionTurno as $AT) {
                                $Admin=Auth::user()->RutAdministrador;
                                $AbreviacionTurno=$request->AbreviacionTurno;
                                $IdDeTurnoTrabajoa=DB::table('detalletipoturno')
                                ->where('IdAdministrador', $Admin)
                                ->where('AbreviacionTurno', $AbreviacionTurno)                             
                               ->select('IdDetalleTipoTurno')
                                ->get();
                               
                              }*/        
                         //  dd( $IdDeTurnoTrabajo );
                                $data2=array(    
                                    'IdDetalleTipoTurno'=>$request->tipodeTurnoCambiar[$trabajador],
                                  //  'RutOperador'=>$request->RutOperador[$trabajador],
                                  //  'NumeroSemanaAno'=>$request->NumeroSemanaAno[$trabajador],                                   
                               //      'DiaSemana'=>$request->DiaSemana[$trabajador],
                                     //'AbreviacionTurno'=>$request->AbreviacionTurno,                                    
                                     //'AbreviacionTurnoAAsignar'=>$request->tipodeTurnoCambiar, 
                                );    
                              //  $NumeroSemanaAno=$request->NumeroSemanaAno;
                               // $IdDetalleTipoTurnoActual=$request->IdDetalleTipoTurnoActual;
                                // dd( $IdDetalleTipoTurnoActual );
                               // $numberWeek=$request->NumeroSemanaAno[0];
                               //dd( $data2 );
                               $IdDetalleTipoTurnoActual=$request->IdDetalleTipoTurnoActual[$trabajador];


                               DetalleTurnoAsignado::where('IdDetalleTipoTurno', $IdDetalleTipoTurnoActual)
                               -> where('RutOperador', $RutOperador) 
                               ->where('NumeroSemanaAno', $NumeroSemanaAno) 
                               ->where('DiaSemana', $DiaSemana) 
                               ->update($data2); 

                               $CorreoOp=$request->CorreoOp[$trabajador];  


                             //  $this->notificarOperadorTurnosActualizacion($Admin,$NumeroSemanaAno,$NombreTrabajador,$CorreoOp); 
                               

                              //return redirect()->back()->with('success', 'Turnos Actualizados Correctamente.');
                                
                               //$actuaTurno=DB::table('turnoasignado')
                             //  ->where('IdAdministrador', $Admin)
                            //   ->where('AbreviacionTurno', $AbreviacionTurno)                           
                              
                           //    ->get();



                              //  DetalleTurnoAsignado::update($data2);             
                               // $this->notificarOperadorTurnos($Admin,$NumernoSemanaAno,$NombreTrabajador,$CorreoOp);                              
                        }    
                        
                        $this->notificarOperadorTurnosActualizacion($Admin,$NumeroSemanaAno,$NombreTrabajador,$CorreoOp);
                        return redirect('revisarturnos')->with('success','Turnos Actualizados Correctamente.'); 
                      // return view('administrador/menuadministrador/menuturnos.revisarturnos',
                      //  compact('turnoOperadorlunes' ))->with('success', 'Turnos Actualizados Correctamente.'); 

                                       
                            }    else{
                              
                             // return redirect()->back()->with("error","Error al actualizar Turnos.");

                             return redirect('revisarturnos')->with('error','Error al actualizar Turnos.'); 

                             // return view('administrador/menuadministrador/menuturnos.revisarturnos',
                            //  compact('turnoOperadorlunes' ))->with('error', 'Error al actualizar Turnos.'); 

                            }


                           


                          
                          //  return view('administrador/menuadministrador/menuturnos/revisarturnos')->with('success', 'Turnos Actualizados.');




                           




                        //    return redirect()->back()->with('success', 'Turnos Actualizados.');
                       
                   // dd( $data2 );


                   //  return view('administrador/indexadministrador')->with('success', 'Turnos Actualizados.'); 

                  // return view('administrador/menuadministrador/menuturnos.revisarturnos')->with('success', 'Turnos Actualizados.'); 


                      

}




                            function notificarOperadorTurnosActualizacion($Admin,$NumernoSemanaAno,$NombreTrabajador,$CorreoOp){    
                              $data = array(
                                // 'name' => "Turno Semana ",
                                'nombreadmin' => "$Admin",
                                'semana' => "$NumernoSemanaAno",
                                'nombretrabajador' => "$NombreTrabajador",  
                                  'correooperador' => "$CorreoOp",                           
                                            
                              );                              
                            $correo=$data["correooperador"];
                            $operadorName=$data["nombretrabajador"];
                            $semana=$data["semana"];
 
                              Mail::send('partials.tnotificacionupdate', $data,function ($message)use ($correo,$operadorName,$semana) {                                      
                                
                      
                                                                  try     {

                                                                    $message->from('adturnmail@gmail.com', 'Gestor de turnos Adturn.');                      
                                                                    $message->to($correo);  
                                                                    $message->subject('Actualización de turnos de la semana  '.$semana); 


                                                                                          /* Envio del Email */   
                                                                                      }
                                                                                      catch (\Exception $e)
                                                                                      {
                                                                                          echo("Error al enviar el correo");
                                                                                      }    
                              });                
                                     
                            }


}
