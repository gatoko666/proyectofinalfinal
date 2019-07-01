<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
 use Illuminate\Contracts\Auth\MustVerifyEmail;
 use Notifiable;
use SoftDeletes;



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
               // public function detalleturnosasignados()
              //  {
              //      return $this->belongsToMany('App\DetalleTurnoAsignado');
            //    }


                protected $dates = ['deleted_at'];

                public function detalleturnoasignado()
                {
                    return $this->hasMany(DetalleTurnoAsignado::class);
                }


                public function solicitudes()
                {
                    return $this->hasMany(Solicitud::class);
                }


                protected $hidden = [
                    'Password', 'remember_token',
                ];

               
    
                // Función copiada del archivo:
                // vendor\laravel\framework\src\Illuminate\Auth\Passwords\CanResetPassword.php     
                /**
                * Send the password reset notification.
                *
                * @param  string  $token
                * @return void
                */
               public function sendPasswordResetNotification($token)
               {
                   $this->notify(new ResetPassword($token));
               }


   
}
