<?php namespace EasyLaw\Http\Requests;

use EasyLaw\Http\Requests\Request;

class InitiativeForm extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			"city" => "required|min:2|max:30",
	        "title" => "required|min:3|max:40|unique:initiatives",
	        "shortDescription" => "required|min:5|max:100",
	        "description" => "required|min:5"
	    ];
	}

	public function messages()
    {
        return [
            'city.required' => 'Por favor seleccione una ciudad',
            'title.required' => 'Por favor ingrese un titulo de maximo 40 caracteres',
            'title.unique' => 'Ya existe una iniciativa creada con este titulo',
            'shortDescription.required' => 'Por favor ingrese una corta descripción de maximo 100 caracteres',
            'description.required' => 'Por favor ingrese una descripción detallada',
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
