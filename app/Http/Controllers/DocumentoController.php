<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Documento;
use Illuminate\Support\Facades\Auth;

class DocumentoController extends Controller
{
 
    public function index(Request $request)
    {
     
        $operador=Auth::id();
        $detalledocumentos = Documento::where('IdAdministrador', $operador)-> paginate(10);
        return view('administrador/menuadministrador/subirdocumentos.listadodocumentos', compact('detalledocumentos'));
   
     }


     public function create(){
        return view('subirdocumentos.indexsubirdocumentos');
    }



}
