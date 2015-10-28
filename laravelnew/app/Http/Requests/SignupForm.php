<?php namespace EasyLaw\Http\Requests;

use EasyLaw\Http\Requests\Request;

class SignupForm extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
	        "name1" => "required|min:2|max:255",
	        "name2" => "min:0|max:255",
	        "lastname1" => "required|min:2|max:255",
	        "lastname2" => "min:0|max:255",
	        'email' => 'required|email|unique:users',
	        'password' => 'min:8|required|confirmed',
    		'password_confirmation' => 'required',
    		'check1' => 'required',
    		'check2' => 'required'

	    ];
	}

	public function messages()
    {
        return [
            'name1.required' => 'Por favor ingrese su primer nombre',
            'name1.min' => 'El primer nombre debe tener minimo 2 caracteres',
            'lastname1.required' => 'Por favor ingrese su primer apellido',
            'lastname1.min' => 'El primer apellido debe tener minimo 2 caracteres',
            'email.required' => 'Por favor ingrese su direccion de correo electronico',
            'email.email' => 'Por favor ingrese una direccion de correo valida',
            'email.unique' => 'Ya existe una cuenta creada con esta direccion de correo',
            'password.required' => 'Por favor ingrese la contraseña',
            'password.min' => 'La contrseña debe tener minimo 8 caracteres alfanuméricos',
            'password.confirmed' => 'Las contrseñas no coinciden',
            'password_confirmation.required' => 'Por favor repita la contraseña',
            'check1.required' => 'Por favor dar click en "Acepto recibir vía e-mail información relevante de yoDecido.net"',
            'check2.required' => 'Por favor dar click en "Acepto Términos y condiciones de yoDecido.net"'
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
