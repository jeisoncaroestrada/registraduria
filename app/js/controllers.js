angular.module("Registraduria")
.controller('LoginCtrl',function($scope,$http,$location,$rootScope,$sce,$timeout,$window,$modalInstance,slides){

	//funcion que cierra el aside de login
	$scope.ok = function(e) {
	    $modalInstance.close();
	    e.stopPropagation();
	};

	//funcion que cierra el aside de login
	$scope.cancel = function(e) {
	    $modalInstance.dismiss();
	    e.stopPropagation();
	};

	//elemento que contiene los errores en los diferentes formularios
	$scope.loginMessage = false;
	$scope.signUpMessage = false;
	//elemento que muestra el mensaje cuando el usuario inicio session correctamente
	$scope.loginSuccess = false;

	//esta funcion limpia todos los formularios cuando se cambia de 'slide' en el 'aside' de login
	$scope.initializeForms = function(){


		//se instancia el objeto que contienen los datos que se ingresan en el formulario HTML de login
		$scope.loginForm = {
			user: '',
			password: '',
		}

		//se instancia el objeto que contiene todos los campos del formulario HTML de signUp
		$scope.newUser = {

			check1: '',
			password_confirmation: '',
			password: '',
			email: '',
			name1: ''

		};

		//se instancia el objeto que contienen los datos que se ingresan en el formulario HTML de recordar contraseña
		$scope.rememberForm = {
			user: '',
		}
	}

	$scope.initializeForms();

	//el objeto eredado desde HomeCtrl que contienen las imagenes de fondo del carrusel del header
	$scope.slides = slides

	//funcion que cambia los slides
	$scope.goToSlide = function (slide) {
		
		if (slide == 0) {

			$scope.slides[0].active=true;
			$scope.initializeForms();
			$scope.loginMessage = false;
		}else if (slide == 1) {

			$scope.slides[1].active=true;
			$scope.initializeForms();
			$scope.rememberSuccess = false;
			$scope.rememberMessage = false;
		}else{

			$scope.slides[2].active=true;
			$scope.initializeForms();
			$scope.signUpMessage = false;
		};
	}

    $timeout(function(){
		$scope.modalLoginShow = true;
	    $('#showModalLogin').trigger('click');
	}, 1000)
	
	//funcion que verifica que usuario esta logueado actualmente 
    $scope.checkLogin = function(){
		$scope.check = true;

		$http.post('loginCheck', [''])
	    .success(function(data)
	    {	
	    	
	    	if(data['error']){

			}else if(data['name1']){

				$scope.activeSession = data;
				//$location.path( "/login" );

			}

			$scope.check = false;

	    })
	    .error(function(data)
	    {
	    	$scope.loginMessage = 'Por favor ingrese el Usuario y Contraseña';
	    });
    };

	//funcion que valida el inicio de sesion 
	$scope.login = function(){

		$scope.processing = true
        //peticion al servidor usando php
        $http.post('login', $scope.loginForm)
        .success(function(data)
        {	
        	
        	if(data['error']){
        		$scope.loginMessage = [data['error']]
    		}else if(data['active']){
    			$scope.loginMessage = data;
    		}else if(data['name1']){
    			$scope.loginMessage = false
    			$scope.loginSuccess = 'Bienvenido! ' + data['name1']
    			$location.path( "/login" );

    		}

    		$scope.processing = false

        })
        .error(function(data)
        {
        	$scope.loginMessage = [];
			for(var m in data) {
			   $scope.loginMessage.push(data[m][0]);
			}
			
        	$scope.processing = false
        });       
	};

	//cierra la actual sesion
    $scope.logOut = function () {

    	$scope.check = true

		//peticion al servidor usando php
        $http.post('logout', [''])
        .success(function(data)
        {	
        	
        	if(data['error']){
        		$scope.sessionMessage = data['error']
    		}else if(data['success']){
    			$scope.activeSession = false;
    			$scope.checkLogin();
    			
    		}

        })
        .error(function(data)
        {
        	$scope.sessionMessage = 'Por favor ingrese todos los datos'
        });
		
	};

	$scope.signUp = function(){

		$scope.processing = true;
		$scope.signUpSuccess = false;

		if(!$scope.newUser.check1){//condicion que valida que los checkbox se seleccionen

			$scope.newUser.check1 = '';
		}


        //peticion al servidor usando http
        $http.post('signup', $scope.newUser)
        .success(function(data)
        {	
        	
        	if(data['success']){
				$scope.signUpMessage = false;
        		$scope.success = data['success']
        		$scope.newUser = {

					password_confirmation: '',
					password: '',
					email: '',
					name1: ''

				};

    		}else{

    		}

        	$scope.processing = false
    		

        })
        .error(function(data)
        {
        	$scope.signUpMessage = [];
			for(var m in data) {
			   $scope.signUpMessage.push(data[m][0]);
			}
			
        	$scope.processing = false
        });

       
	};


	//funcion que se encarga de enviar la peticion al servidor para restablecer la contraseña
	$scope.rememberPassword = function(){

		$scope.processing = true
		$scope.isRemember = true;
        //peticion al servidor usando php
        $http.post('remember', {user:$scope.rememberForm.user})
        .success(function(data)
        {	
        	
        	if(data['error']){
        		$scope.rememberSuccess = false;
        		$scope.rememberMessage = [data['error']]
    		}else if(data['success']){
    			$scope.rememberMessage = false
    			$scope.rememberSuccess = false;
    			$scope.rememberSuccess = data['success']
    			$timeout(function(){
    				location.reload();
	   			}, 20000)
    		}

    		$scope.processing = false

        })
        .error(function(data)
        {
        	$scope.rememberSuccess = false;
        	$scope.rememberMessage = [];
			for(var m in data) {
			   $scope.rememberMessage.push(data[m][0]);
			}
			
        	$scope.processing = false
        });       
	};

	// Para usar el html en angular
	$scope.sanitize = function (item) {
		if(!item) return
		return $sce.trustAsHtml(item);
	}


})

