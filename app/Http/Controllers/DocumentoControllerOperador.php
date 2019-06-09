<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Documento;
use Illuminate\Support\Facades\Auth;
use Validator,Redirect,Response,File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class DocumentoControllerOperador extends Controller
{
    public function index(Request $request)
    {
      

                $detalledocumentos=DB::table('operador')
                                        ->join('administrador', 'operador.IdAdministrador', '=', 'administrador.RutAdministrador') 
                                        ->join('documento', 'administrador.RutAdministrador', '=', 'documento.IdAdministrador')                              
                                        ->select('documento.NombreDocumento','documento.Descripcion','documento.created_at') 
                                        ->get();

     //   $operador=Auth::id();
     //   $detalledocumentos = Documento::where('IdAdministrador', $operador)->paginate(10);
     //  {{ $detalledocumentos->links() }}
        return view('operador/menuoperador/menudocumentos/listadodocumentos', compact('detalledocumentos'));
   
     }


}
