<section>
	<div class="container-fluid bg-1 padding-top-50 over-flow-hidden">
	   <div class="row center-items " data-sr="enter bottom please, and hustle 100px over 1s no reset">
	    <img class="img-responsive" src="img/signupSm.png">
	  </div>
	</div>
	<div class="padding-md-20 padding-sm-15 inline-b wid-100 no-padding-bottom no-padding-top">
		<div class="row" data-sr="enter right please, and hustle 200px over 1s no reset">
			<h1 class="col-lg-12 text-center">
				<span class="fc-1">Formulario </span>de registro
			</h1>
		</div>
		<div class="row center-items">
		<div class="jumbotron col-lg-12 col-sm-12 col-xs-10 bg fs-15" data-sr="enter left please, and hustle 200px over 1s no reset">
			<!-- formulario Registro -->
			<form>
			  <div ng-show="success" class="alert alert-success" role="alert" ng-bind-html="sanitize(success)"><strong></strong></div>
			  <div ng-show="sessionMessage" class="alert alert-danger" role="alert"><strong>[[sessionMessage]]</strong></div>
			  <div class="form-group col-lg-6 col-sm-6 col-xs-12">
			    <label for="name1">Primer nombre</label>
			    <input ng-model="form.name1" type="text" class="form-control" id="name1" placeholder="Ingrese su primer nombre."><p class="requested" title="Campo obligatorio">*</p>
			  </div>
			  <div class="form-group col-lg-6 col-sm-6 col-xs-12">
			    <label for="name2">Segundo nombre</label>
			    <input ng-model="form.name2" type="text" class="form-control" id="name2" placeholder="Ingrese su segundo nombre.">
			  </div>
			  <div class="form-group col-lg-6 col-sm-6 col-xs-12">
			    <label for="lastname1">Primer apellido</label>
			    <input ng-model="form.lastname1" type="text" class="form-control" id="lastname1" placeholder="Ingrese su primer apellido."><p class="requested" title="Campo obligatorio">*</p>
			  </div>
			  <div class="form-group col-lg-6 col-sm-6 col-xs-12">
			    <label for="lastname2">Segundo apellido</label>
			    <input ng-model="form.lastname2" type="text" class="form-control" id="lastname2" placeholder="Ingrese su segundo apellido.">
			  </div>
			  <div class="form-group col-lg-6 col-sm-6 col-xs-12">
			    <label for="email">Correo electrónico</label>
			    <input ng-model="form.email" type="text" class="form-control" id="email" placeholder="Ingrese su correo electrónico."><p class="requested" title="Campo obligatorio">*</p>
			  </div>
			  <div class="wid-100 inline-b">
				  <div class="form-group col-lg-6 col-sm-6 col-xs-12">
				    <label for="password">Contraseña</label>
				    <input ng-model="form.password" type="password" class="form-control" id="password" placeholder="Ingrese su email o nombre de usuario"><p class="requested" title="Campo obligatorio">*</p>
				  </div>
				  <div class="form-group col-lg-6 col-sm-6 col-xs-12">
				    <label for="password2">Repetir la contraseña</label>
				    <input ng-model="form.password_confirmation" type="password" class="form-control" id="password2" placeholder="Ingrese su contraseña"><p class="requested" title="Campo obligatorio">*</p>
				  </div>
			  </div>
			<div class="center-items">
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 center-items margin-plus-10 padding-sm-10" ng-click="signUp()">
						<button class="wid-100 btn btn-primary btn-large fs-15 center-items color-1 bd-1 margin-plus"><i class="icon-l mdi mdi-send"></i>  Registrarse</button>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 center-items margin-plus-10 padding-sm-10 margin-plus" ng-click="goTo('/')">
						<button class="wid-100 btn btn-primary btn-large fs-15 center-items color-4 bd-4">Cancelar</button>
					</div>
				</div>
			</div>
			</form>
			<!-- end formulario registro -->
		</div>
	</div>		

</section>