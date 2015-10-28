<div class="line-height-0" data-sr-container='{ "reset":true, "vFactor": 0.10, "mobile": true }' >
<div ng-show="check" class="full-height wid-100 pos-absolute center-items bg-W">
	<md-progress-circular  md-mode="indeterminate"></md-progress-circular>
</div>
<!-- <nav class="navbar navbar-default navbar-fixed-top animation-all">
  <div class="container-fluid">
  	<div class="col-md-1 col-sm-1 col-xs-2">
      <div id="mainMenu" class="mainMenu bg-1"  ng-click="openAside('left',true)"><i class="fc-W pointer mdi mdi-menu"></i></div>
  	</div>
    <div class="col-md-2 col-sm-4 col-xs-8">
        <img ng-click="goTo('/NaN')" class="img-responsive logo-navbar float-left" src="img/logo-prueba.png">
    </div>
    <ul class="nav navbar-nav col-lg-9 col-md-9 col-sm-9 col-xs-9 float-right visible-lg visible-md">
       	<li class="nav-top-li [[activeMenu === 2 ? 'active' : '']]"><a scroll-to="query">Relizar<br class="hidden-xs"> una consulta<span class="sr-only">(current)</span></a></li>
       	<li class="nav-top-li [[activeMenu === 4 ? 'active' : '']]"><a scroll-to="whatIs">Conocer <br class="hidden-xs"> más<span class="sr-only">(current)</span></a></li>
       	<li class="nav-top-li [[activeMenu === 3 ? 'active' : '']]"><a scroll-to="contact" href="">Contactenos<span class="sr-only">(current)</span></a></li>
	    <li class="nav-top-li center-items margin-t-10 user-menu">
			<div class="user-avatar-menu">
				<img class="img-responsive img-circle" ng-cloak src="[[activeSession.avatar]]">
			</div>
			<div class="col-md-7 user-name-menu">
				<span class="bold-600 fc-1 fs-10">[[activeSession.name1]]</span>
			</div>
		</li>
      	<a id="showModalRemember" class="fc-W hover-fc-3 hidden"data-backdrop="static" data-toggle="modal" data-target="#modalRemember" >Link oculto</a>
  	</ul>
  </div>
