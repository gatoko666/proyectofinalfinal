<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;


class ResetPasswordControllerOp extends Controller
{
    use ResetsPasswords;

    // Comentamos esto que no hace falta
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }
    
    public function reset(Request $request)
    {
        $this->validate($request, $this->rules(), $this->validationErrorMessages());

        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        return $response == \Password::PASSWORD_RESET
                    ? response()->success($response, 200)
                    : response()->error($response, 422);
    }

    protected function resetPassword($user, $password)
    {
        $user->forceFill([
            'password' => $password,
            'remember_token' => str_random(60),
        ])->save();

        // GENERAR TOKEN PARA SATELLIZER AQUI ??
        // $this->guard()->login($user);
    }
}