.controller('SignupCtrl',function($scope,$http,$location,$rootScope,$sce){

	$scope.sessionMessage = false;
	$scope.success = false;

	//se instancia el objeto que contiene todos los campos del formulario
	$scope.form = {

		check1: '',
		check2: '',
		password_confirmation: '',
		password: '',
		email: '',
		lastname2: '',
		lastname1: '',
		name2: '',
		name1: ''

	};

	// Para usar el html en angular
	$scope.sanitize = function (item) {
		if(!item) return
		return $sce.trustAsHtml(item);
	}

	$scope.signUp = function(){

		$scope.processing = true;
		$scope.success = false;

		if(!$scope.form.check1){//condicion que valida que los checkbox se seleccionen

			$scope.form.check1 = '';
		}


        //peticion al servidor usando http
        $http.post('signup', $scope.form)
        .success(function(data)
        {	
        	
        	if(data['success']){
				$scope.sessionMessage = false;
        		$scope.success = data['success']
        		$scope.form = {

					password_confirmation: '',
					password: '',
					email: '',
					lastname2: '',
					lastname1: '',
					name2: '',
					name1: ''

				};

    		}else{

    		}

        	$scope.processing = false
    		

        })
        .error(function(data)
        {
        	$scope.sessionMessage = [];
			for(var m in data) {
			   $scope.sessionMessage.push(data[m][0]);
			}
			
        	$scope.processing = false
        });

       
	};

	

})

.controller('VerifyCtrl',function($scope,$http,$location,$rootScope,$sce,$stateParams){

	$scope.success = '<span class="is-error bold-600">!Ocurrio un error </span>por favor abrir el enlace directamente del correo o verficar que copie y pegue la direccion completa';
	$scope.img = 'error';
	$scope.processing = true

	//se instancia el objeto que contiene todos los campos del formulario
	$scope.form = {
		token: $stateParams.c,
		code: $stateParams.n,
	};

	// Para usar el html en angular
	$scope.sanitize = function (item) {
		if(!item) return
		return $sce.trustAsHtml(item);
	}

        //peticion al servidor usando php
        $http.post('verify', $scope.form)
        .success(function(data)
        {	
        	
        	if(data['success']){
        		$scope.success = data['success']
        		$scope.img = 'verify';
    		}else{
    			$scope.success = data['error']
    			$scope.img = 'error';
    		};
    		$scope.processing = false;
        })
        .error(function(data)
        {
        	$scope.processing = false;
        	$scope.success = '<span class="is-error bold-600">!Ocurrio un error </span>por favor abrir el enlace directamente del correo o verficar que copie y pegue la direccion completa'
        });    

	

})

