<?php namespace Registraduria\Http\Requests;

use Registraduria\Http\Requests\Request;

class SupportForm extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			"id" => "required|min:2|max:30",
	        "question" => "required|min:1|max:10",
	        "id" => "required|min:1|max:10",
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
