<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Operador;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Freshwork\ChileanBundle\Rut;
use Illuminate\Support\Facades\Crypt;
use Mail;
use Validator;
use App\Http\Requests\ValidarRegistrarOperador;


class OperadorGestionController extends Controller
{
 //Almacenaje del Operador


 public function index(Request $request)
 {
 // $request->user()->authorizeRoles([ 'admin']);
     $operador=Auth::id();
     $detalleoperador = Operador::where('IdAdministrador', $operador)-> paginate(100);
              
                         return view('administrador.menuadministrador.administracionoperador.generaoperador', compact('detalleoperador'));                       
                 }

                 public function store(ValidarRegistrarOperador $request)
                 {                     
                     try {
                         $operador= new Operador;
                         $operador->NombreOperador=$request->NombreOperador;                                
                         $operador->RutOperador=$request->RutOperador;      
                         $operador->Correo=$request->Correo;
                         $operador->TelefonoOperador=$request->TelefonoOperador;                               
                         $operador->FechaAltaOperador=now();
                         $operador->Password=Hash::make($request->Password);
                         $operador->IdAdministrador=Auth::id();
                         $operador->RutOperador=Rut::parse($request->RutOperador)->fix()->format(); 
                         $operador->LocalizacionOperador=$request->LocalizacionOperador;   
                         $operador->estadoop=$request->estadoOperador;   
                         $operador->save();            
                             

                         $Correo=$request->Correo;
                         $FechaAltaOperador=now();
                         $NombreOperador=$request->NombreOperador;


                         $this->notificarOperadorTurnosActualizacion($Correo,$FechaAltaOperador,$NombreOperador);
                        } catch (\Exception   $exception) {
                            return redirect('administracionoperador')->with('warning', 'Error al ingresar nuevo usuario');
                           // return redirect('/')->with('warning', 'Error al ingresar nuevo usuario');
                        }
                                
                        

                         
                     return redirect('administracionoperador')->with('success','Operador Agregado correctamente');
                                  
                 }



                 public function edit($IdOperador)
                 {                     

                  $IdOperador =  Crypt::decrypt($IdOperador);
  
 

                    $operador = Operador::findOrFail($IdOperador);             
                    return view('administrador.menuadministrador.administracionoperador.editaroperador', compact('operador'));             
                 }
                 

                 public function editarOperador(Request $request){

                   // dd(                  $request->all()                  );

                  $IdOperador=$request->RutOperador;  
                  $IdAdministrador=$request->IdAdministrador;  
                   
                  $operador = Operador::findOrFail($IdOperador);
                  //$operador = Operador::where('RutOperador',$IdOperador) ;

              //    dd(                  $operador                 );    

                // return view('administrador.menuadministrador.administracionoperador.editaroperador', compact('operador')); 
                 return view('email', compact('operador')); 
              //  return redirect('administrador.menuadministrador.administracionoperador.editaroperador', compact('operador'));

                }
                  

                 public function update(Request $request,  $RutOperador)
                 {       
                  
                     $validatedData = $request->validate([
                         'NombreOperador' => 'required|max:40',                               
                         'Correo' => 'required|email',
                         'TelefonoOperador' => 'required|max:20',
                         'estadoop' => 'required|max:1',
                         'LocalizacionOperador'  => 'required|max:15',
                     ]);

                     //dd(
                   //   $validatedData
                   //   );


                   //  dd($validatedData);
                     Operador::where('RutOperador', $RutOperador)->update($validatedData);
                     return redirect('administracionoperador')->with('success', 'Operador  actualizado correctamente');
                       }

                       


                       public function destroy($RutOperador)
                       {


                        try {
                          Operador::where('RutOperador',$RutOperador)->delete();    
                          return redirect('administracionoperador')->with('success','Operador eliminado correctamente');   
                        } catch (\Throwable $th) {
                          return redirect('administracionoperador')->with('warning','No se puede eliminar. Operador con turnos asignados.'); 
                        }

 
                       }






                       function notificarOperadorTurnosActualizacion($Correo,$FechaAltaOperador,$NombreOperador){    
                        $data = array(
                          // 'name' => "Turno Semana ",
                         // 'nombreadmin' => "$Admin",
                          'nombreoperador' => "$NombreOperador",
                          'fechaalta' => "$FechaAltaOperador",  
                            'correooperador' => "$Correo",                           
                                      
                        );                              
                      $correo=$data["correooperador"];
                      $operadorName=$data["nombreoperador"];
                      $fechaAlta=$data["fechaalta"];

                        Mail::send('partials.notifigeneracionop', $data,function ($message)use ($correo,$operadorName,$fechaAlta) {                                      
                          
                
                                                            try     {

                                                              $message->from('adturnmail@gmail.com', 'Gestor de turnos Adturn.');                      
                                                              $message->to($correo);  
                                                              $message->subject('Generación de Usuario'); 


                                                                                    /* Envio del Email */   
                                                                                }
                                                                                catch (\Exception $e)
                                                                                {
                                                                                    echo("Error al enviar el correo");
                                                                                }    
                        });                
                               
                      }














}