.controller('ChangePasswordCtrl',function($scope,$http,$location,$rootScope,$sce,$stateParams){

	$scope.verifyMsg = '';
	$scope.img = 'error';
	$scope.checking = true

	//se instancia el objeto que contiene todos los campos del formulario
	$scope.form = {
		token: $stateParams.c,
		code: $stateParams.n,
		user: '',
		email: '',
		password: '',
		password_confirmation: ''
	};

	console.log($scope.form);

	// Para usar el html en angular
	$scope.sanitize = function (item) {
		if(!item) return
		return $sce.trustAsHtml(item);
	}

    //peticion al servidor usando php para verificar que la url tenga los parametros validos para realizar el cambio de contraseña
    $http.post('verifyUser', $scope.form)
    .success(function(data)
    {	
    	
    	if(data['user']){
    		$scope.img = 'verify';
    		$scope.form.user = data['user'].name1 +' ' + data['user'].lastname1;
    		$scope.form.email = data['user'].email;
    		$scope.verifyMsg = '<span class="is-success bold-600">Ahora puedes cambiar</span> tu contraseña de ingreso a Registraduria.net';

		}else{
			$scope.verifyMsg = data['error']
			$scope.img = 'error';
		};
		$scope.checking = false;
    })
    .error(function(data)
    {
    	$scope.checking = false;
    	$scope.verifyMsg = '<span class="is-error bold-600">!Ocurrio un error </span>por favor abrir el enlace directamente del correo o verficar que copie y pegue la direccion completa'
    }); 

    //funcion que cambia la contraseña para el usuario enviado por url 
	$scope.changePassword = function(){

		$scope.processing = true
        //peticion al servidor usando php
        $http.post('changePassword', $scope.form)
        .success(function(data)
        {	
        	
        	
			$scope.sessionMessage = false
			$scope.success = data['success']
    		$scope.processing = false
        })
        .error(function(data)
        {
        	$scope.sessionMessage = [];
        	console.log(data);
			for(var m in data) {
			   $scope.sessionMessage.push(data[m][0]);
			}
			
        	$scope.processing = false
        });       
	};   

	

})


