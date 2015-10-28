
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

