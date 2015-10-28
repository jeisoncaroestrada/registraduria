<?php namespace Registraduria\Http\Controllers;

use Registraduria\Http\Requests;
use Registraduria\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Registraduria\Http\Requests\CitizenForm;
use Registraduria\Http\Requests\CandidateForm;
use Auth;
use Hash;
use Registraduria\User;
use Registraduria\Citizen;
use Registraduria\Candidate;
use Illuminate\Http\Request;

class StartController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	//carga las iniciatiavas y los datos de usuario (nombre,avatar) ademas deternina si el actual usuario debe o no realizar la encuesta inicial
	public function loadCandidates()
	{
		if (Auth::guest()){

			$message = ['error'=> 'guest'];
            return $message;

		}else{


			$candiates = Candidate::all();
			
			$message = ['candidates'=> $candiates];
        	return $message;

		};
		
	}

	//crea la cédula en la base de datos 
	public function createCitizen(CitizenForm $request)
	{
		if (Auth::guest()){

			$message = ['error'=> 'guest'];
            return $message;

		}else{


			// Si nuestros datos pasan la validacion creamos un nuevo objeto con base al modelo User para crear un nuevo usuario en la base de datos
	        $citizen = new Citizen;
	        $citizen->id_number = $request->input('id_number');
	        $citizen->names = $request->input('names');
			$citizen->lastnames = $request->input('lastnames');
			$citizen->birthdate = $request->input('birthdate');
			$citizen->place_of_birth = $request->input('place_of_birth');
			$citizen->height = $request->input('height');
			$citizen->gender = $request->input('gender');
			$citizen->rh = $request->input('rh');
			$citizen->date_place_expedition = $request->input('date_place_expedition');
			$citizen->email = $request->input('email');
			$citizen->save();
			
            $message = ['success'=> 'La cedula numero: <strong>'.$request->input('id_number').'</strong> fue registrada con exito'];
            return $message;
		};
		
	}

	//crea la cédula en la base de datos 
	public function createCandidate(CandidateForm $request)
	{
		if (Auth::guest()){

			$message = ['error'=> 'guest'];
            return $message;

		}else{


			// Si nuestros datos pasan la validacion creamos un nuevo objeto con base al modelo User para crear un nuevo usuario en la base de datos
	        $candidate = new Candidate;
	        $candidate->id_number = $request->input('id_number');
	        $candidate->names = $request->input('names');
			$candidate->lastnames = $request->input('lastnames');
			$candidate->birthdate = $request->input('birthdate');
			$candidate->place_of_birth = $request->input('place_of_birth');
			$candidate->height = $request->input('height');
			$candidate->gender = $request->input('gender');
			$candidate->rh = $request->input('rh');
			$candidate->date_place_expedition = $request->input('date_place_expedition');
			$candidate->email = $request->input('email');
			$candidate->save();
			
            $message = ['success'=> 'El candidato con cedula numero: <strong>'.$request->input('id_number').'</strong> fue registrado con exito'];
            return $message;
		};
		
	}


	
	//resgistra los datos de la votacion por un candidato
	public function support(Request $request)
	{
		if (Auth::guest()){

			$message = ['error'=> 'guest'];
            return $message;

		}else{

			// Recuperamos los datos enviados por el metodo POST
			$user_id = Auth::user()->id;//el id del usuario logueado
			$id_initiative = $request->input('id');
			$password = $request->input('password');

			//se crea un array que trae si el usuario ya voto por la iniciativa enviada en la consulta
			$user_votes = Vote::where('id_initiative', '=', $id_initiative)->where('user', '=', $user_id)->get();

			//se valida que la iniciativa no este votada por el usuario logueado
			if (empty($user_votes[0])) {

				// Si nuestros datos pasan la validacion creamos un nuevo objeto en base al modelo Initiative para actualizar el campo 'votes' de la iniciativa enviada
			    $initiative = Initiative::find($id_initiative);
		        
				if ($initiative->password == $password) {

			        $initiative->votes = $initiative->votes+1;
			        $initiative->save();

			        //generamos un nuevo registro para la encuesta seleccionada
			        $vote = new Vote;
			        $vote->id_initiative = $id_initiative;
			        $vote->user = $user_id;
					$vote->save();

		            $message = ['success'=> 'ok'];
		            return $message;
				}else{

					$message = ['error'=> 'Token mismatch'];
	            	return $message;

				}
			}else{

				$message = ['error'=> 'there is already a vote for this initiative'];
            	return $message;

			};

		};
		
	}


}
