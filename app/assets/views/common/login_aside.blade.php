<div class="modal-header inline-b padding-t-b-10 wid-100">
	<button type="button" class="close" ><span aria-hidden="true" ng-click="cancel($event)" >&times;</span><span class="sr-only">Close</span></button>
   	<div class="wid-100 center-items">
   		<img ng-click="goTo('/NaN')" class="img-responsive logo-navbar float-left" src="img/logoRegistraduria2015Red.png">
   	</div>
</div>
<div class="modal-body inline-b wid-100">
	
 	<carousel  interval="" no-controls="true" no-wrap="noWrapSlides">
    	<slide  ng-model="slides[0]" active="slides[0].active" ng-init="checkLogin()">
		 	<div class="jumbotron bg-W bd-silver border-1px display-box">
		 		<div ng-if="check" class="animate-if-onlyFadeOut progress-circular-panel-400 center-items bg-W">
    				<md-progress-circular  md-mode="indeterminate"></md-progress-circular>
    			</div>
			 	<div ng-if="activeSession && !check" class="col-md-12 col-sm-12 col-xs-12 animate-if-fadeIn-Out">
			 		<div class="team-card col-xs-12 padding-t-b-10-auto">
						<div class="col-md-12 center-items">
							<div class="wid-40">
								<img class="img-responsive border-radius" src="[[activeSession.avatar]]"></img>
							</div>
						</div>
						<div class="col-md-12">
							<div class="wid-100">
								<h2 class="fc-4">[[activeSession.name1]]</h2>
								<h3 class="fc-G">Ya iniciaste sesion como este usuario.</h3>
							</div>
							<div class="col-xs-12 margin-t-10" ng-click='showModalSignup()'>
								<button class="wid-100 btn btn-default btn-md text-center color-1 bd-1" >Continuar como [[activeSession.name1]]</button>
							</div>
							<div class="col-xs-12 margin-t-10" ng-click='logOut()'>
								<button class="wid-100 btn btn-default btn-md text-center color-1 bd-1" >Cerrar sesion</button>
							</div>
						</div>
					</div>
			 	</div>
			 	<form ng-if="!activeSession  && !check" class="inline-b animate-if-fadeIn-Out">
			      <p class="fc-dark fs-30 text-center">Ya estas Registrado Ingresa a Registraduria.co!</p>
			      <div class="col-md-12 col-sm-12 col-xs-12">
			        <div ng-if="success" class="alert alert-success animation-all" ng-bind-html="sanitize(success)" role="alert"></div>
			      </div>
			      <div class="col-md-12 col-sm-12 col-xs-12">
			      <div ng-show="loginMessage" class="alert alert-danger" role="alert">
			              <strong>
			                <UL type = disk >
			                  <LI class="text-align-auto" ng-repeat="msg in loginMessage">[[msg]]
			                </UL>
			              </strong>
			          </div>
			      </div>
			      <div class="form-group position-relative col-md-12 col-sm-12 col-xs-12">
			        <input ng-model="loginForm.user" type="text" class="form-control white" id="user" placeholder="*Nombre de Usuario o email de registro">
			      </div>
			      <div  class="form-group position-relative col-md-12 col-sm-12 col-xs-12">
			        <input ng-model="loginForm.password" type="password" class="form-control white" id="password" placeholder="*Contraseña">
			      </div>
			      <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center-items margin-plus-10 padding-sm-10" ng-click="login()">
			        <button class="wid-100 btn btn-primary color-4 bd-4 in-bg-W">Iniciar sesión</button>
			      </div>
			      <div  class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding-t-b-10 fs-15 margin-plus center-items">
			          <a class="fc-dark hover-fc-1" href="" ng-click="goToSlide(1)">No recuerdo mi contraseña!</a>
			      </div>
			      <div  class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding-t-b-10 fs-15 margin-plus center-items">
			          <a class="fc-dark hover-fc-1" href="" ng-click="goToSlide(2)" >¿Aún no te has registrado?</a>
			      </div>
			      <div ng-if="processing" class="animate-if-panel progress-circular-panel center-items bg-B opacity-05">
			        <md-progress-circular  md-mode="indeterminate"></md-progress-circular>
			      </div>
			    </form>
		    </div>
	 	</slide>
	 	<slide active="slides[1].active" ng-init="checkLogin()">
		 	<div class="jumbotron bg-W bd-silver border-1px display-box">
		 		<div ng-if="check" class="animate-if-onlyFadeOut progress-circular-panel-400 center-items bg-W">
    				<md-progress-circular  md-mode="indeterminate"></md-progress-circular>
    			</div>
			 	<div ng-if="activeSession && !check" class="col-md-12 col-sm-12 col-xs-12 animate-if-fadeIn-Out">
			 		<div class="team-card col-xs-12 padding-t-b-10-auto">
						<div class="col-md-12 center-items">
							<div class="wid-40">
								<img class="img-responsive border-radius" src="[[activeSession.avatar]]"></img>
							</div>
						</div>
						<div class="col-md-12">
							<div class="wid-100">
								<h2 class="fc-4">[[activeSession.name1]]</h2>
								<h3 class="fc-G">Ya iniciaste sesion como este usuario.</h3>
							</div>
							<div class="col-xs-12 margin-t-10" ng-click='showModalSignup()'>
								<button class="wid-100 btn btn-default btn-md text-center color-1 bd-1" >Continuar como [[activeSession.name1]]</button>
							</div>
							<div class="col-xs-12 margin-t-10" ng-click='logOut()'>
								<button class="wid-100 btn btn-default btn-md text-center color-1 bd-1" >Cerrar sesion</button>
							</div>
						</div>
					</div>
			 	</div>
			 	<form class="inline-b" ng-if="!activeSession  && !check">
			      <p class="fc-dark fs-30 text-center">Recuerda tu contraseña!</p>
			      <p class="fc-dark fs-15">¿Olvidaste tu contraseña? ingresa tu correo de registro para recordarla</p>
			      <div class="col-md-12 col-sm-12 col-xs-12" ng-if="rememberSuccess">
			        <div class="alert alert-success animation-all line-height-normal" ng-bind-html="sanitize(rememberSuccess)" role="alert"></div>
			      </div>
			      <div class="col-md-12 col-sm-12 col-xs-12">
			      <div ng-show="rememberMessage" class="alert alert-danger" role="alert">
			              <strong>
			                <UL type = disk >
			                  <LI class="text-align-auto" ng-repeat="msg in rememberMessage">[[msg]]
			                </UL>
			              </strong>
			          </div>
			      </div>
			      <div class="form-group position-relative col-md-12 col-sm-12 col-xs-12">
			        <input ng-model="rememberForm.user" type="text" class="form-control white" id="user" placeholder="*Nombre de Usuario o email de registro">
			      </div>
			      <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center-items margin-plus-10 padding-sm-10" ng-click="rememberPassword()">
			        <button class="wid-100 btn btn-primary color-4 bd-4 in-bg-W">Recordar contraseña</button>
			      </div>
			      <div  class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding-t-b-10 fs-15 margin-plus center-items">
			          <a class="fc-dark hover-fc-1" href="" ng-click="goToSlide(0)">Iniciar sesión!</a>
			      </div>
			      <div  class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding-t-b-10 fs-15 margin-plus center-items">
			          <a class="fc-dark hover-fc-1" href="" ng-click="goToSlide(2)" >¿Aún no te has registrado?</a>
			      </div>
			      <div ng-if="processing" class="animate-if-panel progress-circular-panel center-items bg-B opacity-05">
			        <md-progress-circular  md-mode="indeterminate"></md-progress-circular>
			      </div>
			    </form>
		    </div>
	 	</slide>
	 	<slide ng-model="slides[3]" active="slides[2].active">
		 	<div class="jumbotron bg-W bd-silver border-1px ng-hide-hidden">
			 	<form class="inline-b">
			      <p class="fc-dark fs-30 text-center">Registrarte!</p>
			      <div class="col-md-12 col-sm-12 col-xs-12">
			        <div ng-if="signUpSuccess" class="alert alert-success animation-all" ng-bind-html="sanitize(signUpSuccess)" role="alert"></div>
			      </div>
			      <div class="col-md-12 col-sm-12 col-xs-12">
			      <div ng-show="signUpMessage" class="alert alert-danger" role="alert">
			              <strong>
			                <UL type = disk >
			                  <LI class="text-align-auto" ng-repeat="msg in signUpMessage">[[msg]]
			                </UL>
			              </strong>
			          </div>
			      </div>
			      <div class="form-group position-relative col-md-12 col-sm-12 col-xs-12">
			        <input ng-model="newUser.name1" type="text" class="form-control white" id="name1" placeholder="*Ingrese su primer nombre.">
			      </div>
			      <div class="form-group position-relative col-md-12 col-sm-12 col-xs-12">
			        <input ng-model="newUser.email" type="email" class="form-control white" id="email" placeholder="*Ingrese su correo electrónico.">
			      </div>
			      <div  class="form-group position-relative col-md-6 col-sm-6 col-xs-12">
			        <input ng-model="newUser.password" type="password" class="form-control white" id="password" placeholder="*Contraseña">
			      </div>
			      <div  class="form-group position-relative col-md-6 col-sm-6 col-xs-12">
			        <input ng-model="newUser.password_confirmation" type="password" class="form-control white" id="password2" placeholder="*Repita su contraseña">
			      </div>
			      <div class="col-md-12 col-sm-12 col-xs-12">
	                 <div class="wid-100 inline-b fc-dark line-height-normal"><md-checkbox style="display: inline-block;margin-right: 3px;" ng-model="newUser.check1" aria-label="Checkbox cmt">Acepto</md-checkbox><a class="underline fc-1 hover-fc-1" target="_blank" href="https://www.google.com.co" >Términos y condiciones</a> de Registraduria.co</div>
	              </div>
			      <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center-items margin-plus-10 padding-sm-10" ng-click="signUp()">
			        <button class="wid-100 btn btn-primary color-4 bd-4 in-bg-W">Registrarte</button>
			      </div>
			      <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-t-b-10 fs-15 margin-plus center-items">
			          <span class="fc-dark">Tambien pudes resgistrarte con:</span>
			      </div>
			      <div  class="col-lg-6 col-md-6 col-sm-6 col-xs-12 center-items margin-plus-10 padding-sm-10" ng-click="login()">
			        <button class="wid-100 btn btn-primary btn-facebook"><i class="fc-W pointer mdi mdi-facebook"></i> Facebook</button>
			      </div>
			      <div  class="col-lg-6 col-md-6 col-sm-6 col-xs-12 center-items margin-plus-10 padding-sm-10" ng-click="login()">
			        <button class="wid-100 btn btn-primary btn-twitter"><i class="fc-W pointer mdi mdi-twitter"></i> Twitter</button>
			      </div>
			      <div  class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding-t-b-10 fs-15 margin-plus center-items">
			          <a class="fc-dark hover-fc-1" href="" ng-click="goToSlide(0)">Iniciar sesión!</a>
			      </div>
			      <div  class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding-t-b-10 fs-15 margin-plus center-items">
			          <a class="fc-dark hover-fc-1" href="" ng-click="goToSlide(1)">¿olvidaste tu contraseña?</a>
			      </div>
			      <div ng-if="processing" class="animate-if-panel progress-circular-panel center-items bg-B opacity-05">
			        <md-progress-circular  md-mode="indeterminate"></md-progress-circular>
			      </div>
			    </form>
		    </div>
	 	</slide>
    </carousel>
</div>
<div class="modal-footer">
    <button class="btn btn-primary btn-md" ng-click="ok($event)">OK</button>
    <button class="btn btn-warning btn-md" ng-click="cancel($event)">Cerrar</button>
</div>