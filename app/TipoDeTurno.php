<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDeTurno extends Model
{
   
    

    protected $table = 'detalletipoturno';

    protected $primaryKey = 'IdDetalleTipoTurno';

    protected $fillable = [
        'IdDetalleTipoTurno', 'HoraInicioTurno',
         'HoraTerminoTurno	 ', 'AbreviacionTurno'
        , 'DescripcionDetalleTipoTurno', 'IdAdministrador'      
        , 'created_at'
        , 'updated_at',  

    ];


 
    public $incrementing=false;

public $timestamps = false;


                




}
