<div class="line-height-0" data-sr-container='{ "reset":true, "vFactor": 0.10, "mobile": true }' >
<section class="video-panel">
	<nav class="navbar navbar-default navbar-fixed-top animation-all">
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
		    <li class="nav-top-li center-items margin-t-10" ng-click="openLoginAside('right',true,0)" data-backdrop="static" data-toggle="modal" data-target="#modalLogin">
				<a><button class="btn btn-primary btn-md text-center color-1 bd-1" >Iniciar sesión</button></a>
			</li>
			<li class="nav-top-li center-items margin-t-10" ng-click="openLoginAside('right',true,2)">
				<a><button class="btn btn-primary btn-md text-center color-4 bd-4">Registrarte</button></a>
			</li>
	      	<a id="showModalRemember" class="fc-W hover-fc-3 hidden"data-backdrop="static" data-toggle="modal" data-target="#modalRemember" >Link oculto</a>
	  	</ul>
	  </div>
	</nav>
	<header id="header">
		<div class="video-overlay"></div>
		<carousel interval="10000" no-controls="true" no-wrap="noWrapSlides" class="carousel-fade-in">
    		<slide  ng-repeat="slide in headerSlides" active="slide.active">
				<img class="img-index-module" src="[['img/'+ slide.img +'.jpg']]"></img>
			</slide>
		</carousel>
	</header>
	<div class="header-content">
		<div class="wid-100 center-items">
			<div class="col-xs-12 col-sm-10 col-md-8 col-lg-8">
				<!-- login -->
				<div class="jumbotron bg-W bd-silver border-1px display-box position-relative animate-if-fadeIn-Out" ng-if="sessionSlides==0" ng-init="checkLogin()">
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
								<div class="col-xs-12 margin-t-10" ng-click='goTo("/start")'>
									<button class="wid-100 btn btn-default btn-md text-center color-1 bd-1" >Continuar como [[activeSession.name1]]</button>
								</div>
								<div class="col-xs-12 margin-t-10" ng-click='logOut()'>
									<button class="wid-100 btn btn-default btn-md text-center color-1 bd-1" >Cerrar sesion</button>
								</div>
							</div>
						</div>
				 	</div>
				 	<form ng-if="!activeSession  && !check" class="inline-b animate-if-fadeIn-Out">
				      <p class="fc-dark fs-30 text-center">Ingresar como funcionario a Registraduria.gov.co!</p>
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
			    <!-- fin login -->
			    <!-- recordar contraseña -->
			    <div class="jumbotron bg-W bd-silver border-1px position-relative animate-if-fadeIn-Out" ng-init="checkLogin()" ng-if="sessionSlides==1">
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
			    <!-- fin recordar contraseña -->
			    <!-- registro -->
			    <div class="jumbotron bg-W bd-silver border-1px ng-hide-hidden animate-if-fadeIn-Out" ng-if="sessionSlides==2">
				 	<form class="inline-b">
				      <p class="fc-dark fs-30 text-center">Registrarse como funcionario!</p>
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
				        <button class="wid-100 btn btn-primary color-4 bd-4 in-bg-W">Registrarse</button>
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
			</div>
		</div>
	</div>
</section>
<!-- panel ¿QUE ES? -->
<section id="showMore" class="padding-md-20 padding-sm-15 inline-b no-padding-bottom bg-W over-flow-hidden">
	<article class="col-md-12 col-xs-12">
		<div class="wid-100 center-items">
			<div class="col-md-6">
				<!-- <div class="col-md-12 col-sm-12 col-xs-12 center-items" data-sr="wait 0.1s enter top please, and hustle 30px over 1s no reset">
	            	<h2 class="fc-1 fs-50 fs-xs-40">¿Por qué?</h2>
				</div> -->
				<div class="col-md-12 col-sm-12 col-xs-12 center-items" data-sr="wait 0.1s enter bottom please, and hustle 30px over 1s no reset">
					<img class="img-responsive" src="img/logoRegistraduria2015Red.png"></img>
				</div>
			</div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 center-items" data-sr="wait 0.1s enter left please, and hustle 30px over 1s no reset">
        	<div class="col-md-10">
        		<h4 class="fc-1 center-text">Es una plataforma creada para romper la barrera de comunicacion que existe entre los dialectos de diferentes regiones.</h4>
        	</div>
		</div>
	</article>
	<article class="col-md-12 no-padding-bottom" >
		<div class="col-md-12">
			<div ng-repeat="item in characters" class="col-md-4 col-xs-12" data-sr="wait 0.[[$index + 7]]s enter bottom please, and hustle 30px over 1s no reset">
				<div class="col-md-12">
					<img class="img-responsive breathe" src="[['img/' + item.img]]"></img>
				</div>
			</div>
		</div>	
	</article>
