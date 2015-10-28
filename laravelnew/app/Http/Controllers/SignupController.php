<?php namespace EasyLaw\Http\Controllers;

use EasyLaw\Http\Requests;
use EasyLaw\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use EasyLaw\Http\Requests\SignupForm;
use EasyLaw\Http\Requests\ChangePasswordForm;
use Auth;
use Hash;
use Mail;
use Crypt;
use EasyLaw\User;
use Illuminate\Http\Request;

class SignupController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function signup(SignupForm $request)
	{
		// Recuperamos los datos enviados por el metodo POST
		$name1 = $request->input('name1');
		$name2 = $request->input('name2');
		$lastname1 = $request->input('lastname1');
		$lastname2 = $request->input('lastname2');
		$email = $request->input('email');
		$password = $request->input('password');
		$password_confirmation = $request->input('password_confirmation');

        // Si nuestros datos pasan la validacion creamos un nuevo objeto con base al modelo User para crear un nuevo usuario en la base de datos
        $user = new User;
		$user->name1 = $name1;
		$user->name2 = $name2;
		$user->lastname1 = $lastname1;
		$user->lastname2 = $lastname2;
		$user->avatar = 'avatardefault.png';
		$user->email = $email;
		$user->password =  Hash::make($password_confirmation);
		$user->save();
		//$user = User::create(Request::all());

		$data = array
		(
			'id'		=>	User::where('email', '=', $email)->pluck('id'),
			'email'		=>	$email,
			'token'	    =>	User::where('email', '=', $email)->pluck('password'),
		);

		$url = "http://".$_SERVER['HTTP_HOST'];
		$headers = "Content-type: text/html";
		$html1 = '<a target="_blank" href="';
		$sender ='soporte@yodecido.net';
		$html2 = '"></a>';
		$message = "Click aqui para confirmar su cuenta en YoDecido.net: ".$url."/#/verify_account/".$data['id']."/".$data['token'];
		
        Auth::logout();
		mail($email,'Confirmar su cuenta en YoDecido.net ',"FROM:".$sender,$message,$headers);
        return ['success' => 'Se ha registrado correctamente por favor revise el correo <strong>'.$email.'</strong> para confirmar su cuenta' ];
     
	}

	//cambia la contraseña del usuario desde la url
	public function changePassword(ChangePasswordForm $request)
	{
		// Recuperamos los datos enviados por el metodo POST
		$id = $request->input('code');
		$token = $request->input('token');
		$password = $request->input('password');
		$password_confirmation = $request->input('password_confirmation');

        // Si nuestros datos pasan la validacion se trae el usuario a el objeto $user desde la base de datos y se le actualiza el campo 'password'
        $user = User::where('id', '=', $id)->where('password', '=', $token)->firstOrFail();
		$user->password =  Hash::make($password_confirmation);
		$user->save();
		
        return ['success' => 'Se ha cambiado su contraseña correctamente ahora puede ingresar con: <strong>'.$password.'</strong><br><br><a href="#login"ng-click="goTo('."'/'".')" class="animate-if-button btn btn-primary animation-all" role="button"> <i class="icon-l mdi mdi-send"></i> Iniciar sesión</a>' ];
     
	}

}
