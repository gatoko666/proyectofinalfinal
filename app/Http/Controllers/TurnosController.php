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
        $detalleoperador = Operador::where('IdAdministrador', $operador)-> paginate(100);
        $detalletiposdeturnos = TipoDeTurno::where('IdAdministrador', $operador)-> paginate(100);  
         return view('administrador/menuadministrador/menuturnos.generarturnos', compact('detalleoperador','detalletiposdeturnos',));
                
    }



                            public function store(Request $request){   

                             
               
                    
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
                                $this->notificarOperadorTurnos($Admin,$NumernoSemanaAno,$NombreTrabajador,$CorreoOp);                              
                        }                     
                            }    
                          


                              

                            return redirect()->back()->with('success','Turno Insertado correctamente. Notifiación realizada con éxito.');
                              } catch (\Throwable $th) {
                                return redirect()->back()->with('success', 'Error al ingresar los turnos.');                            
                              }
                              return redirect()->back()->with('success', 'Error al ingresar los turnos.');                            
                        }



                         function notificarOperadorTurnos($Admin,$NumernoSemanaAno,$NombreTrabajador,$CorreoOp){

                          //dd($CorreoOp);

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
                         $correo='pedro@yopmail.com' ;
                         $operadorName=var_dump($data["nombretrabajador"]);

                         // dd($operadorName);


                         // Mail::to($CorreoOp);






                          Mail::send('testmail', $data,function ($message)use ($correo,$operadorName) {                                      
                            
                            //$correo=var_dump($data["correooperador"]);

                         
                            //dd($correo);
                           // $correo=array_get($correo,'Correo');
                           $message->from('adturnmail@gmail.com', 'Gestor de turnos Adturn.'.$operadorName.$correo);                      
                         $message->to($correo);  
                         $message->subject('Turnos de la Semana'.$operadorName.$correo); 

                              
                                                              try     {
                                                                                      /* Envio del Email */   
                                                                                  }
                                                                                  catch (\Exception $e)
                                                                                  {
                                                                                      echo("Error al enviar el correo");
                                                                                  }    
                          });                
                          //return redirect()->back();                 
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
                      ->select('operador.NombreOperador','detalletipoturno.AbreviacionTurno','turnoasignado.NumeroSemanaAno','turnoasignado.DiaSemana')
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














}
