<div class="modal-header inline-b padding-t-b-10 ">
	<button type="button" class="close" ><span aria-hidden="true" ng-click="cancel($event)" >&times;</span><span class="sr-only">Close</span></button>
 	<div class="wid-100 center-items">
      <img ng-click="goTo('/NaN')" class="img-responsive" src="img/logo-prueba.png">
    </div>
    <div class="team-card col-xs-12 padding-t-b-10-auto">
    <div class="col-md-12 center-items">
      <div class="wid-40">
        <img class="img-responsive border-radius" src="[[activeSession.avatar]]"></img>
      </div>
    </div>
    <div class="col-md-12">
      <div class="wid-100">
        <h2 class="fc-4">[[activeSession.name1]]</h2>
        <h3 class="fc-G">Ya ha iniciado sesion como este usuario.</h3>
      </div>
    </div>
  </div>
</div>
<div class="modal-body inline-b">
  <div class="col-xs-12 margin-t-10" ng-click="goToModule(0)">
    <button class="wid-100 btn btn-default btn-md text-center color-1 bd-1" >Registrar cédula</button>
  </div>
  <div class="col-xs-12 margin-t-10" ng-click="goToModule(1)">
    <button class="wid-100 btn btn-default btn-md text-center color-1 bd-1" >Registrar candidato</button>
  </div>
  <div class="col-xs-12 margin-t-10" ng-click="goToModule(2)">
    <button class="wid-100 btn btn-default btn-md text-center color-1 bd-1" >Voto electrónico</button>
  </div>
  <div class="col-xs-12 margin-t-10" ng-click="goToModule(3)">
    <button class="wid-100 btn btn-default btn-md text-center color-1 bd-1" >Ver certificado electoral</button>
  </div>
  
</div>
<div class="modal-footer">
    <div class="col-xs-12 margin-t-10" ng-click='logOut()'>
    <button class="wid-100 btn btn-default btn-md text-center color-1 bd-1" >Cerrar sesion</button>
  </div>
</div>