// *****************************************************************************
// Controlador de la vista LandingPage
// *****************************************************************************
.controller('HomeCtrl',function($scope,$http,$location,$rootScope,$window,$timeout,$sce,$aside){

	//funcion que se ejecuta para adaptar el fondo del header al tamaño de pantalla
	angular.element($window).bind('resize', function() {
       	$rootScope.windowHeight = $window.innerHeight;
       	$rootScope.windowWidth = $window.innerWidth;

		$( ".video-panel" ).css( "min-height", $window.innerHeight );
    })

    $( ".video-panel" ).css( "min-height", $window.innerHeight );

    //objeto que contiene los imagenes qeu pasan de fondo en el header 
    $scope.headerSlides = [
    	{
    		img: 'pic1'
    	},
    	{
    		img: 'pic7'
    	},
    	{
    		img: 'pic8'
    	}
    ]

    //objeto que contiene los diferentes formularios de registro de login y de recordar contraseña 
    $scope.sessionSlides = 0

	$scope.noWrapSlides = true;
	$scope.myInterval = 10000;	

	
	//elemento que contiene los errores en los diferentes formularios
	$scope.loginMessage = false;
	$scope.signUpMessage = false;
	//elemento que muestra el mensaje cuando el usuario inicio session correctamente
	$scope.loginSuccess = false;

	//esta funcion limpia todos los formularios cuando se cambia de 'slide' en el 'aside' de login
	$scope.initializeForms = function(){


		//se instancia el objeto que contienen los datos que se ingresan en el formulario HTML de login
		$scope.loginForm = {
			user: '',
			password: '',
		}

		//se instancia el objeto que contiene todos los campos del formulario HTML de signUp
		$scope.newUser = {

			check1: '',
			password_confirmation: '',
			password: '',
			email: '',
			name1: ''

		};

		//se instancia el objeto que contienen los datos que se ingresan en el formulario HTML de recordar contraseña
		$scope.rememberForm = {
			user: '',
		}
	}

	$scope.initializeForms();

	//funcion que cambia los slides de session
	$scope.goToSlide = function (slide) {
		
		if (slide == 0) {

			$scope.sessionSlides = 0;
			$scope.initializeForms();
			$scope.loginMessage = false;
		}else if (slide == 1) {

			$scope.sessionSlides = 1;
			$scope.initializeForms();
			$scope.rememberSuccess = false;
			$scope.rememberMessage = false;
		}else{

			$scope.sessionSlides = 2;
			$scope.initializeForms();
			$scope.signUpMessage = false;
		};
	}

    $timeout(function(){
		$scope.modalLoginShow = true;
	    $('#showModalLogin').trigger('click');
	}, 1000)
	
	//funcion que verifica que usuario esta logueado actualmente 
    $scope.checkLogin = function(){
		$scope.check = true;

		$http.post('loginCheck', [''])
	    .success(function(data)
	    {	
	    	
	    	if(data['error']){

			}else if(data['name1']){

				$scope.activeSession = data;
				//$location.path( "/login" );

			}

			$scope.check = false;

	    })
	    .error(function(data)
	    {
	    	$scope.loginMessage = 'Por favor ingrese el Usuario y Contraseña';
	    });
    };


	//funcion que valida el inicio de sesion 
	$scope.login = function(){

		$scope.processing = true
        //peticion al servidor usando php
        $http.post('login', $scope.loginForm)
        .success(function(data)
        {	
        	
        	if(data['error']){
        		$scope.loginMessage = [data['error']]
    		}else if(data['active']){
    			$scope.loginMessage = data;
    		}else if(data['name1']){
    			$scope.loginMessage = false
    			$scope.loginSuccess = 'Bienvenido! ' + data['name1']
    			$location.path( "/start" );

    		}

    		$scope.processing = false

        })
        .error(function(data)
        {
        	$scope.loginMessage = [];
			for(var m in data) {
			   $scope.loginMessage.push(data[m][0]);
			}
			
        	$scope.processing = false
        });       
	};

	//cierra la actual sesion
    $scope.logOut = function () {

    	$scope.check = true

		//peticion al servidor usando php
        $http.post('logout', [''])
        .success(function(data)
        {	
        	
        	if(data['error']){
        		$scope.sessionMessage = data['error']
    		}else if(data['success']){
    			$scope.activeSession = false;
    			$scope.checkLogin();
    			
    		}

        })
        .error(function(data)
        {
        	$scope.sessionMessage = 'Por favor ingrese todos los datos'
        });
		
	};

	$scope.signUp = function(){

		$scope.processing = true;
		$scope.signUpSuccess = false;

		if(!$scope.newUser.check1){//condicion que valida que los checkbox se seleccionen

			$scope.newUser.check1 = '';
		}


        //peticion al servidor usando http
        $http.post('signup', $scope.newUser)
        .success(function(data)
        {	
        	
        	if(data['success']){
				$scope.signUpMessage = false;
        		$scope.success = data['success']
        		$scope.newUser = {

					password_confirmation: '',
					password: '',
					email: '',
					name1: ''

				};

    		}else{

    		}

        	$scope.processing = false
    		

        })
        .error(function(data)
        {
        	$scope.signUpMessage = [];
			for(var m in data) {
			   $scope.signUpMessage.push(data[m][0]);
			}
			
        	$scope.processing = false
        });

       
	};


	//funcion que se encarga de enviar la peticion al servidor para restablecer la contraseña
	$scope.rememberPassword = function(){

		$scope.processing = true
		$scope.isRemember = true;
        //peticion al servidor usando php
        $http.post('remember', {user:$scope.rememberForm.user})
        .success(function(data)
        {	
        	
        	if(data['error']){
        		$scope.rememberSuccess = false;
        		$scope.rememberMessage = [data['error']]
    		}else if(data['success']){
    			$scope.rememberMessage = false
    			$scope.rememberSuccess = false;
    			$scope.rememberSuccess = data['success']
    			$timeout(function(){
    				location.reload();
	   			}, 20000)
    		}

    		$scope.processing = false

        })
        .error(function(data)
        {
        	$scope.rememberSuccess = false;
        	$scope.rememberMessage = [];
			for(var m in data) {
			   $scope.rememberMessage.push(data[m][0]);
			}
			
        	$scope.processing = false
        });       
	};

	// Para usar el html en angular
	$scope.sanitize = function (item) {
		if(!item) return
		return $sce.trustAsHtml(item);
	}

})



