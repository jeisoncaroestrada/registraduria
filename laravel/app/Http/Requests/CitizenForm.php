<?php namespace Registraduria\Http\Requests;

use Registraduria\Http\Requests\Request;

class CitizenForm extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [

	        "id_number" =>"required|min:2|max:20|unique:citizens",
	        "names" =>"required|min:2|max:50",
			"lastnames" =>"required|min:2|max:50",
			"birthdate" =>"required|min:2|max:50",
			"place_of_birth" =>"required|min:2|max:30",
			"height" =>"required",
			"gender" =>"required|min:2|max:10",
			"rh" =>"required",
			"date_place_expedition" =>"required|min:2|max:50",
			"email" =>"email",
	    ];
	}

	public function messages()
    {
        return [
            
            "id_number.required" => 'Por favor ingrese el numero de cédula',
            "id_number.unique" => 'El numero de cédula ingresado ya ha sido registrado anteriormente',
	        "names.required" => 'Por favor ingrese los nombres',
			"lastnames.required" => 'Por favor ingrese los apellidos',
			"birthdate.required" => 'Por favor ingrese la fecha de nacimiento',
			"place_of_birth.required" => 'Por favor ingrese el lugar de nacimiento',
			"height.required" => 'Por favor ingrese la estatura',
			"gender.required" => 'Por favor ingrese el sexo',
			"rh.required" => 'Por favor ingrese el tipo sanguineo',
			"date_place_expedition.required" => 'Por favor ingrese el lugar y fecha de expedición',
			"email.email" => 'Por favor ingrese una direccion de correo valida'
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
