<?php
date_default_timezone_set("America/El_Salvador");
  class CtrList{
    private function getUploadedFiles($arrayFiles){
      $premios=array();
      for($i=0; $i<count($arrayFiles["tmp_name"]); $i++){
        if(is_uploaded_file($arrayFiles["tmp_name"][$i])){
          $folder = "media/img/";
          $tmp_name = $arrayFiles["tmp_name"][$i];
          $name = $arrayFiles["name"][$i];
          $premios[] = $folder.$name;
          move_uploaded_file($tmp_name,"../../".$premios[$i]);
        }
      }
      return $premios;
    }
    private function printTable($data){
      if(isset($data["desde"])){
        $desde=$data["desde"];
        $hasta=$data["hasta"];
      }else{
        $desde=1;
        $hasta=$data["cant"];
      }
      for($i=$desde;$i<=$hasta; $i++){
        if($i<10){
          $ceros="000";
        }elseif ($i>=10 && $i <100) {
          $ceros="00";
        }elseif ($i>=100 && $i <1000) {
          $ceros="0";
        }elseif ($i>=1000 && $i <10000) {
          $ceros="";
        }
        ?>
        <table class="lista">
          <tr>
            <td class="title">
              <br><b><?php echo $data["title"]; ?></b><span class="id">N° de Lista: <?php echo $ceros.$i; ?></span></td>
          </tr>
          <tr>
            <td class="premios">
              <br><br>
              <?php
                for ($j=0; $j < count($data["descripcionPremios"]) ; $j++) {
                  ?>
                  <div class="premiosDetalle">
                    <h4><?php echo $j+1; ?>° Premio</h4>
                    <?php
                      if(count($data['imgPremios'])==0){
                        ?>
                        <div style="height: 75px;">&nbsp;</div>
                        <span><?php echo $data["descripcionPremios"][$j]; ?></span>
                        <?php
                      }else{
                        ?>
                        <img src="../../<?php echo $data['imgPremios'][$j]; ?>" class="imgPremio"/><br>
                        <span><?php echo $data["descripcionPremios"][$j]; ?></span>
                        <?php
                      }
                     ?>

                  </div>
                  <?php
                }
               ?>
            </td>
          </tr>
          <tr>
            <td>
              <br><br>
              <?php
                $mes = array(1 => "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio","Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
              ?>
              Fecha de la rifa: <?php echo date("d", strtotime($data["fechaRifa"]))." de ".$mes[date("n",strtotime($data["fechaRifa"]))]." de ".date("Y",strtotime($data["fechaRifa"])); ?>
              <br>Valor del Numero: $<?php echo $data["precio"]; ?>
            </td>
          </tr>
          <tr>
            <td>
              <br><br>
              <span style="float:left;">Nombre</span><span style="float: right;">Telefono</span><br>
              <?php
              for ($j=1; $j <= $data["cantNum"] ; $j++) {
                if($j>=10){
                    echo $j.". _____________________________<span style='margin-left: 25px;'>_________________</span><br>";
                }else{
                  echo $j.". ______________________________<span style='margin-left: 25px;'>_________________</span><br>";
                }

              }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <br><br>
              Vendida por: _______________________________________
              <br><br><br>
            </td>
          </tr>
        </table>
        <?php
      }
    }

    public function printList(){
      if(isset($_POST["createList"])){
            $premios=$this->getUploadedFiles($_FILES["premios"]);
            $data = array("cant" => $_POST["cant"],
            "descripcionPremios" =>$_POST["descripcionpremios"],
            "imgPremios" => $premios,
            "title" => $_POST["title"],
            "fechaRifa" => $_POST["fechaRifa"],
            "cantNum" => $_POST["cantNum"],
            "precio" => $_POST["precio"] );

            $this->printTable($data);
      }
    }

    public function printListR(){
      if(isset($_POST["createListR"])){
        $premios=$this->getUploadedFiles($_FILES["premios"]);
        $data = array("desde" => $_POST["desde"],
        "hasta" => $_POST["hasta"],
        "descripcionPremios" =>$_POST["descripcionpremios"],
        "imgPremios" => $premios,
        "title" => $_POST["title"],
        "fechaRifa" => $_POST["fechaRifa"],
        "cantNum" => $_POST["cantNum"],
        "precio" => $_POST["precio"] );

        $this->printTable($data);
      }
    }
  }
?>
