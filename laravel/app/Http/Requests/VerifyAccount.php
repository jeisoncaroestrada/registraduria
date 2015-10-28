<?php namespace Registraduria\Http\Requests;

use Registraduria\Http\Requests\Request;

class VerifyAccount extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
	        "token"    =>    "required|min:6|max:60",
	        "code"    =>    "required|min:1|max:255"
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
