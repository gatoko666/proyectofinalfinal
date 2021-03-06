<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Hash;
use Carbon\Carbon;
use App\Operador;
use Mail;



class PasswordControllerOp extends Controller
{
    public function sendPasswordResetToken(Request $request)
    {

      
        $user = Operador::where ('Correo', $request->email)->first();
        //if ( !$user ) return redirect()->back()->withErrors(['error' => '404']);
        if ( !$user ) return redirect()->back()->with('warning', 'No existe el usuario.'); 
        //create a new token to be sent to the user. 
        DB::table('password_resets_operador')->insert([
            'email' => $request->email,
            'token' => str_random(60), //change 60 to any length you want
            'created_at' => Carbon::now()
        ]);
    
        $tokenData = DB::table('password_resets_operador')
        ->where('email', $request->email)->first();
    
       $token = $tokenData->token;
       $email = $request->email; // or $email = $tokenData->email;

       $this->notificarOperadorTurnosActualizacion($email,$token);


    
       /**
        * Send email to the email above with a link to your password reset
        * something like url('password-reset/' . $token)
        * Sending email varies according to your Laravel version. Very easy to implement



        */

        return redirect()->back()->with('success', 'Se ha enviado un correo para poder realizar reset de contraseña.'); 
      


    }


    function notificarOperadorTurnosActualizacion($email,$token){    
        $data = array(      
            'email' => "$email", 
            'token' => "$token",                          
                      
        );                              
      $correo=$data["email"];
     // $operadorName=$data["nombretrabajador"];
     // $semana=$data["semana"];

        Mail::send('partials.resetpasswordop', $data,function ($message)use ($correo) {                                      
          

                                            try     {

                                              $message->from('adturnmail@gmail.com', 'Gestor de turnos Adturn.');                      
                                              $message->to($correo);  
                                              $message->subject('Restablecer Contraseña '); 


                                                                    /* Envio del Email */   
                                                                }
                                                                catch (\Exception $e)
                                                                {
                                                                    echo("Error al enviar el correo");
                                                                }    
        });                
               
      }




    
    
    
    /**
     * Assuming the URL looks like this 
     * http://localhost/password-reset/random-string-here
     * You check if the user and the token exist and display a page
     */
    
    public function showPasswordResetForm($token)
    {
        $tokenData = DB::table('password_resets_operador')
        ->where('token', $token)->first();
    
        if ( !$tokenData ) return redirect()->to('/')->with('error', 'Token Inválido.');  //redirect them anywhere you want if the token does not exist.

        $token=$tokenData;
        return view('email',compact('token')); 
         
    }
    
    
    
    public function resetPassword(Request $request, $token)
     {
         //some validation


         try {
           
          
          $password = $request->password;
          $passwordConfirmation=$request->password_confirmation;
 
          if($password==$passwordConfirmation){
 
           $tokenData = DB::table('password_resets_operador')
           ->where('token', $token)->first();
      
           $user = Operador::where('Correo', $tokenData->email)->first();
           $usermail = Operador::where('Correo', $request->email)->first();

           if($user==$usermail){

            $user->password = Hash::make($password);
            $user->update(); //or $user->save();
       
            //do we log the user directly or let them login and try their password for the first time ? if yes 
            Auth::login($user);
       
           // If the user shouldn't reuse the token later, delete the token 
         //  DB::table('password_resets_operador')->where('email', $user->email)->delete();
   
           
   
   
   
           DB::table('password_resets_operador')->where('token', $token)->delete();
   
   
       
           //redirect where we want according to whether they are logged in or not.
           return redirect('/')->with('success', 'Se ha realizado la actualización de la contraseña.'); 
          // return redirect()->back()->with('success', 'Se ha realizado la actualización de la contraseña.'); 




           }else{
            return redirect()->back()->with('error', 'Correo de usuario no existe.'); 
           // return redirect()->to('/')->with('error', 'Correo de usuario no existe.'); //or wherever you want

           }
  
           
      
           
 
 
          }else{
 
           return redirect()->back()->with('error', 'La contraseña y la confirmacion de contraseña no coinciden.'); 
          }
 




         } catch (\Throwable $th) {
           
          return redirect('/')->with('error', 'Problema para realizar la acción solicitada.'); 



         }
        
    
        

        


     }








    
    
}
