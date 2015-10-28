<?php namespace EasyLaw\Http\Requests;

use EasyLaw\Http\Requests\Request;

class InitialPollForm extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			"userType" => "required|in:Líder,Ejecutor,",
	        "question" => "required|min:1|max:10",
	        "id" => "required|min:1|max:10",
	    ];
	}

	public function messages()
    {
        return [
            'userType.required' => 'Por favor seleccione un tipo de usuario',
            'userType.in' => 'El tipo de usuario seleccionado no es valido',
            'question.required' => 'Por favor seleccione una de las opciones de respuesta',
            'id.required' => 'Los datos de usuario han sido alterados precione la tecla F5 y vuelva a intentarlo',
            'id.min' => 'Los datos de usuario han sido alterados por favor precione la tecla F5 y vuelva a intentarlo',
            'id.max' => 'Los datos de usuario han sido alterados por favor precione la tecla F5 y vuelva a intentarlo',
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
