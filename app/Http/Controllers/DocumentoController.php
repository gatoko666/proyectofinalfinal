<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Documento;
use Illuminate\Support\Facades\Auth;
use Validator,Redirect,Response,File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ValidarDocumento;
 



class DocumentoController extends Controller
{
 
    public function index(Request $request)
    {
     
        $operador=Auth::id();
        $detalledocumentos = Documento::where('IdAdministrador', $operador)->paginate(10);
        return view('administrador/menuadministrador/menudocumentos/listadodocumentos', compact('detalledocumentos'));
   
     }





     public function create(){
        return view('administrador/menuadministrador/menudocumentos/agregardocumentos');
    }



                            public function store(ValidarDocumento $request) {
                              try {                                 
                                 $operador=Auth::id();     
                                 $datoDocumento=$request->file('userfile');
                                 $datoDocumentoExtension= $datoDocumento->getClientOriginalExtension();
                                 $datoDocumentoTime=time();
                                 $documento=new Documento;     
                                 $documento->NombreDocumento=$request->NombreDocumento;     
                                 $document = $request->file('userfile')->storeAs(
                                 'Documentos',$datoDocumentoTime.'_'.                                       
                                 $request->NombreDocumento.'.'. $datoDocumentoExtension);
    
                                 $nombrearchiv=  $datoDocumentoTime.'_'.                                       
                                 $request->NombreDocumento.'.'. $datoDocumentoExtension;   
                                 $documento->Ruta =$nombrearchiv;                                   
                                 $documento->Descripcion=$request->Descripcion;                             
                                 $documento->IdAdministrador=Auth::id();
                                 $documento->save() ;   
                                    return redirect('documentos')->with('success','Documento Agregado correctamente.'); 
                              } catch (\Throwable $th) {
                                 return redirect('documentos')->with('error','Problema al realizar la acción requerida.'); 
                              }                           
                            }




                            public function descargar($id)
                            {
                               // $mime= Storage::mimeType('ss/nani_1.jpg');
                                //$archivo = Storage::get('ss/nani_1.jpg');
                                
                               // $nombreDocumento=$request->NombreDocumento;
                            //   $fechaSubida=$request->created_at;
                                 

                                 
                                 
                                    $idDocumento=Documento::where('IdDocumento', $id)->first();

                                 //  dd($idDocumento);

                                    return Storage::download('Documentos/'.$idDocumento->Ruta);

                                //return Storage::download();
                                
                                //return response()->make($archivo, 200, ['content-type' => $mime]);
                            }


                            public function eliminarArchivo($id){

                                $idDocumento=Documento::where('IdDocumento', $id)->first();                            

                                 Storage::delete('Documentos/'.$idDocumento->Ruta);
                                 Documento::where('IdDocumento',$id)->delete();

                                return redirect('documentos')->with('success','Documento Eliminado correctamente.'); 

                            }


                            public function descargarOperador($id)
                            {
                           
                                 

                                 
                                 
                                    $idDocumento=Documento::where('IdDocumento', $id)->first();                                

                                    return Storage::download('Documentos/'.$idDocumento->Ruta);

                             
                            }



                           








}
