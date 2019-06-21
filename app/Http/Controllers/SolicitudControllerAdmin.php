<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
Use app\Operador; 
use App\Solicitud;
use Illuminate\Support\Facades\DB;
use Mail;
use Carbon\Carbon;

class SolicitudControllerAdmin extends Controller
{
    public function revisarSolicitudAdmin()
    {
      
        $admin=Auth::id();                                                    
        $listadoSolicitud=DB::table('solicitud') 
        ->where('RutAdministrador','=',$admin)
        ->orderBy('created_at', 'desc')
        ->get();

        
        return view('administrador.menuadministrador.menusolicitudes.revisarsolicitud', compact('listadoSolicitud'));
   


    }

                            public function aprobarSolicitud(Request $request){

                                

                                $estadoSolicitud='Aprobado';
                                $RutAdministrador=Auth::id();  

                                $idSolicitud=$request->idSolicitud;
                                $RutOperador=$request->RutOperador;
                                $created_at=$request->created_at;
                                $correoAdministrador=Auth::user()->mail;
                                $tipoSolicitud=$request->TipoSolicitud;
                                $nombreAdmin=Auth::user()->name;
                                $data2=array(    
                                    'EstadoSolicitud'=>$estadoSolicitud
                                );




                                Solicitud::where('RutOperador', $RutOperador)
                                -> where('RutAdministrador', $RutAdministrador) 
                                ->where('created_at', $created_at) 
                               // ->where('DiaSemana', $DiaSemana) 
                                ->update($data2); 


                                $admin=Auth::id();                                                    
                                $listadoSolicitud=DB::table('solicitud') 
                                ->where('RutAdministrador','=',$admin)
                                ->orderBy('created_at', 'desc')
                                ->get();
                        

                                $nombreOperador=DB::table('operador')                                                                  
                               // ->join('operador', 'administrador.RutAdministrador','=','operador.IdAdministrador') 
                                 ->where('RutOperador','=',$RutOperador)
                                //  ->select('email') 
                               ->value('NombreOperador');

                               $correoOperador=DB::table('operador')                                                                  
                               // ->join('operador', 'administrador.RutAdministrador','=','operador.IdAdministrador') 
                                 ->where('RutOperador','=',$RutOperador)
                                //  ->select('email') 
                               ->value('Correo');

                                $this->notificarEstadoSolicitud($correoOperador,$nombreOperador,$tipoSolicitud,$nombreAdmin,$estadoSolicitud,$idSolicitud);
                                return view('administrador.menuadministrador.menusolicitudes.revisarsolicitud', compact('listadoSolicitud'))->with('success','Solicitud Aprobada Correctamente ');

 
                                



                            }




                            public function rechazarSolicitud(Request $request){

                                

                                $estadoSolicitud='Rechazado';
                                $RutAdministrador=Auth::id();  

                                $RutOperador=$request->RutOperador;
                                $created_at=$request->created_at;
                                $correoAdministrador=Auth::user()->mail;
                                $tipoSolicitud=$request->TipoSolicitud;
                                $nombreAdmin=Auth::user()->name;
                                $data2=array(    
                                    'EstadoSolicitud'=>$estadoSolicitud
                                );




                                Solicitud::where('RutOperador', $RutOperador)
                                -> where('RutAdministrador', $RutAdministrador) 
                                ->where('created_at', $created_at) 
                               // ->where('DiaSemana', $DiaSemana) 
                                ->update($data2); 


                                $admin=Auth::id();                                                    
                                $listadoSolicitud=DB::table('solicitud') 
                                ->where('RutAdministrador','=',$admin)
                                ->orderBy('created_at', 'desc')
                                ->get();
                        

                                $nombreOperador=DB::table('operador')                                                                  
                               // ->join('operador', 'administrador.RutAdministrador','=','operador.IdAdministrador') 
                                 ->where('RutOperador','=',$RutOperador)
                                //  ->select('email') 
                               ->value('NombreOperador');

                               $correoOperador=DB::table('operador')                                                                  
                               // ->join('operador', 'administrador.RutAdministrador','=','operador.IdAdministrador') 
                                 ->where('RutOperador','=',$RutOperador)
                                //  ->select('email') 
                               ->value('Correo');

                                $this->notificarEstadoSolicitud($correoOperador,$nombreOperador,$tipoSolicitud,$nombreAdmin,$estadoSolicitud,$idSolicitud);
                                return view('administrador.menuadministrador.menusolicitudes.revisarsolicitud', compact('listadoSolicitud'))->with('success','Solicitud Aprobada Correctamente ');

 
                                



                            }


                           









    function notificarEstadoSolicitud($correoOperador,$nombreOperador,$tipoSolicitud,$nombreAdmin,$estadoSolicitud,$idSolicitud){    

        $data = array(
          // 'name' => "Turno Semana ",
          'nombreadmin' => "$nombreAdmin",     
          'estadoSolicitud' => "$estadoSolicitud",                                          
          'nombreOperador' => "$nombreOperador",  
            'tipoSolicitud' => "$tipoSolicitud",                           
                      
        );                              
     // $correo=$data["correooperador"];
     // $operadorName=$data["nombretrabajador"];
    //  $semana=$data["semana"];
    $correo=$correoOperador;

    //dd($correoAdministrador,$nombreOperador,$tipoSolicitud);
        Mail::send('partials.notificacionsolicitud', $data,function ($message)use ($correoOperador,$nombreOperador,$tipoSolicitud,$nombreAdmin,$idSolicitud) {                                      
          
            //dd($correoAdministrador,$nombreOperador,$tipoSolicitud);
                                            try     {

                                              $message->from('adturnmail@gmail.com', 'Gestor de turnos Adturn.');                      
                                              $message->to($correoOperador);  
                                              $message->subject('Nueva Notificacion en base a su solicitud con id'.$idSolicitud); 


                                                                    /* Envio del Email */   
                                                                }
                                                                catch (\Exception $e)
                                                                {
                                                                    echo("Error al enviar el correo");
                                                                }    
        });                
               
      }




}
