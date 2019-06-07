<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Documento;
use Illuminate\Support\Facades\Auth;
use Validator,Redirect,Response,File;
use Illuminate\Support\Facades\Storage;


class DocumentoController extends Controller
{
 
    public function index(Request $request)
    {
     
        $operador=Auth::id();
        $detalledocumentos = Documento::where('IdAdministrador', $operador)-> paginate(10);
        return view('administrador/menuadministrador/menudocumentos/listadodocumentos', compact('detalledocumentos'));
   
     }





     public function create(){
        return view('administrador/menuadministrador/menudocumentos/agregardocumentos');
    }



                            public function store(Request $request) {
                                $operador=Auth::id(); 

                           
 



                             //$documento=$request->file('file') ;
                             $documento=new Documento; 
                             $documento->NombreDocumento=$request->NombreDocumento;                         
                            /*
                             if ($files = $request->file('image')) {
                                $destinationPath = 'public/image/'; // upload path
                                $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                                $files->move($destinationPath, $profileImage);
                                $insert['image'] = "$profileImage";
                             }
                             
*/
                                $document = $request->file('userfile');
                                Storage::put('avatars/1', $document);     
                      

                                 //   $documento->Ruta = Storage::disk($request->Archivo) -> put($Ruta, file_get_contents($img -> getRealPath()));;
                                   


                             $documento->Descripcion=$request->Descripcion;                             
                             $documento->IdAdministrador=Auth::id();
                             $documento->save() ;



                                return redirect('documentos')->with('success','Documento Agregado correctamente.'); 
                            }













}
