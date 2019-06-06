<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'documento';

    protected $primaryKey = 'RutOperador';

    protected $fillable = [
        'RutOperador', 'NombreOperador',
         'Password ', 'Correo'
        , 'TelefonoOperador', 'FechaAltaOperador'
        , 'IdAdministrador', 'LocalizacionOperador'
        , 'created_at'
        , 'updated_at',  

    ];
}
