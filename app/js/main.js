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


