<?php namespace Registraduria\Http\Controllers;

use Registraduria\Http\Requests;
use Registraduria\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Registraduria\Http\Requests\VerifyAccount;
use Auth;
use Hash;
use Mail;
use Crypt;
use Registraduria\User;
use Illuminate\Http\Request;

class VerifyController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function verify(VerifyAccount $request)
	{
		// Recuperamos los datos enviados por el metodo POST

		$token = $request->input('token');
		$code = $request->input('code');

        // Si nuestros datos pasan la validacion creamos un nuevo objeto con base al modelo User para crear un nuevo usuario en la base de datos
        //$user = User::find($code);
        $user = User::where('password', '=', $token)->where('id', '=', $code)->count();
       
        if($user >= 1)
      	{
      		$user = User::where('password', '=', $token)->where('id', '=', $code)->firstOrFail();
        	$user->enabled = 1;
			$user->save();

			return ['success' => '<span class="is-success bold-600">!Su cuenta </span>fue activada correctamente.'];
        } else {

        	return ['error' => '<span class="is-error bold-600">!Ocurrio un error </span>por favor abrir el enlace directamente del correo o verficar que copie y pegue la direccion completa'];
        };
		
      //return ['success' => 'Se ha registrado correctamente por favor revise el correo <strong>'.$email.'</strong> para confirmar su cuenta' ];
     


	}

	public function verifyUser(VerifyAccount $request)
	{
		// Recuperamos los datos enviados por el metodo POST

		$token = $request->input('token');
		$code = $request->input('code');

        // Si nuestros datos pasan la validacion creamos un nuevo objeto con base al modelo User para crear un nuevo usuario en la base de datos
        //$user = User::find($code);
        $user = User::where('password', '=', $token)->where('id', '=', $code)->count();
       
        if($user >= 1)
      	{
      		$user = User::where('password', '=', $token)->where('id', '=', $code)->firstOrFail();
        	$user->enabled = 1;
			$user->save();

			return ['user' => $user];
        } else {

        	return ['error' => '<span class="is-error bold-600">!Ocurrio un error </span>por favor abrir el enlace directamente desde el correo o verficar que copie y pegue la direccion completa'];
        };
		
      //return ['success' => 'Se ha registrado correctamente por favor revise el correo <strong>'.$email.'</strong> para confirmar su cuenta' ];
     


	}


}
