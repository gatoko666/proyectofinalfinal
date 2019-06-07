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
        $detalledocumentos = Documento::where('IdAdministrador', $operador)->paginate(10);
        return view('administrador/menuadministrador/menudocumentos/listadodocumentos', compact('detalledocumentos'));
   
     }





     public function create(){
        return view('administrador/menuadministrador/menudocumentos/agregardocumentos');
    }



                            public function store(Request $request) {
                           $operador=Auth::id(); 

                             //$documento=$request->file('file') ;
                                            
                            /*
                             if ($files = $request->file('image')) {
                                $destinationPath = 'public/image/'; // upload path
                                $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                                $files->move($destinationPath, $profileImage);
                                $insert['image'] = "$profileImage";
                             }
                             getClientOriginalExtension

*/                                 // $adjunto = $request->file('userfile');
                                  //  $name= $adjunto->getClientOriginalName();
                                  //  $nombre= time().'_'.$name;

                                $datoDocumento=$request->file('userfile');
                                $datoDocumentoExtension= $datoDocumento->getClientOriginalExtension();
                                $datoDocumentoTime=time();
                                //dd($name);


                              //  $adjunto->storeAs('ss','nani'.'_'.$name);

                                $documento=new Documento; 

                                $documento->NombreDocumento=$request->NombreDocumento; 

                             $document = $request->file('userfile')->storeAs(
                                        'Documentos',$datoDocumentoTime.'_'.                                       
                                        $request->NombreDocumento.'.'. $datoDocumentoExtension);

                                  $nombrearchiv=  $datoDocumentoTime.'_'.                                       
                                        $request->NombreDocumento.'.'. $datoDocumentoExtension;

                           // $path = Storage::putFileAs(
                            //    'Documentos', $request->file('$documento->NombreDocumento'));

                               // $document = $request->file('userfile');
                              //  Storage::putFileAs('Documentos', $document);     

                              //  dd($document);                  
                            $documento->Ruta =$nombrearchiv;                                   
                             $documento->Descripcion=$request->Descripcion;                             
                             $documento->IdAdministrador=Auth::id();
                             $documento->save() ;



                                return redirect('documentos')->with('success','Documento Agregado correctamente.'); 
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



                            
                        








}
