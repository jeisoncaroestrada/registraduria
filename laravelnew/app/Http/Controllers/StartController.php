<?php namespace EasyLaw\Http\Controllers;

use EasyLaw\Http\Requests;
use EasyLaw\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use EasyLaw\Http\Requests\InitiativeForm;
use EasyLaw\Http\Requests\InitialPollForm;
use Auth;
use Hash;
use EasyLaw\User;
use EasyLaw\Initiative;
use EasyLaw\Poll;
use EasyLaw\Vote;
use Illuminate\Http\Request;

class StartController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	//carga las iniciatiavas y los datos de usuario (nombre,avatar) ademas deternina si el actual usuario debe o no realizar la encuesta inicial
	public function load()
	{
		if (Auth::guest()){

			$message = ['error'=> 'guest'];
            return $message;

		}else{

			$user_id = Auth::user()->id;
			$user_type = Auth::user()->user_type;
			$user_name = Auth::user()->name1;
			$avatar = Auth::user()->avatar;
			
			//$markers = Marker::all();
			if ($user_type !='user') {

				$initiatives = Initiative::all();
				$topRatedInitiatives = Initiative::orderBy('votes', 'desc')->select('votes', 'title')->take(5)->get();
				$topRateVotes =[];
				$topRateNames =[];
				
				$user_votes = Vote::where('user', '=', $user_id)->get();

				//logica que agrega 'supportingDisabled' si la iniciativa esta o no apollada por el usuario logueado
				foreach ($initiatives as &$i) {
					foreach ($user_votes as &$v) {
					    if($i['id'] == $v['id_initiative']){
							$i['supportingDisabled'] = true;
					    };
					};
				};

				//logica que configura las estadisticas de las iniciativas más votadas
				foreach ($topRatedInitiatives as &$i) {
					array_push($topRateVotes, $i['votes']);
					array_push($topRateNames, $i['title']);
				};

				$leaders = User::where('user_type', '=', 'Líder')->count();
				$executors = User::where('user_type', '=', 'Ejecutor')->count();
				$actives = User::where('enabled', '=', 1)->count();
				$A = Poll::where('check1', '=', 'A')->count();
				$B = Poll::where('check1', '=', 'B')->count();
				$C = Poll::where('check1', '=', 'C')->count();
				$D = Poll::where('check1', '=', 'D')->count();
				$E = Poll::where('check1', '=', 'E')->count();
				$q1 = Poll::where('q1', '!=', '')->select('q1', 'created_at')->get();

				//devolvemos un objeto con todos los elementos necesarios para la vista de inicio
				return ['initiatives'=> $initiatives,'userName'=> $user_name,'avatar'=> $avatar,'userStadistics'=> [$leaders,$executors,$actives],'pollStadistics'=> [[$A,$B,$C,$D,$E],$q1],'votesStadistics'=> [$topRateVotes,$topRateNames]];				
			}else{

				$message = ['poll'=> 1,'userName'=> $user_name,'avatar'=> $avatar];
            	return $message;

			}
		};
		
	}

	//crea la iniciativa en la base de datos 
	public function create(InitiativeForm $request)
	{
		if (Auth::guest()){

			$message = ['error'=> 'guest'];
            return $message;

		}else{

			// Recuperamos los datos enviados por el metodo POST
			$user_id = Auth::user()->id;
			$city = $request->input('city');
			$title = $request->input('title');
			$shortDescription = $request->input('shortDescription');
			$description = $request->input('description');

			// Si nuestros datos pasan la validacion creamos un nuevo objeto con base al modelo User para crear un nuevo usuario en la base de datos
	        $initiative = new Initiative;
	        $initiative->user = $user_id;
	        $initiative->city = $city;
			$initiative->title = $title;
			$initiative->shortDescription = $shortDescription;
			$initiative->description = $description;
			$initiative->thumbnail = 'iniciative.png';
			$initiative->save();
			
			$initiative->password =  Hash::make($initiative->id);
			$initiative->save();

            $message = ['success'=> 'ok'];
            return $message;
		};
		
	}

	//resgistra los datos de la encuesta
	public function initialPoll(InitialPollForm $request)
	{
		if (Auth::guest()){

			$message = ['error'=> 'guest'];
            return $message;

		}else{

			// Recuperamos los datos enviados por el metodo POST
			$user_id = Auth::user()->id;
			$userType = $request->input('userType');
			$question = $request->input('question');
			$other = $request->input('other');
			$poll_id = $request->input('id');

			// Si nuestros datos pasan la validacion creamos un nuevo objeto con base al modelo User para actualizar el user_type del usuario en la base de datos
	        $user = User::find($user_id);
	        $user->user_type = $userType;
	        $user->save();

	        //generamos un nuevo registro para la encuesta seleccionada
	        $poll = new Poll;
	        $poll->id = $poll_id;
	        $poll->user = $user_id;
	        $poll->check1 = $question;
			$poll->q1 = $other;
			$poll->save();

            $message = ['success'=> 'ok'];
            return $message;
		};
		
	}

	//resgistra los datos de la votacion por una iniciativa
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
