<section>
	<div class="container-fluid bg-1 padding-top-50 over-flow-hidden">
	   <div class="row center-items " data-sr="enter bottom please, and hustle 100px over 1s no reset">
	    <img class="img-responsive" src="img/city.png">
	  </div>
	</div>
	<div class="padding-md-20 padding-sm-15 inline-b wid-100 no-padding-bottom no-padding-top">
		<div class="row" data-sr="enter right please, and hustle 200px over 1s no reset">
			<h1 class="col-lg-12 text-center">
				<span class="fc-1">Iniciar </span>sesión
			</h1>
		</div>
		<div class="row center-items">
		<div class="jumbotron col-lg-6 col-xs-10 bg fs-15" data-sr="enter left please, and hustle 200px over 1s no reset">
			<!-- formulario login -->
			<form>
			  <div ng-show="success" class="alert alert-success animation-all" role="alert"><strong>[[success]]</strong></div>
			  <div ng-show="sessionMessage" class="alert alert-danger animation-all" role="alert"><strong>[[sessionMessage]]</strong></div>
			  <div class="form-group position-relative">
			    <label for="user">Email o Usuario</label>
			    <input ng-model="form.user" type="text" class="form-control" id="user" placeholder="Ingrese su email o nombre de usuario"><p class="requested" title="Campo obligatorio">*</p>
			  </div>
			  <div class="form-group position-relative">
			    <label for="password">Contraseña</label>
			    <input ng-model="form.password" type="password" class="form-control" id="password" placeholder="Ingrese su contraseña"><p class="requested" title="Campo obligatorio">*</p>
			  </div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 center-items margin-plus-10 padding-sm-10" ng-click="login()">
				<button class="wid-100 btn btn-primary btn-large fs-15 center-items color-1 bd-1 margin-plus"><i class="icon-l mdi mdi-send"></i>  Iniciar sesión</button>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 center-items margin-plus-10 padding-sm-10 margin-plus" ng-click="goTo('/signup')">
				<button class="wid-100 btn btn-primary btn-large fs-15 center-items color-4 bd-4">Registrarse</button>
			</div>
			<div class="wid-100 center-items padding-t-b-10 fs-15">
			     <a href="" ng-click="login()">Recordar mi contraseña</a>
			  </div>
			</form>
			<!-- end formulario login -->
		</div>
	</div>		

</section>