<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'documento';

    protected $primaryKey = 'IdDocumento';

    protected $fillable = [
        'IdDocumento', 'Ruta',
         'Descripcion ', 'NombreDocumento'
        , 'IdAdministrador', 
    ];

   // public $timestamps = false;

}
