<?php namespace Registraduria\Http\Controllers;

use Registraduria\Http\Requests;
use Registraduria\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Registraduria\Http\Requests\LoginForm;
use Auth;
use Mail;
use Registraduria\User;
use Illuminate\Http\Request;


class LoginController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	//verifica si hay una sesion activa 
	public function check()
	{
		if (Auth::guest()){

			$message = ['error'=> 'guest'];
            return $message;

		}else{

        	// Si nuestros datos son correctos devolvemos un JSON con el primer nombre del usuario
            $user_data = ['name1'=> Auth::user()->name1,'avatar'=> Auth::user()->avatar];
            return $user_data;
        }

	}

	public function remember(Request $request)
	{
		$user = $request->input('user');

		if ($user != '') {

			$confirmed_user	= User::where('email', '=', $user)->pluck('id');

			if(empty($confirmed_user)){

            	return ['error'=> 'No existe ninguna cuenta asociado a este correo electronico: '.$user];

			}else{
				$data = array

				(
					'id'		=>	User::where('email', '=', $user)->pluck('id'),
					'email'		=>	$user,
					'token'	    =>	User::where('email', '=', $user)->pluck('password'),
				);

				$url = "http://".$_SERVER['HTTP_HOST'];
				$headers = "Content-type: text/html";
				$html1 = '<a target="_blank" href="';
				$html2 = '"></a>';
				$sender ='soporte@yodecido.net';
				$link = $url."/#/reset_password/".$data['id']."/".$data['token'];
				$message = '<html><head><title>Restablecer su contraeña de ingreso en YoDecido.net</title></head><body><img width="250px"src="http://yodecido.net/img/logoYoDecido_net.png"><p style="font-size: 20px;">Movimiento innovador de participación ciudadana.</p><p style="font-size: 15px;">Click aqui para restablecer su contraeña de ingreso en YoDecido.net:</p><a target="_blank" href="'.$link.'"><button style="cursor: pointer;background: #133579;padding: 5px 20px 5px 20px;border-radius: 10px;color: #fff;">Restablecer contraeña</button></a></body></html>';
				
				mail($user,'Restablecer su contraeña de ingreso en YoDecido.net ',$message,$headers);
		        return ['success' => 'Se ha enviado un mensaje que le ayudara a restablecer su contraseña por favor revise el correo <strong>'.$user.'</strong>' ];
	        }

		}else{

			return ['error'=> 'Para restablecer su contraseña es necesario que ingrese el correo electronico con el cual esta registrado.'];
		}

	}

	
	//inicia sesion de usuario en la aplicacion
	public function login(LoginForm $request)
	{
		$user = $request->input('user');
		$password = $request->input('password');
       
        // Verificamos los datos
        if (Auth::attempt(['email' => $user, 'password' => $password])) 
        {	
        	if (Auth::user()->enabled == 1) {

        		// Si nuestros datos son correctos devolvemos un JSON con el primer nombre del usuario
	            $user_name = ['name1'=> User::where('email', '=', $user)->pluck('name1')];
	            return $user_name;
        	}else{
	        	// Si los datos no son los correctos devolvemos un JSON de error y cerramos la session y enviamos de nuevo un correo de verificacion
        		Auth::logout();
        		$data = array
				(
					//'id'		=>	Hash::make(User::where('email', '=', $email)->pluck('id')),
					'id'		=>	User::where('email', '=', $user)->pluck('id'),
					'email'		=>	$user,
					'token'	    =>	User::where('email', '=', $user)->pluck('password'),
				);

				$url = "http://".$_SERVER['HTTP_HOST'];
				$headers = "Content-type: text/html";
				$html1 = '<a target="_blank" href="';
				$html2 = '"></a>';
				$message = "Click aqui para confirmar su cuenta en YoDecido.net: ".$url."/#/verify_account/".$data['id']."/".$data['token'];
				
		        Auth::logout();
				mail($user,'Confirmar su cuenta en YoDecido.net ',$message,$headers);

        		return ['active' => 'Su cuenta no esta activada, se ha enviado un mensaje de verificaion porfavor revise su correo: '.$user.' para activarla'];
	        	
	        }
            

        }else{
        	// Si los datos no son los correctos devolvemos un JSON de error
        	return ['error' => 'El email o la Contraseña no son correctos'];
        }


	}

	//cierra sesion de usuario en la aplicacion
	public function logOut() {

	    Auth::logout();
	    return ['success' => 'sesíon finalizada'];

	}


}
