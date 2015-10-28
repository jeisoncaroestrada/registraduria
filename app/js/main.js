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
		.when("/login",{
			controller:"LoginCtrl",
			templateUrl: "views/auth/login.blade.php",
		})
		.when("/remember",{
			controller:"LoginCtrl",
			templateUrl: "views/auth/remember.blade.php",
		})
		.when("/reset_password/:n/:c*",{
			controller:"ChangePasswordCtrl",
			templateUrl: "views/auth/reset_password.blade.php"
		})
		.when("/start",{
			controller:"StartCtrl",
			templateUrl: "views/start.blade.php"
		})
		.when("/signup",{
			controller:"SignupCtrl",
			templateUrl: "views/auth/signup.blade.php"
		})
		.when("/verify_account/:n/:c*",{
			controller:"VerifyCtrl",
			templateUrl: "views/auth/verify.blade.php"
		})
		.otherwise({
	        redirectTo: '/'
	    })

	/*$locationProvider.html5Mode(true);
	$locationProvider.hashPrefix('!');*/
	
})



.config(function(paginationTemplateProvider) {
    paginationTemplateProvider.setPath('views/common/dirPagination.tpl.html');
})


.run(function($http) {
  $http.defaults.headers.common['X-CSRF-TOKEN'] = $('meta[name=csrf-token]').attr('content')
})


.run(function($rootScope,$location,$timeout,$window) {

	 $rootScope.goTo = function(url){

		$location.path(url);
		
	}

	//oculta o muestra el boton de volver a arriba segun el scroll
	$(window).scroll(function(){
        if ($(this).scrollTop() > ($('#header').offset().top + $('#header').height() - 1 )) {
            $('#backTop').fadeIn();
            $('.navbar-default').addClass( "bg-gradient-1 active" );
            $('.navbar-default .color-1').addClass( "color-2 bd-2" );
            $('.navbar-default .color-1').removeClass( "color-1 bd-1" );
        } else {
            $('#backTop').fadeOut();
            $('.navbar-default').removeClass( "bg-gradient-1 active" );
            $('.navbar-default .color-2').addClass( "color-1 bd-1" );
            $('.navbar-default .color-2').removeClass( "color-2 bd-2" );
        }
    });



	/*$('.pager a').click(function () {

		$('html, body').animate({ scrollTop: $('.pager').offset().top }, 0);

	})*/

	$( ".page-num" ).click(function() {
	});



	/*$rootScope.$on('$viewContentLoaded', function() {
		$rootScope.menusListSelected = $rootScope.menusList[$rootScope.activeMenu].title;
	    $rootScope.subMenusListSelected = $rootScope.activeSubMenu < 4 ? $rootScope.subMenusList[$rootScope.activeMenu][$rootScope.activeSubMenu].title : '';
	});*/

    $rootScope.$on('$stateChangeSuccess', function(){

    	$rootScope.windowHeight = $window.innerHeight;
    	$rootScope.windowWidth = $window.innerWidth;
    	$timeout(function(){    		
    		$rootScope.viewContentLoaded = true;
	    }, 1000)
    	/*$timeout(function(){    		
	        $('.modal-backdrop ').hide()
		 	$('html, body').animate({ scrollTop: $('#view').offset().top }, 0);
	    }, 10)*/
	});


    //listado de los submenus de cada vista multiple
	$rootScope.subMenusList = [

		[

			{title: "Decisiones en línea",url: "/start/decisions"},{title: "Canal en vivo"},
			{title: "Espacio de Expresión",url: "/start/space"},{title: "Histórico y Estadisticas del Movimiento",url: "/start/history"}
		],
		[

			{title: "Valores",url: "/start/values"},{title: "Plan estratéfico con enfoque de innovación social"},
			{title: "Colectivo de trabajo",url: "/start/collective"},{title: "Iniciativas del Movimiento",url: "/start/initiatives"}
		],
		[

			{title: "Valores",url: "/start/values"},{title: "Plan estratéfico con enfoque de innovación social"},
			{title: "Colectivo de trabajo",url: "/start/collective"},{title: "Iniciativas del Movimiento",url: "/start/initiatives"}
		],
		[

			{title: "Proyectos, Documentación,Material de consulta",url: "/start/documents"},{title: "Blog y Noticias"},
			{title: "Seguimiento",url: "/start/tools"},{title: "Rendición de cuentas",url: "/start/tools"}
		],
	]

	//listado de los menus de la barra superior
	$rootScope.menusList = [


			{title: "Plataforma Innovadora"},
			{title: "Fundamentos Innovadores"},
			{title: "Crea tu iniciativa"},
			{title: "Herramientas para decidir"},
			{title: "Blog y Noticias"}
	]


})


