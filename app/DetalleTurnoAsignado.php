<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Notifiable;
use SoftDeletes;


class DetalleTurnoAsignado extends Model
{
   
    protected $dates = ['deleted_at'];
    protected $table = 'turnoasignado';
    protected $primaryKey = 'IdDetalleTipoTurno';

    protected $fillable = [
        'IdDetalleTipoTurno', 'RutOperador',
         'NumeroSemanaAno ', 'DiaSemana', 'created_at', 'updated_at','deleted_at'
        

    ];

   // public $timestamps = false;

      
            
           public function operador()
                {
                    return $this->belongsTo(Operador::class);
                }


    
}
