<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleTurnoAsignado extends Model
{
    protected $table = 'turnoasignado';

    protected $primaryKey = 'IdDetalleTipoTurno';

    protected $fillable = [
        'IdDetalleTipoTurno', 'RutOperador',
         'NumeroSemanaAno ', 'DiaSemana'
        

    ];

    public $timestamps = false;
    
}
