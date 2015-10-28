var Registraduria = angular.module("Registraduria",["ui.router","ui.bootstrap","angularUtils.directives.dirPagination","ui.slimscroll","fox.scrollReveal","ngRoute","ngMap","ngMaterial","chart.js","smoothScroll","ngAside"], function($interpolateProvider) {
	$interpolateProvider.startSymbol('[[');
	$interpolateProvider.endSymbol(']]');

})

.config(function($routeProvider,$locationProvider){

	
       
	$routeProvider
		.when("/",{
			controller:"HomeCtrl",
			templateUrl: "views/home.blade.php"
		})
		.when("/start",{
			controller:"StartCtrl",
			templateUrl: "views/start.blade.php"
		})
		.otherwise({
	        redirectTo: '/'
	    })

	/*$locationProvider.html5Mode(true);
	$locationProvider.hashPrefix('!');*/
	
})




.run(function($http) {
  $http.defaults.headers.common['X-CSRF-TOKEN'] = $('meta[name=csrf-token]').attr('content')
})


.run(function($rootScope,$location,$timeout,$window) {

	 $rootScope.goTo = function(url){

		$location.path(url);
		
	}

})



;
;angular.module("Registraduria")


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
    $rootScope.startModules = 0

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
        controller: 'AsideMenuCtrl',
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

			$rootScope.startModules = 0;
			$scope.initializeForms();
			$scope.citizenSuccess = false;
			$scope.signUpCitizenMessage = false;
		}else if (module == 1) {

			$rootScope.startModules = 1;
			$scope.initializeForms();
			$scope.candidateSuccess = false;
			$scope.signUpCandidateMessage = false;
		}else{

			$rootScope.startModules = 2;
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

	$scope.loadCandidates = function(){

		$scope.processing = true;
		
        //peticion al servidor usando http
        $http.post('loadCandidates', [''])
        .success(function(data)
        {	
        	
        	if(data['candidates']){
				$scope.signUpCandidateMessage = false;
        		$scope.totalCandidates = data['candidates']
        		console.log($scope.totalCandidates);

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

// *****************************************************************************
// Controlador del aside menu de inicio
// *****************************************************************************
.controller('AsideMenuCtrl',function($scope,$http,$location,$rootScope,$sce,$timeout,$modalInstance){
	
	$scope.ok = function(e) {
        $modalInstance.close();
        e.stopPropagation();
    };

    $scope.cancel = function(e) {
        $modalInstance.dismiss();
        e.stopPropagation();
    };

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

			$rootScope.startModules = 0;
			$scope.initializeForms();
			$scope.citizenSuccess = false;
			$scope.signUpCitizenMessage = false;
		}else if (module == 1) {

			$rootScope.startModules = 1;
			$scope.initializeForms();
			$scope.candidateSuccess = false;
			$scope.signUpCandidateMessage = false;
		}else{

			$rootScope.startModules = 2;
			$scope.initializeForms();
			$scope.signUpMessage = false;
		};
		
		$modalInstance.close();
        e.stopPropagation();
	}

	
	// Para usar el html en angular
	$scope.sanitize = function (item) {
		if(!item) return
		return $sce.trustAsHtml(item);
	}   



})
;
Registraduria.directive('xngFocus', function ($timeout) {
    return {
        link: function(scope, element, attrs) {
            scope.$watch(attrs.xngFocus, function(newValue){
                if ( newValue ) {
                    $timeout(function(){
                        element.focus();
                    });
                }
            });
        }
     };
});



//# sourceMappingURL=app.js.map