<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');
Route::post('login', 'LoginController@login');
Route::post('remember', 'LoginController@remember');
Route::post('loginCheck', 'LoginController@check');
Route::post('logout', 'LoginController@logOut');
Route::post('signup', 'SignupController@signup');
Route::post('changePassword', 'SignupController@changePassword');
Route::post('verify', 'VerifyController@verify');
Route::post('verifyUser', 'VerifyController@verifyUser');
Route::post('start', 'StartController@load');
Route::post('initiative', 'StartController@create');
Route::post('initialPoll', 'StartController@initialPoll');
Route::post('support', 'StartController@support');

Route::get('/map', function()
{
  /*if(Auth::attempt(Request::only('user','password'))){
	return Auth::user();
	}else{
	return 'invalid username/pass combo';
}*/
$user = Request::header();

return $user;

});


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
