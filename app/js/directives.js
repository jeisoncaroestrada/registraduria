
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

// Directiva de modal por defecto
Registraduria.directive('modalDefault', function ($sce) {
    return {
        restrict: 'A',
        templateUrl: 'views/common/modal_default.blade.php',
        
        link: function (scope) {
            
            // Para usar el html en angular
            scope.sanitize = function (item) {
                if (!item) return;
              return $sce.trustAsHtml(item);
            }
        }
    };
});

// Directiva de modal para iniciar session
Registraduria.directive('modalLogin', function ($sce) {
    return {
        restrict: 'A',
        templateUrl: 'views/common/modal_login.blade.php',
        
        link: function (scope) {
            
            // Para usar el html en angular
            scope.sanitize = function (item) {
                if (!item) return;
              return $sce.trustAsHtml(item);
            }

            //se ejecuta algo cuando el modal se termina de ocultar
            $('#modalLogin').on('hidden.bs.modal', function (e) {
                scope.$apply(function () {
                    scope.closeModalLogin()


                });
            })


        }
    };
});

// Directiva de modal para Registrarte
Registraduria.directive('modalSignup', function ($sce) {
    return {
        restrict: 'A',
        templateUrl: 'views/common/modal_signup.blade.php',
        
        link: function (scope) {
            
            // Para usar el html en angular
            scope.sanitize = function (item) {
                if (!item) return;
              return $sce.trustAsHtml(item);
            }

            //se ejecuta algo cuando el modal se termina de ocultar
            $('#modalSignup').on('hidden.bs.modal', function (e) {
                scope.$apply(function () {
                    scope.closeModalSignup()


                });
            })


        }
    };
});

// Directiva de modal para Registrarte
Registraduria.directive('modalRemember', function ($sce) {
    return {
        restrict: 'A',
        templateUrl: 'views/common/modal_remember.blade.php',
        
        link: function (scope) {
            
            // Para usar el html en angular
            scope.sanitize = function (item) {
                if (!item) return;
              return $sce.trustAsHtml(item);
            }

            //se ejecuta algo cuando el modal se termina de ocultar
            $('#modalRemember').on('hidden.bs.modal', function (e) {
                scope.$apply(function () {
                    scope.closeModalRemember()


                });
            })


        }
    };
});

// Directiva de modal para crear una nueva iniciativa
Registraduria.directive('modalInitialPoll', function ($sce) {
    return {
        restrict: 'A',
        templateUrl: 'views/common/modal_initial_poll.blade.php',
        
        link: function (scope) {

            //muestra automaticamente el modal al cargar la pagina 
            //$('#modalInitialPoll').modal('show')

            //se configura la opcion backDrop 
            $('#modalInitialPoll').modal({
              keyboard: false,
              backdrop: 'static'
            })          

            
            // Para usar el html en angular
            scope.sanitize = function (item) {
                if (!item) return;
              return $sce.trustAsHtml(item);
            }
        }
    };
});

// Directiva de modal para ver en detalle una iniciativa
Registraduria.directive('modalSeeInitiative', function ($sce) {
    return {
        restrict: 'A',
        templateUrl: 'views/common/modal_see_initiative.blade.php',
        //detailInitiative: "@", //variables de alcance($scope) o por valor
        //modalSeeInitiativeShow: "@", //variables de alcance($scope) o por valor
        
        link: function (scope) {
            
            // Para usar el html en angular
            scope.sanitize = function (item) {
                if (!item) return;
              return $sce.trustAsHtml(item);
            }


            //se ejecuta algo cuando el modal se termina de ocultar
            $('#modalSeeInitiative').on('hidden.bs.modal', function (e) {
                scope.$apply(function () {
                    scope.modalSeeInitiativeShow = false;
                    delete scope.detailInitiative.checkSupport;


                });
            })
        }
    };
});

// Directiva de modal para ver en detalle una estadistica
Registraduria.directive('modalSeeHistory', function ($sce,$rootScope) {
    return {
        restrict: 'A',
        templateUrl: 'views/common/modal_see_history.blade.php',
        
        link: function (scope) {
            
            // Para usar el html en angular
            scope.sanitize = function (item) {
                if (!item) return;
              return $sce.trustAsHtml(item);
            }


            //se ejecuta algo cuando el modal se termina de ocultar
            /*$('#modalSeeHistory').on('hidden.bs.modal', function (e) {
                scope.$apply(function () {
                    scope.modalSeeHistoryShow = false;
                    delete scope.detailInitiative.checkSupport;


                });
            })*/
        }
    };
});

