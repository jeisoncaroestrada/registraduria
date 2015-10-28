<div class="modal-header inline-b padding-t-b-10 ">
	<button type="button" class="close" ><span aria-hidden="true" ng-click="cancel($event)" >&times;</span><span class="sr-only">Close</span></button>
   	<div class="wid-100">
   		<img ng-click="goTo('/NaN')" class="img-responsive logo-navbar float-left" src="img/logoRegistraduria2015Red.png">
   	</div>
</div>
<div class="modal-body inline-b">
  <div class="main-menu-link" ng-click="ok($event)" scroll-to="query">Registrar cédula</div>
  <div class="main-menu-link" ng-click="ok($event)" scroll-to="query">Registrar candidato</div>
  <div class="main-menu-link" ng-click="ok($event); openLoginAside('right',true,0)">Voto electrónico</div>
  <div class="main-menu-link" ng-click="ok($event); openLoginAside('right',true,2)">Ver certificado electoral</div>
</div>
<div class="modal-footer">
    <button class="btn btn-primary btn-md" ng-click="ok($event)">OK</button>
    <button class="btn btn-warning btn-md" ng-click="cancel($event)">Cerrar</button>
</div>