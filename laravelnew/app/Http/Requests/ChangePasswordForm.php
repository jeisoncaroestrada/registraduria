<?php namespace EasyLaw\Http\Requests;

use EasyLaw\Http\Requests\Request;

class ChangePasswordForm extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [

	        "token"    =>    "required|min:6|max:60",
	        "code"    =>    "required|min:1|max:255",
	        'password' => 'min:6|required|confirmed',
    		'password_confirmation' => 'min:6|required'  
	    ];
	}

	public function messages()
    {
        return [
            'token.required' => 'se presento un error por favor ingrese nuevamente desde el enlace enviado a su correo',
            'token.min' => 'la url ha sido alterada no se puede procesar esta solicitud ingrese nuevamente desde el enlace enviado a su correo',
            'code.required' => 'se presento un error por favor ingrese nuevamente desde el enlace enviado a su correo',
            'code.min' => 'la url ha sido alterada no se puede procesar esta solicitud ingrese nuevamente desde el enlace enviado a su correo',
            'password.required' => 'Por favor ingrese la contraseña',
            'password.min' => 'La contrseña debe tener minimo 6 caracteres alfanuméricos',
            'password.confirmed' => 'Las contrseñas no coinciden',
            'password_confirmation.required' => 'Por favor repita la contraseña',
            'password_confirmation.min' => 'La contrseña debe tener minimo 6 caracteres alfanuméricos',
        ];
    }


	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

}