</section>
<!-- Fin panel ¿QUE ES? -->
<!-- panel BUSQUEDA AVANZADA -->
<section id="query">
	<div class="wid-100 over-flow-hidden position-relative" id="contacto">
	    <!-- Content Row -->
        <!-- Map Column -->
        <div class="wid-100 google-maps-container">
        </div>
        <!-- /.row -->
        <div class="position-absolute wid-100" style="top: 0;">
    	<div class="overlay-index-module bg-gradient-1 opacity-08" style="z-index:1;"></div>

        <!--Columna Busqueda-->
        <div class="col-md-12 padding-md-20 padding-sm-15 padding-xs-t-100" style="z-index:2;">
        	<div class="wid-100 center-items">
				<div class="col-md-6">
					<div class="col-md-12 col-sm-12 col-xs-12 center-items" data-sr="wait 0.1s enter top please, and hustle 30px over 1s no reset">
		            	<h2 class="fc-W fs-50 fs-xs-40 text-center">Realiza tu busqueda avanzada!.</h2>
					</div>
					
				</div>
	        </div>
            <!-- formulario de busqueda -->
            <div class="row block-contact-form no-margin center-items" data-sr="wait 0.1s enter bottom please, and hustle 30px over 1s no reset"  style="z-index:2;" >
                <div class="col-md-12 col-sm-12">
                    <h3 class="fc-w">Escribe aqui una frase</h3>
                    <form  id="contactForm" onSubmit= "validateForm(this); return false" >
                    	<div class="form-group col-lg-6 col-sm-6 col-xs-12">
			            	<input ng-model="form.name" type="text" class="form-control white" id="name" placeholder="*Ingrese su nombre completo.">
			          	</div>
			          	<div class="form-group col-lg-12 col-sm-12 col-xs-12">
			            	<input ng-model="form.email" type="text" class="form-control white" id="email" placeholder="*Ingrese su correo electrónico.">
			          	</div>
			          	<div class="form-group col-lg-12 col-sm-12 col-xs-12">
			          		<textarea rows="4" cols="100" ng-model="form.message" type="text" class="form-control white" id="message"  placeholder="*Ingrese su mensaje." maxlength="999" style="resize:none;border-radius: 80px;padding-left: 50px;padding-right: 50px;"></textarea>
			          	</div>
                        <div class="col-md-12">
                        	<div id="success"></div>
                    	</div>
                        <!-- For success/fail messages -->
                        <div class="col-md-12 ">
                        	<button class="btn btn-primary btn-md text-center color-1 bd-1 float-right"> Envíar consulta</button>
                        </div>
                    </form>
                </div>
        	</div>
        <!-- /.row -->
    	</div>
	</div>
