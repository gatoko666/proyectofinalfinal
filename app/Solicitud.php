<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitud';
    protected $primaryKey = 'IdSolicitud';
    protected $fillable = [
        'RutOperador', 'RutAdministrador',
         'TipoSolicitud', 'EstadoSolicitud'
        , 'LocalizacionOperador', 'DesdeSolicitud'      
        , 'HastaSolicitud'
        , 'Comentario', 'created_at'
        , 'updated_at',    'deleted_at', 

    ];




    //public $incrementing=false;

   //public $timestamps = false;




}
