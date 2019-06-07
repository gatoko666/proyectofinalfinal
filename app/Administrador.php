<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $table = 'administrador';
    protected $primaryKey = 'RutAdministrador';

    protected $fillable = [
        'RutAdministrador', 'name',
         'email ', 'email_verified_at	'
        , 'password', 'remember_token'
        , 'created_at', 'updated_at'
            

    ];
    public $incrementing=false;



                // 1 a muchos
                public function documentos()
                {
                    return $this->hasMany('App\Documento');
                }


                 // 1 a muchos
                 public function operadores()
                 {
                     return $this->hasMany('App\Operador');
                 }

                 // 1 a muchos
                 public function detalleturnosasognados()
                 {
                     return $this->hasMany('App\DetalleTurnoAsignado');
                 }


                 



 

}