</section>
<!-- fin panel BUSQUEDA AVANZADA -->
<!-- panel ¿QUE ES? -->
<section id="lawyers" class="padding-md-20 padding-sm-15 inline-b bg-3 over-flow-hidden">
	<article class="col-md-12 col-xs-12">
		<div class="wid-100 center-items">
			<div class="col-md-6">
				<div class="col-md-12 col-sm-12 col-xs-12 center-items" data-sr="wait 0.1s enter top please, and hustle 30px over 1s no reset">
	            	<h2 class="fc-W fs-50 fs-xs-40 text-center">Estos son nuestros abogados destacados.</h2>
				</div>
				
			</div>
        </div>
		<div class="wid-100">
			<carousel interval="myInterval" no-wrap="noWrapSlides">
		      <slide ng-repeat="slide in filteredLawyers" active="slide.active">
		        <div ng-repeat="item in slide" class="team-card col-md-4 col-xs-12 padding-t-b-10-auto">
					<div class="col-md-12 center-items">
						<div class="wid-50">
							<img class="img-responsive border-radius" src="[['img/' + item.img]]"></img>
						</div>
					</div>
					<div class="col-md-12">
						<div class="wid-100">
							<h2 class="fc-4">[[item.title]]</h2>
							<h3 class="fc-G">[[item.text]]</h3>
							<p class="fc-G">[[item.description]]</p>
							<!-- <div class="col-md-12 col-sm-12 center-items" data-sr="wait 0.1s enter bottom please, and hustle 30px over 1s no reset" ng-bind-html="sanitize(item.button)">
								<div class="wid-100 margin-t-10" ng-click='showModalSignup()' data-backdrop="static" data-toggle="modal" data-target="#modalSignup">
									<button class="wid-100 btn btn-default btn-md text-center color-1 bd-1" >Registrarte es facil y rapido!</button>
								</div>
							</div> -->
						</div>
					</div>
				</div>
		      </slide>
		    </carousel>
        </div>
	</article>
</section>
<!-- Fin panel ¿QUE ES? -->    
<!-- panel CONTACTO -->
<section id="contact">
	<div class="wid-100 over-flow-hidden position-relative" id="contacto">
	    <!-- Content Row -->
        <!-- Map Column -->
        <div class="wid-100 google-maps-container">
            <!-- Embedded Google Map -->
            <iframe width="100%" class="filter-blur" height="664px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3966.022146518516!2d-75.5896279!3d6.2608129!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e442911b7cd3737%3A0x1dfcdbe37ab6862d!2sCalle+51+%23+73-70%2C+Medell%C3%ADn%2C+Antioquia%2C+Colombia!5e0!3m2!1ses!2ses!4v1423949350356"></iframe>
        </div>
        <!-- /.row -->
        <div class="position-absolute wid-100" style="top: 0;">
    	<div class="overlay-index-module" style="z-index:1;"></div>

        <!-- Contact Details Column -->
        <div class="col-md-12 padding-md-20 padding-sm-15" style="z-index:2;">
        	<div class="wid-100 center-items">
				<div class="col-md-6">
					<div class="col-md-12 col-sm-12 col-xs-12 center-items" data-sr="wait 0.1s enter top please, and hustle 30px over 1s no reset">
		            	<h2 class="fc-1 fs-50 fs-xs-40">Puedes Contactarnos.</h2>
					</div>
					
				</div>
	        </div>
        	<div class="col-md-5 col-sm-5 block-contact-form" data-sr="wait 0.1s enter left please, and hustle 30px over 1s no reset" >
                <h3 class="fc-1" >Detalles de contacto </h3>
                <p>
                    Desarrollo Di'verso s.a.s<br>Calle 51 # 73 - 65<br>Medellín, Antioquia Colombia
                </p>
                <p><i class="mdi mdi-cellphone-iphone"></i><abbr title="Phone"> Telefono</abbr>: +57 301 356 61 26</p>
                <p><i class="fa fa-envelope-o"></i> 
                    <span class="glyphicon glyphicon-envelope"></span><abbr title="Email"> E-mail</abbr>: <a class="fc-1">contacto@desarrollodiverso.com.co</a>
                </p>
                <p><i class="mdi mdi-clock"></i><abbr title="Hours"> Horario</abbr>: Lunes - Viernes: 8:00 AM a 6:00 PM</p>
            </div>      
            <!-- formulario de contacto -->
            <!-- para ejecutar este formulario se requiere el archivo php/contact_me.php -->
            <div class="row block-contact-form no-margin" data-sr="wait 0.1s enter right please, and hustle 30px over 1s no reset"  style="z-index:2;" >
                <div class="col-md-7 col-sm-7">
                    <h3 class="fc-1">Dejanos tu Mensaje</h3>
                    <form  id="contactForm" onSubmit= "validateForm(this); return false" >
                    	<div class="form-group col-lg-6 col-sm-6 col-xs-12">
			            	<input ng-model="form.name" type="text" class="form-control" id="name" placeholder="*Ingrese su nombre completo.">
			          	</div>
			          	<div class="form-group col-lg-6 col-sm-6 col-xs-12">
			            	<input ng-model="form.phone" type="phone" class="form-control" id="phone" placeholder="*Ingrese su número de teléfono.">
			          	</div>
			          	<div class="form-group col-lg-12 col-sm-12 col-xs-12">
			            	<input ng-model="form.email" type="text" class="form-control" id="email" placeholder="*Ingrese su correo electrónico.">
			          	</div>
			          	<div class="form-group col-lg-12 col-sm-12 col-xs-12">
			          		<textarea rows="4" cols="100" ng-model="form.message" type="text" class="form-control" id="message"  placeholder="*Ingrese su mensaje." maxlength="999" style="resize:none;border-radius: 80px;padding-left: 50px;padding-right: 50px;"></textarea>
			          	</div>
                        <div class="col-md-12">
                        	<div id="success"></div>
                    	</div>
                        <!-- For success/fail messages -->
                        <div class="col-md-12 ">
                        	<button class="btn btn-primary btn-md text-center color-1 bd-1 float-right"> Envíar mensaje</button>
                        </div>
                    </form>
                </div>
        	</div>
        <!-- /.row -->
    	</div>
	</div>
    </section>
    <!-- fin panel CONTACTO -->
