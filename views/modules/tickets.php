<?php
  $pageTitle="Pagina 1";

?>
<script type="text/javascript">setTtle("Crear Tickets"); </script>

<div class="row">
  <div class="col-sm-2 col-md-2 col-lg-2">
    &nbsp;
  </div>
  <div class="col-sm-8 col-md-8 col-lg-8">
    <div class="card ">
      <div class="card-header bg-primary text-white">Generador de Tickets</div>
      <div class="card-body">
        <ul class="nav nav-tabs" id="mytab" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" id="server-tab" data-toggle="tab" href="#cant" role="tab" aria-controls="cant" aria-selected="true"><i class="fa fa-list"></i> Por Cantidad</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link " id="range-tab" data-toggle="tab" href="#range" role="tab" aria-controls="range" aria-selected="true"><i class="fa fa-list"></i> Por Rango</a>
          </li>
          </ul>
        <div class="tab-content" id="mytab-content">
          <div class="tab-pane fade show active " id="cant" role="tabpanel" aria-labelledby="cant-tab">
          	<span class="text-info">Por favor complete todos los campos con la información solicitada.</span>
            <form method="post" action="views/modules/prinTicket.php" class="bg-gradient-info" enctype="multipart/form-data" >
              <div class="row">
                <div class="col">
                  <div class="input-group bottom">
                    <div class="input-group-prepend">
                      <span class="input-group-text" >Cantidad de Tickets</span>
                    </div>
                    <input type="number" class="form-control" name="cant"  required />
                  </div>
                </div>
                <div class="col">
                  &nbsp;
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="input-group bottom">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Lugar de Excursión</span>
                    </div>
                    <input type="text" class="form-control" name="lugar" required />
                  </div>
                  <div class="input-group bottom">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><input type="checkbox" id="chk-beneficio" name="chk-beneficio"/>A beneficio de</span>
                    </div>
                    <input type="text" class="form-control" id="beneficio" disabled required name="beneficio" />
                  </div>
                  <div class="input-group bottom ">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="validatedInputGroupPrepend3">Fecha</span>
                    </div>
                    <input type="date" class="form-control" name="fecha" aria-describedby="validatedInputGroupPrepend3">
                  </div>
                  <div class="input-group bottom ">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="validatedInputGroupPrepend3">Hora de Salida</span>
                    </div>
                    <input type="time" class="form-control" name="hora" aria-describedby="validatedInputGroupPrepend3">
                  </div>
                  <div class="input-group bottom ">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="validatedInputGroupPrepend3">Lugar de Salida</span>
                    </div>
                    <input type="text" class="form-control" name="lugar-s" maxlength="30" aria-describedby="validatedInputGroupPrepend3">
                  </div>
                  <div class="input-group bottom ">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="validatedInputGroupPrepend3">Valor del ticket $</span>
                    </div>
                    <input type="number" class="form-control" min="0" step="0.01" name="precio" aria-describedby="validatedInputGroupPrepend3">
                  </div>
                </div>
              </div>
              <div class="input-group bottom">
                <div class="input-group-prepend">
                  <span class="input-group-text"><input type="checkbox" id="note" name="note"/> Nota Adicional</span>
                </div>
                <input type="text" class="form-control" id="nota" name="nota" disabled required maxlength="80" />
              </div>
              <input type="submit" class="btn btn-primary right" name="createTicket" value="Generar">
            </form>
          </div>
          <div class="tab-pane fade" id="range" role="tabpanel" aria-labelledby="enterprise-tab">
            <span class="text-info">Por favor complete todos los campos con la información solicitada.</span>
            <form method="post" action="views/modules/prinTicket.php" enctype="multipart/form-data" >
              <div class="row">
                <div class="col">
                  <div class="input-group bottom">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Desde</span>
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
              <div class="row">
                <div class="col">
                  <div class="input-group bottom">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Lugar de Excursión</span>
                    </div>
                    <input type="text" class="form-control" name="lugar" required />
                  </div>
                  <div class="input-group bottom">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><input type="checkbox" id="chk-beneficio1" name="chk-beneficio1"/>A beneficio de</span>
                    </div>
                    <input type="text" class="form-control" id="beneficio1" disabled required name="beneficio" />
                  </div>
                  <div class="input-group bottom ">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="validatedInputGroupPrepend3">Fecha</span>
                    </div>
                    <input type="date" class="form-control" name="fecha" aria-describedby="validatedInputGroupPrepend3">
                  </div>
                  <div class="input-group bottom ">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="validatedInputGroupPrepend3">Hora de Salida</span>
                    </div>
                    <input type="time" class="form-control" name="hora" aria-describedby="validatedInputGroupPrepend3">
                  </div>
                  <div class="input-group bottom ">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="validatedInputGroupPrepend3">Lugar de Salida</span>
                    </div>
                    <input type="text" class="form-control" name="lugar-s" maxlength="30" aria-describedby="validatedInputGroupPrepend3">
                  </div>
                  <div class="input-group bottom ">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="validatedInputGroupPrepend3">Valor del ticket $</span>
                    </div>
                    <input type="number" class="form-control" min="0" step="0.01" name="precio" aria-describedby="validatedInputGroupPrepend3">
                  </div>
                </div>
              </div>
              <div class="input-group bottom">
                <div class="input-group-prepend">
                  <span class="input-group-text"><input type="checkbox" id="note1" name="note"  /> Nota Adicional</span>
                </div>
                <input type="text" class="form-control" id="nota1" name="nota" disabled required maxlength="80"/>
              </div>

              <input type="submit" class="btn btn-primary right" name="createTicketR" value="Continuar">
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
