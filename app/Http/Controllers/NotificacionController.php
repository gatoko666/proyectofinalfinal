<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    
    
    public function index(Request $request)
    {
       
        return view('administrador/menuadministrador/menunotificaciones/indexnotificaciones');

     }


     public function indexNotificacionOperador(Request $request)
     {
        
         return view('operador/menuoperador/menunotificaciones/indexnotificaciones');
 
      }







     



}
