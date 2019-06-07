<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
 use Illuminate\Contracts\Auth\MustVerifyEmail;


class Operador extends Authenticatable
{

    protected $guard='operador' ;
    
    protected $table = 'operador';

    protected $primaryKey = 'RutOperador';

    protected $fillable = [
        'RutOperador', 'NombreOperador',
         'Password ', 'Correo'
        , 'TelefonoOperador', 'FechaAltaOperador'
        , 'IdAdministrador', 'LocalizacionOperador'
        , 'created_at'
        , 'updated_at',  

    ];
 
    public $incrementing=false;

    public function getAuthPassword()
    {
        return $this->Password;
    }

    public function setAttribute($key, $value)
    {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
    
        if( ! $isRememberTokenAttribute )
        {
            parent::setAttribute($key, $value);
        }

        
    }
                // many to many 
                public function detalleturnosasignados()
                {
                    return $this->belongsToMany('App\DetalleTurnoAsignado');
                }


    



   
}