</nav> -->
<!-- panel INICIO -->
<section class="bg-W wid-100" ng-init="checkLogin()">
	<article class="start-menu">
		<div ng-if="check" class="animate-if-onlyFadeOut progress-circular-panel center-items bg-silver">
			<md-progress-circular  md-mode="indeterminate"></md-progress-circular>
		</div>
		<div ng-if="activeSession && !check">
			<div class="menu-header">
			   	<div class="wid-100 center-items">
			   		<img ng-click="goTo('/NaN')" class="img-responsive" src="img/logo-prueba.png">
			   	</div>
			   	<div class="team-card col-xs-12 padding-t-b-10-auto">
					<div class="col-md-12 center-items">
						<div class="wid-40">
							<img class="img-responsive border-radius" src="[[activeSession.avatar]]"></img>
						</div>
					</div>
					<div class="col-md-12">
						<div class="wid-100">
							<h2 class="fc-4">[[activeSession.name1]]</h2>
							<h3 class="fc-G">Ya ha iniciado sesion como este usuario.</h3>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-body inline-b">
				<div class="col-xs-12 margin-t-10" ng-click="goToModule(0)">
					<button class="wid-100 btn btn-default btn-md text-center color-1 bd-1" >Registrar cédula</button>
				</div>
				<div class="col-xs-12 margin-t-10" ng-click="goToModule(1)">
					<button class="wid-100 btn btn-default btn-md text-center color-1 bd-1" >Registrar candidato</button>
				</div>
				<div class="col-xs-12 margin-t-10" ng-click="goToModule(2)">
					<button class="wid-100 btn btn-default btn-md text-center color-1 bd-1" >Voto electrónico</button>
				</div>
				<div class="col-xs-12 margin-t-10" ng-click="goToModule(3)">
					<button class="wid-100 btn btn-default btn-md text-center color-1 bd-1" >Ver certificado electoral</button>
				</div>
				<div class="col-xs-12 margin-t-10" ng-click='logOut()'>
					<button class="wid-100 btn btn-default btn-md text-center color-1 bd-1" >Cerrar sesion</button>
				</div>
			</div>
			<div class="modal-footer">
			    <button class="btn btn-primary btn-md" ng-click="ok($event)">OK</button>
			    <button class="btn btn-warning btn-md" ng-click="cancel($event)">Cerrar</button>
			</div>
		</div>
	</article>
	<article class="start-main-panel">
		<!-- registro de modulos -->
	    <carousel  interval="" no-controls="true" no-wrap="noWrapSlides">
	    	<slide   active="startModules==0">
			 	<div class="jumbotron bg-W bd-silver border-1px" data-sr="enter bottom please, and hustle 20px over 1s no reset">
				 	<form class="inline-b">
				      <p class="fc-dark fs-30 text-center">Registrar cédula.</p>
				      <div class="col-md-12 col-sm-12 col-xs-12">
				        <div ng-if="citizenSuccess" class="alert alert-success animation-all line-height-normal" ng-bind-html="sanitize(citizenSuccess)" role="alert"></div>
				      </div>
				      <div class="col-md-12 col-sm-12 col-xs-12">
				      <div ng-show="signUpCitizenMessage" class="alert alert-danger" role="alert">
				              <strong>
				                <UL type = disk >
				                  <LI class="text-align-auto" ng-repeat="msg in signUpCitizenMessage">[[msg]]
				                </UL>
				              </strong>
				          </div>
				      </div>
				      <div class="form-group position-relative col-md-12 col-sm-12 col-xs-12">
				        <input ng-model="newCitizen.id_number" type="text" class="form-control white" id="id_number" placeholder="*Ingrese el numero de cédula.">
				      </div>
				      <div class="form-group position-relative col-md-6 col-sm-6 col-xs-12">
				        <input ng-model="newCitizen.names" type="text" class="form-control white" id="names" placeholder="*Ingrese nombre(s).">
				      </div>
				      <div class="form-group position-relative col-md-6 col-sm-6 col-xs-12">
				        <input ng-model="newCitizen.lastnames" type="text" class="form-control white" id="lastnames" placeholder="*Ingrese apellidos.">
				      </div>
				      <div class="form-group position-relative col-md-6 col-sm-6 col-xs-12">
				      	<p class="wid-50 fs-15 float-left fc-1 no-margin">Fecha de nacimiento:</p>
				        <input ng-model="newCitizen.birthdate" type="date" class="form-control white wid-50" id="birthdate" placeholder="*Ingrese la fecha de nacimiento 01/ene/2000.">
				      </div>
				      <div class="form-group position-relative col-md-6 col-sm-6 col-xs-12">
				        <input ng-model="newCitizen.place_of_birth" type="text" class="form-control white" id="place_of_birth" placeholder="*Ingrese el lugar de nacimiento.">
				      </div>
				      <div class="form-group position-relative col-md-6 col-sm-6 col-xs-6">
				        <input ng-model="newCitizen.height" type="text" class="form-control white" id="height" placeholder="*Ingrese estatura.">
				      </div>
				      <div class="form-group position-relative col-md-6 col-sm-6 col-xs-6">
				      	<p class="wid-50 fs-15 float-left fc-1">Seleccione el R.H:</p>
				        <select ng-model="newCitizen.rh" class="form-control white wid-50" ng-options="T for T in ['O+','O-','A+','A-','B+','B-','AB+','AB-']"><option></option></select>
				      </div>
				      <div class="form-group position-relative col-md-6 col-sm-6 col-xs-6">
				      	<p class="wid-50 fs-15 float-left fc-1">Seleccione el sexo:</p>
				        <select ng-model="newCitizen.gender" class="form-control white wid-50" id="gender" ng-options="g for g in ['Masculino','Femenino']"><option></option></select>
				      </div>
				      <div class="form-group position-relative col-md-6 col-sm-6 col-xs-6">
				        <input ng-model="newCitizen.date_place_expedition" type="text" class="form-control white" id="date_place_expedition" placeholder="*Ingrese lugar y fecha de expedición.">
				      </div>
				      <div class="form-group position-relative col-md-12 col-sm-12 col-xs-12">
				        <input ng-model="newCitizen.email" type="email" class="form-control white" id="email" placeholder="*Ingrese el correo electrónico(opcional).">
				      </div>
				      <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center-items margin-plus-10 padding-sm-10" ng-click="signUpCitizen()">
				        <button class="wid-100 btn btn-primary color-4 bd-4 in-bg-W">Registrar cédula</button>
				      </div>
				      <div ng-if="processing" class="animate-if-panel progress-circular-panel center-items bg-B opacity-05">
				        <md-progress-circular  md-mode="indeterminate"></md-progress-circular>
				      </div>
				    </form>
			    </div>
		 	</slide>
		 	<slide   active="startModules==1">
			 	<div class="jumbotron bg-W bd-silver border-1px">
				 	<form class="inline-b">
				      <p class="fc-dark fs-30 text-center">Registrar candidato.</p>
				      <div class="col-md-12 col-sm-12 col-xs-12">
				        <div ng-if="candidateSuccess" class="alert alert-success animation-all line-height-normal" ng-bind-html="sanitize(candidateSuccess)" role="alert"></div>
				      </div>
				      <div class="col-md-12 col-sm-12 col-xs-12">
				      <div ng-show="signUpCandidateMessage" class="alert alert-danger" role="alert">
				              <strong>
				                <UL type = disk >
				                  <LI class="text-align-auto" ng-repeat="msg in signUpCandidateMessage">[[msg]]
				                </UL>
				              </strong>
				          </div>
				      </div>
				      <div class="form-group position-relative col-md-12 col-sm-12 col-xs-12">
				        <input ng-model="newCandidate.id_number" type="text" class="form-control white" id="id_number" placeholder="*Ingrese el numero de cédula.">
				      </div>
				      <div class="form-group position-relative col-md-6 col-sm-6 col-xs-12">
				        <input ng-model="newCandidate.names" type="text" class="form-control white" id="names" placeholder="*Ingrese nombre(s).">
				      </div>
				      <div class="form-group position-relative col-md-6 col-sm-6 col-xs-12">
				        <input ng-model="newCandidate.lastnames" type="text" class="form-control white" id="lastnames" placeholder="*Ingrese apellidos.">
				      </div>
				      <div class="form-group position-relative col-md-6 col-sm-6 col-xs-12">
				      	<p class="wid-50 fs-15 float-left fc-1 no-margin">Fecha de nacimiento:</p>
				        <input ng-model="newCandidate.birthdate" type="date" class="form-control white wid-50" id="birthdate" placeholder="*Ingrese la fecha de nacimiento 01/ene/2000.">
				      </div>
				      <div class="form-group position-relative col-md-6 col-sm-6 col-xs-12">
				        <input ng-model="newCandidate.place_of_birth" type="text" class="form-control white" id="place_of_birth" placeholder="*Ingrese el lugar de nacimiento.">
				      </div>
				      <div class="form-group position-relative col-md-6 col-sm-6 col-xs-6">
				        <input ng-model="newCandidate.height" type="text" class="form-control white" id="height" placeholder="*Ingrese estatura.">
				      </div>
				      <div class="form-group position-relative col-md-6 col-sm-6 col-xs-6">
				      	<p class="wid-50 fs-15 float-left fc-1">Seleccione el R.H:</p>
				        <select ng-model="newCandidate.rh" class="form-control white wid-50" ng-options="T for T in ['O+','O-','A+','A-','B+','B-','AB+','AB-']"><option></option></select>
				      </div>
				      <div class="form-group position-relative col-md-6 col-sm-6 col-xs-6">
				      	<p class="wid-50 fs-15 float-left fc-1">Seleccione el sexo:</p>
				        <select ng-model="newCandidate.gender" class="form-control white wid-50" id="gender" ng-options="g for g in ['Masculino','Femenino']"><option></option></select>
				      </div>
				      <div class="form-group position-relative col-md-6 col-sm-6 col-xs-6">
				        <input ng-model="newCandidate.date_place_expedition" type="text" class="form-control white" id="date_place_expedition" placeholder="*Ingrese lugar y fecha de expedición.">
				      </div>
				      <div class="form-group position-relative col-md-12 col-sm-12 col-xs-12">
				        <input ng-model="newCandidate.email" type="email" class="form-control white" id="email" placeholder="*Ingrese el correo electrónico(opcional).">
				      </div>
				      <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center-items margin-plus-10 padding-sm-10" ng-click="signUpCandidate()">
				        <button class="wid-100 btn btn-primary color-4 bd-4 in-bg-W">Registrar candidato</button>
				      </div>
				      <div ng-if="processing" class="animate-if-panel progress-circular-panel center-items bg-B opacity-05">
				        <md-progress-circular  md-mode="indeterminate"></md-progress-circular>
				      </div>
				    </form>
			    </div>
		 	</slide>
		 	<slide active="startModules==2">
			 	<div class="jumbotron bg-W bd-silver border-1px ng-hide-hidden">
				 	<form class="inline-b">
				      <p class="fc-dark fs-30 text-center">vota!</p>
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
		                 <div class="wid-100 inline-b fc-dark line-height-normal"><md-checkbox style="display: inline-block;margin-right: 3px;" ng-model="newUser.check1" aria-label="Checkbox cmt">Acepto</md-checkbox><a class="underline fc-1 hover-fc-1" target="_blank" href="https://www.google.com.co" >Términos y condiciones</a> de Dialectus.co</div>
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
	</article>
</section>