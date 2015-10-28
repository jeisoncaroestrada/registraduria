<!-- Modal -->
<div  slimscroll="{height: '100%'}" class="scroll-body modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLoginLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-1">
        <button type="button" class="close"  modal modal-parent="#modalLogin" modal-target="#modalLogin" data-dismiss="modal"><span aria-hidden="true" ng-click="failure = false" >&times;</span><span class="sr-only">Close</span></button>
      </div>
      <carousel interval="myInterval" no-wrap="noWrapSlides">
          <slide ng-repeat="slide in [1,2]" active="slide.active">
            <div class="modal-body bg-1">
              <form class="inline-b">
                <div class="wid-100 center-items padding-t-b-30">
                  <div class="col-md-8">
                    <img ng-click="goTo('/NaN')" class="img-responsive" src="img/logoRegistraduriaWhite.png">
                  </div>
                </div>
                <p class="fc-W fs-20 text-center">¡Bien ya eres parte de la comunidad Registraduria.co!</p>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div ng-show="success" class="alert alert-success animation-all" ng-bind-html="sanitize(success)" role="alert"></div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div ng-show="sessionMessage" class="alert alert-danger" role="alert">
                        <strong>
                          <UL type = disk >
                            <LI ng-repeat="msg in sessionMessage">[[msg]]
                          </UL>
                        </strong>
                    </div>
                </div>
                <div class="form-group position-relative col-md-12 col-sm-12 col-xs-12">
                  <input ng-model="form.user" type="text" class="form-control" id="user" placeholder="*Nombre de Usuario o email de registro">
                </div>
                <div  class="form-group position-relative col-md-12 col-sm-12 col-xs-12">
                  <input ng-model="form.password" type="password" class="form-control" id="password" placeholder="*Contraseña">
                </div>
                <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center-items margin-plus-10 padding-sm-10" ng-click="login()">
                  <button class="wid-100 btn btn-primary color-4 bd-4">Iniciar sesión</button>
                </div>
                <div  class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding-t-b-10 fs-15 margin-plus center-items">
                    <a class="fc-W hover-fc-3" href="" modal modal-parent="#modalLogin" data-dismiss="modal" modal-target="#modalLogin" ng-click='showModalRemember()'>No recuerdo mi contraseña!</a>
                </div>
                <div  class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding-t-b-10 fs-15 margin-plus center-items">
                    <a class="fc-W hover-fc-3" href="" modal modal-parent="#modalLogin" data-dismiss="modal" modal-target="#modalLogin" ng-click='showModalSignup()' data-backdrop="static" data-toggle="modal" data-target="#modalSignup">¿Aún no te has registrado?</a>
                </div>
                <div ng-if="processing" class="animate-if-panel progress-circular-panel center-items bg-B opacity-05">
                  <md-progress-circular  md-mode="indeterminate"></md-progress-circular>
                </div>
              </form>
            </div>
          </slide>
        </carousel>
      
      <div class="modal-footer bg-1">
        <div class="center-items">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center-items margin-plus-10 padding-sm-10">
              <button  modal modal-parent="#modalLogin" modal-target="#modalLogin" class="wid-100 btn btn-primary btn-large fs-15 center-items color-3 bd-3" data-dismiss="modal" aria-hidden="true" ng-click="failure = false">Cerrar</button>
            </div>
          </div>
        </div>       
      </div>
      <div ng-if="processing" class="animate-if-panel progress-circular-panel center-items bg-B opacity-05">
        <md-progress-circular  md-mode="indeterminate"></md-progress-circular>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    
    //se ejecuta algo cuando el modal empieza a ocultar
    $('#modalLogin').on('hide.bs.modal', function (e) {
    })

    //se ejecuta algo cuando el modal se termina de ocultar
    $('#modalLogin').on('hidden.bs.modal', function (e) {
    })

</script>