// *****************************************************************************
// Controlador de la vista de inicio
// *****************************************************************************
.controller('StartCtrl',function($scope,$http,$location,$rootScope,$sce,$timeout,$aside){
	//funcion que verifica que usuario esta logueado actualmente 
    $scope.checkLogin = function(){
		$scope.check = true;

		$http.post('loginCheck', [''])
	    .success(function(data)
	    {	
	    	
	    	if(data['error']){
				$location.path( "/" );

			}else if(data['name1']){

				$scope.activeSession = data;

			}

			$scope.check = false;

	    })
	    .error(function(data)
	    {
	    	$scope.loginMessage = 'Por favor ingrese el Usuario y Contraseña';
	    });
    };

    $scope.checkLogin();

    //objeto que contiene los diferentes modulos de la aplicacion 
    $scope.startModules = 0

	$scope.openAside = function(position, backdrop) {
      $scope.asideState = {
        open: true,
        position: position
      };
      
      
      function postClose() {
        $scope.asideState.open = false;
      }
      
      $aside.open({
        templateUrl: 'views/common/mainMenu.blade.php',
        placement: position,
        size: 'sm',
        backdrop: backdrop,
        controller: function($scope, $modalInstance) {

        	$scope.ok = function(e) {
	            $modalInstance.close();
	            e.stopPropagation();
            };

	        $scope.cancel = function(e) {
	            $modalInstance.dismiss();
	            e.stopPropagation();
	        };

        }
      }).result.then(postClose, postClose);
    }

    //cierra la actual sesion
    $scope.logOut = function () {

    	$scope.check = true

		//peticion al servidor usando php
        $http.post('logout', [''])
        .success(function(data)
        {	
        	
        	if(data['error']){
        		$scope.sessionMessage = data['error']
    		}else if(data['success']){
    			$scope.activeSession = false;
    			$scope.checkLogin();
    			
    		}

        })
        .error(function(data)
        {
        	$scope.sessionMessage = 'Por favor ingrese todos los datos'
        });
		
	};

	//esta funcion limpia todos los formularios cuando se cambia de 'slide' en el 'aside' de login
	$scope.initializeForms = function(){


		//se instancia el objeto que contienen los datos que se ingresan en el formulario HTML de login
		$scope.newCitizen = {
			id_number:'',
			names: '',
			lastnames: '',
			birthdate: '',
			place_of_birth: '',
			height: '',
			gender: '',
			rh: '',
			date_place_expedition: '',
			email: '',
		}

		//se instancia el objeto que contiene todos los campos del formulario HTML de signUp
		$scope.newCandidate = {
			id_number:'',
			names: '',
			lastnames: '',
			birthdate: '',
			place_of_birth: '',
			height: '',
			gender: '',
			rh: '',
			date_place_expedition: '',
			email: '',
		}

		//se instancia el objeto que contienen los datos que se ingresan en el formulario HTML de recordar contraseña
		$scope.rememberForm = {
			user: '',
		}
	}

	$scope.initializeForms();

	//funcion que cambia los slides de session
	$scope.goToModule = function (module) {
		
		if (module == 0) {

			$scope.startModules = 0;
			$scope.initializeForms();
			$scope.citizenSuccess = false;
			$scope.signUpCitizenMessage = false;
		}else if (module == 1) {

			$scope.startModules = 1;
			$scope.initializeForms();
			$scope.rememberSuccess = false;
			$scope.citizenSuccess = false;
			$scope.rememberMessage = false;
		}else{

			$scope.startModules = 2;
			$scope.initializeForms();
			$scope.signUpMessage = false;
		};
	}

	$scope.signUpCitizen = function(){

		$scope.processing = true;
		$scope.citizenSuccess = false;

        //peticion al servidor usando http
        $http.post('signUpCitizen', $scope.newCitizen)
        .success(function(data)
        {	
        	
        	if(data['success']){
				$scope.signUpCitizenMessage = false;
        		$scope.citizenSuccess = data['success']
        		$scope.newCitizen = {
					id_number:'',
					names: '',
					lastnames: '',
					birthdate: '',
					place_of_birth: '',
					height: '',
					gender: '',
					rh: '',
					date_place_expedition: '',
					email: '',
				}

    		}else{

    		}

        	$scope.processing = false
    		

        })
        .error(function(data)
        {
        	$scope.signUpCitizenMessage = [];
			for(var m in data) {
			   $scope.signUpCitizenMessage.push(data[m][0]);
			}
			
        	$scope.processing = false
        });

       
	};

	$scope.signUpCandidate = function(){

		$scope.processing = true;
		$scope.signUpCandidateMessage = false;
		$scope.candidateSuccess = false;

        //peticion al servidor usando http
        $http.post('signUpCandidate', $scope.newCandidate)
        .success(function(data)
        {	
        	
        	if(data['success']){
				$scope.signUpCandidateMessage = false;
        		$scope.candidateSuccess = data['success']
        		$scope.newCcandidates = {
					id_number:'',
					names: '',
					lastnames: '',
					birthdate: '',
					place_of_birth: '',
					height: '',
					gender: '',
					rh: '',
					date_place_expedition: '',
					email: '',
				}

    		}else{

    		}

        	$scope.processing = false
    		

        })
        .error(function(data)
        {
        	$scope.signUpCandidateMessage = [];
			for(var m in data) {
			   $scope.signUpCandidateMessage.push(data[m][0]);
			}
			
        	$scope.processing = false
        });

       
	};


	// Para usar el html en angular
	$scope.sanitize = function (item) {
		if(!item) return
		return $sce.trustAsHtml(item);
	}   



})
