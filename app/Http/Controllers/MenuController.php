<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Freshwork\ChileanBundle\Rut;


class MenuController extends Controller
{
    

    public function indexOperador()
    {
        return view('operador.indexoperador');
    }

    public function indexAdministrador()
    {
        return view('administrador.indexadministrador');
    }

     



}
