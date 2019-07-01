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
use App\Http\Requests\ValidarSolicitud;


class SolicitudController extends Controller
{
    public function index()
    {
      
        return view('operador.menuoperador.menusolicitudes.indexsolicitud');


    }

                                            public function realizarSolicitud(ValidarSolicitud $request){


                                              try {
                                                
                                                $operador=Auth::id();

                                                $rutAdministrador=DB::table('operador')                                                                  
                                                     //  ->select('IdAdministrador') 
                                                    ->where('RutOperador','=',$operador)
                                                  //  ->pluck('IdAdministrador');
                                                  ->value('IdAdministrador');   
            
                                                           
            
            
                                                  $correoAdministrador=DB::table('administrador')                                                                  
                                                  ->join('operador', 'administrador.RutAdministrador','=','operador.IdAdministrador') 
                                                   ->where('RutOperador','=',$operador)
                                                  //  ->select('email') 
                                                 ->value('email');
                                                  //->get();
                                                  
                                                  $nombreOperador=$request->NombreOperador;
            
                                                  $nombreAdmin=DB::table('administrador')                                                                  
                                                  ->join('operador', 'administrador.RutAdministrador','=','operador.IdAdministrador') 
                                                   ->where('RutOperador','=',$operador)
                                                  //  ->select('email') 
                                                 ->value('name');
                                                 /*
                                                 $validatedData = $request->validate([
                                                  'tipoDeSolicitud' => 'required|regex:DiaLibre|Vacacion|DiaAdministrativo|InformarLicencia|InformarAusencia|confirmed',
                                                  'rutAdministrador' => 'required',
                                                  'operador' => 'required',
                                                  'LocalizacionOperador' => 'required',


                                                   ]);     */
                          
            
                                                    $solicitud= new Solicitud;
                                                   // $solicitud->TipoSolicitud=$request->tipoDeSolicitud;
                                                    $solicitud->RutAdministrador=$rutAdministrador;
                                                    $solicitud->RutOperador=$operador;
                                                    $solicitud->TipoSolicitud=$request->tipoDeSolicitud;
                                                    $solicitud->LocalizacionOperador=$request->LocalizacionOperador;
                                                    $solicitud->DesdeSolicitud=$request->desdeSolicitud;
                                                    $solicitud->HastaSolicitud=$request->hastaSolicitud;
                                                    $solicitud->Comentario=$request->Comentario;
                                                    $solicitud->save();  
                                                   
                                                    $tipoSolicitud=$request->tipoDeSolicitud;
                                                    $this->notificarSolicitud($correoAdministrador,$nombreOperador,$tipoSolicitud,$nombreAdmin);
                                                    

                                                    return redirect()->back()->with('success', 'Solicitud Realizada Correctamente .'); 
                                                 //   return view('operador.menuoperador.menusolicitudes.indexsolicitud')->with('success','Solicitud Realizada Correctamente ');
            



                                                
                                              } catch (\Throwable $th) {
                                                return redirect()->back()->with('error', 'Error al realizar la solicitud.'); 
                                                

                                              }
                                              
                                                       
                              
                                            }




                                            function notificarSolicitud($correoAdministrador,$nombreOperador,$tipoSolicitud,$nombreAdmin){    
                                                $data = array(
                                                  // 'name' => "Turno Semana ",
                                                  'nombreAdmin' => "$nombreAdmin",     
                                                                                              
                                                  'nombreOperador' => "$nombreOperador",  
                                                    'tiposSolicitud' => "$tipoSolicitud",                           
                                                              
                                                );                              
                                             // $correo=$data["correooperador"];
                                             // $operadorName=$data["nombretrabajador"];
                                            //  $semana=$data["semana"];
                                            $correo=$correoAdministrador;

                                            //dd($correoAdministrador,$nombreOperador,$tipoSolicitud);
                                                Mail::send('partialsoperador.notificacionsolicitud', $data,function ($message)use ($correoAdministrador,$nombreOperador,$tipoSolicitud) {                                      
                                                  
                                                    //dd($correoAdministrador,$nombreOperador,$tipoSolicitud);
                                                                                    try     {
                  
                                                                                      $message->from('adturnmail@gmail.com', 'Gestor de turnos Adturn.');                      
                                                                                      $message->to($correoAdministrador);  
                                                                                      $message->subject('Solicitud realizada por '.$nombreOperador.'de tipo '.$tipoSolicitud); 
                  
                  
                                                                                                            /* Envio del Email */   
                                                                                                        }
                                                                                                        catch (\Exception $e)
                                                                                                        {
                                                                                                            echo("Error al enviar el correo");
                                                                                                        }    
                                                });                
                                                       
                                              }



                                              public function revisarSolicitud()
                                              {
                                                


                                                $operador=Auth::id();                                                    
                                                $listadoSolicitud=DB::table('solicitud') 
                                                ->where('RutOperador','=',$operador)
                                                ->orderBy('created_at', 'desc')
                                                ->get();

                                                
                                                return view('operador.menuoperador.menusolicitudes.revisarestado', compact('listadoSolicitud'));

                                                  
                                          
                                              }

                                     



}
