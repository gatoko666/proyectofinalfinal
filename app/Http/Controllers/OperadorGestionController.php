<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Operador;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Freshwork\ChileanBundle\Rut;
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

                 public function store(Request $request)
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
                         $operador->RutOperador=Rut::parse($request->RutOperador)->number(); 
                         $operador->LocalizacionOperador=$request->LocalizacionOperador;                              
                         
                         $operador->save();                    

                        } catch (\Exception   $exception) {
                            return redirect('administracionoperador')->with('warning', 'Error al ingresar nuevo usuario');
                            return redirect('/')->with('warning', 'Error al ingresar nuevo usuario');
                        }
                                      
                                         
                     return redirect('administracionoperador')->with('success','Operador Agregado correctamente');
                                  
                 }



                 public function edit($IdOperador)
                 {                     
                    $operador = Operador::findOrFail($IdOperador);             
                    return view('administrador.menuadministrador.administracionoperador.editaroperador', compact('operador'));             
                 }
                 

                 public function update(Request $request,  $RutOperador)
                 {       
                   
                     $validatedData = $request->validate([
                         'NombreOperador' => 'required|max:40',                               
                         'Correo' => 'required|email',
                         'TelefonoOperador' => 'required|max:10',
                         'LocalizacionOperador'  => 'required|max:10',
                     ]);

                   //  dd($validatedData);
                     Operador::where('RutOperador', $RutOperador)->update($validatedData);
                     return redirect('administracionoperador')->with('success', 'Operador  actualizado correctamente');
                       }

                       


                       public function destroy($RutOperador)
                       {
                         Operador::where('RutOperador',$RutOperador)->delete();                   
                           return redirect('administracionoperador')->with('success','Operador eliminado correctamente');       

                       }



















}
