<?php
  $pageTitle="Pagina 1";

?>
<script type="text/javascript">setTtle("Crear Listas"); </script>

<div class="row">
  <div class="col-sm-2 col-md-2 col-lg-2">
    &nbsp;
  </div>
  <div class="col-sm-8 col-md-8 col-lg-8">
    <div class="card ">
      <div class="card-header bg-primary text-white">Generador de Listas</div>
      <div class="card-body">
        <ul class="nav nav-tabs" id="mytab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="server-tab" data-toggle="tab" href="#cant" role="tab" aria-controls="cant" aria-selected="true"><i class="fa fa-list"></i> Por Cantidad</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link " id="enterprise-tab" data-toggle="tab" href="#enterprise" role="tab" aria-controls="enterprise" aria-selected="true"><i class="fa fa-list"></i> Por Rango</a>
          </li>
          </ul>
        <div class="tab-content" id="mytab-content">
          <div class="tab-pane fade show active " id="cant" role="tabpanel" aria-labelledby="cant-tab">
          	<span class="text-info">Por favor complete todos los campos con la información solicitada.</span>
            <form method="post" action="views/modules/printList.php" class="bg-gradient-info" enctype="multipart/form-data" >
              <div class="row">
                <div class="col">
                  <div class="input-group bottom">
                    <div class="input-group-prepend">
                      <span class="input-group-text" >Cantidad de listas</span>
                    </div>
                    <input type="number" class="form-control" name="cant"  required />
                  </div>
                </div>
                <div class="col">
                  &nbsp;
                </div>
              </div>
              <fieldset>
                <legend>Premios<a href="#" class="btn btn-primary right" onclick="addFields(' Premio','premios','premios')">Agregar premio</a></legend>
                <div id="premiosFields" ></div>
              </fieldset>
              <div class="row">
                <div class="col">
                  <div class="input-group bottom">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Titulo </span>
                    </div>
                    <input type="text" class="form-control" name="title" required />
                  </div>
                  <div class="input-group bottom ">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="validatedInputGroupPrepend3"><span class="fa fa-calendar"></span>Fecha de la Rifa</span>
                    </div>
                    <input type="date" class="form-control" name="fechaRifa" aria-describedby="validatedInputGroupPrepend3">
                  </div>
                  <div class="input-group bottom ">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="validatedInputGroupPrepend3">Cantidad de numeros</span>
                    </div>
                    <input type="number" class="form-control" name="cantNum" aria-describedby="validatedInputGroupPrepend3">
                  </div>
                  <div class="input-group bottom ">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="validatedInputGroupPrepend3">Valor del Numero $</span>
                    </div>
                    <input type="number" class="form-control" min="0" step="0.01" name="precio" aria-describedby="validatedInputGroupPrepend3">
                  </div>
                </div>
              </div>

              <input type="submit" class="btn btn-primary right" name="createList" value="Generar">
            </form>
          </div>
          <div class="tab-pane fade" id="enterprise" role="tabpanel" aria-labelledby="enterprise-tab">
            <span class="text-info">Por favor complete todos los campos con la información solicitada.</span>
            <form method="post" action="views/modules/printList.php" enctype="multipart/form-data" >
              <div class="row">
                <div class="col">
                  <div class="input-group bottom">
                    <div class="input-group-prepend">
                      <span class="input-group-text" >Desde</span>
                    </div>
                    <input type="number" class="form-control" name="desde"  required />
                  </div>
                </div>
                <div class="col">
                  <div class="input-group bottom">
                    <div class="input-group-prepend">
                      <span class="input-group-text" >Hasta</span>
                    </div>
                    <input type="number" class="form-control" name="hasta"  required />
                  </div>
                </div>
              </div>
              <fieldset>
                <legend>Premios<a href="#" class="btn btn-primary right" onclick="addFields(' Premio','premios','premiosR')">Agregar premio</a></legend>
                <div id="premiosRFields" ></div>
              </fieldset>
              <div class="row">
                <div class="col">
                  <div class="input-group bottom">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Titulo </span>
                    </div>
                    <input type="text" class="form-control" name="title" required />
                  </div>
                  <div class="input-group bottom ">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="validatedInputGroupPrepend3"><span class="fa fa-calendar"></span>Fecha de la Rifa</span>
                    </div>
                    <input type="date" class="form-control" name="fechaRifa" aria-describedby="validatedInputGroupPrepend3">
                  </div>
                  <div class="input-group bottom ">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="validatedInputGroupPrepend3">Cantidad de numeros</span>
                    </div>
                    <input type="number" class="form-control" name="cantNum" aria-describedby="validatedInputGroupPrepend3">
                  </div>
                  <div class="input-group bottom ">
                    <div class="input-group-prepend">
                      <span class="input-group-text"  id="validatedInputGroupPrepend3">Valor del Numero $</span>
                    </div>
                    <input type="number" class="form-control" min="0" step="0.01" name="precio" aria-describedby="validatedInputGroupPrepend3">
                  </div>
                </div>
              </div>

              <input type="submit" class="btn btn-primary right" name="createListR" value="Continuar">
            </form>
          </div>
        </div>

      </div>
    </div>

  </div>
  <div class="col-sm-2 col-md-2 col-lg-2">
    <div class="alert alert-dismissible fade " id="notificacion" role="alert">
      <div id="msg">
      </div>
      <button type="button" id="closeNoti" class="close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>
</div>