<a id="backTop" class="back-to-top bg-1" scroll-to="header"><i class="fc-W pointer mdi mdi-arrow-up"></i></a>
<footer id="footer" class="bg-1">

	<div data-sr="enter bottom please, and hustle 10px over 1s no reset" class="col-md-6 col-sm-12 col-xs-12 float-left inlineb margin-t-30">
		<nav class="wid-100">
				<div class="col-md-3 col-sm-3 col-xs-12 float-left center-items" ng-click="goTo('/da')"><a href=""><p>Home</p></a></div>
				<div class="col-md-3 col-sm-3 col-xs-12 float-left center-items"><a href=""><p>Quienes somos</p></a></div>
				<div class="col-md-3 col-sm-3 col-xs-12 float-left center-items"><a href=""><p>FAQ</p></a></div>
				<div class="col-md-3 col-sm-3 col-xs-12 float-left center-items" ng-click="goTo('/login')"><a href=""><p>Iniciar sesión</p></a></div>
		</nav>
	</div>

	<div data-sr="wait 0.5s enter bottom please, and hustle 10px over 1s no reset" class="col-md-6 col-sm-12 col-xs-12 float-left inlineb">
		<div class="col-md-6 col-md-6 col-xs-12 center-text margin-t-30 float-left ">
		  <p class="fs-15 fc-W">Síguenos en nuestras redes sociales</p>
		</div>
		<article class="col-md-6 col-md-6 col-xs-12 center-items margin-plus float-left">
				<div class="icon-social"><a target="_blank"href=""><i class="fc-1 pointer mdi mdi-facebook"></i></a></div>
				<div class="icon-social"><a target="_blank"href=""><i class="fc-1 pointer mdi mdi-instagram"></i></a></div>
				<div class="icon-social"><a target="_blank"href=""><i class="fc-1 pointer mdi mdi-twitter"></i></a></div>
				<div class="icon-social"><a target="_blank"href=""><i class="fc-1 pointer mdi mdi-youtube-play"></i></a></div>
		</article>
	</div>


</footer>
</div>

<!-- Ventana emergente para iniciar sesion-->
<div ng-if="modalLoginShow">
  <div data-modal-login></div>
</div>

<!-- Ventana emergente para Registrarte-->
<div ng-if="modalSignupShow">
  <div data-modal-signup></div>
</div>

<!-- Ventana emergente para Registrarte-->
<div ng-if="modalRememberShow">
  <div data-modal-remember></div>
</div>