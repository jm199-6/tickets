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
              <br>
              <?php
              if(count($data["descripcionPremios"])==1){
                ?>
                <div style="width: 33%; float:left;">&nbsp</div>
                <?php
              }else if (count($data["descripcionPremios"])==2){
                ?>
                <div style="width: 20%; float:left;">&nbsp</div>
                <?php
              }else{

              }
                for ($j=0; $j < count($data["descripcionPremios"]) ; $j++) {

                  ?>
                  <div class="premiosDetalle">
                    <h4><?php //echo $j+1; ?> Premio</h4>
                    <?php
                      if(count($data['imgPremios'])==0){
                        ?>
                        <div style="height: 75px;">&nbsp;</div>
                        <span><?php echo $data["descripcionPremios"][$j]; ?></span>
                        <?php
                      }else{
                        if($data["printGrayScale"]==true){
                        ?>
                          <img src="../../<?php echo $data['imgPremios'][$j]; ?>" class="imgPremio grayscale"/>
                        <?php
                        }else{
                         ?>
                         <img src="../../<?php echo $data['imgPremios'][$j]; ?>" class="imgPremio"/>
                        <br>
                        <span><?php echo $data["descripcionPremios"][$j]; ?></span>
                        <?php
                        }
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
              <br>
              <?php
                $mes = array(1 => "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio","Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
              ?>
              A beneficio de: <?php echo $data["ben"]; ?>
              <br>Fecha de la rifa: <?php echo date("d", strtotime($data["fechaRifa"]))." de ".$mes[date("n",strtotime($data["fechaRifa"]))]." de ".date("Y",strtotime($data["fechaRifa"])); ?>
              <br>Valor del Numero: $<?php echo $data["precio"]; ?>
            </td>
          </tr>
          <tr>
            <td>
              <br>
              <span style="margin-left: 100px;">Nombre</span><span style="margin-left: 150px;">Telefono</span><br>
              <?php
              for ($j=1; $j <= $data["cantNum"] ; $j++) {
                if($j>=10){
                  echo $j.". ____________________________<span style='margin-left: 25px;'>________________</span><br>";
                }else{
                  ?>&nbsp;&nbsp;<?php echo $j.". ____________________________<span style='margin-left: 25px;'>________________</span><br>";
                }

              }
              ?>
            </td>
          </tr>
          <tr>
            <td>
              <br>
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
            if(isset($_FILES["premios"])){
              if(isset($_POST["gray"])){
                $gray = $_POST["gray"];
              }else{
                $gray = false;
              }
              $premios=$this->getUploadedFiles($_FILES["premios"]);
              $data = array("cant" => $_POST["cant"],
              "descripcionPremios" =>$_POST["descripcionpremios"],
              "imgPremios" => $premios,
              "title" => $_POST["title"],
              "ben" => $_POST["ben"],
              "fechaRifa" => $_POST["fechaRifa"],
              "cantNum" => $_POST["cantNum"],
              "precio" => $_POST["precio"],
              "printGrayScale" => $gray);
            }else{
              include "../../controllers/encript.php";
              $sec = new Seguridad();
              echo "<script>alert('Debe agregar por lo menos 1 premio');window.location='../../?p=".$sec->encript("listas")."'</script>";
            }
            $this->printTable($data);
      }
    }

    public function printListR(){
      if(isset($_POST["createListR"])){
        if(isset($_FILES["premios"])){
          if(isset($_POST["gray"])){
            $gray = $_POST["gray"];
          }else{
            $gray = false;
          }
          $premios=$this->getUploadedFiles($_FILES["premios"]);
          $data = array("desde" => $_POST["desde"],
          "hasta" => $_POST["hasta"],
          "descripcionPremios" =>$_POST["descripcionpremios"],
          "imgPremios" => $premios,
          "title" => $_POST["title"],
          "ben" => $_POST["ben"],
          "fechaRifa" => $_POST["fechaRifa"],
          "cantNum" => $_POST["cantNum"],
          "precio" => $_POST["precio"],
          "printGrayScale" => $gray);

        }else{
          include "../../controllers/encript.php";
          $sec = new Seguridad();
          echo "<script>alert('Debe agregar por lo menos 1 premio');window.location='../../?p=".$sec->encript("listas")."'</script>";
        }

        $this->printTable($data);
      }
    }
  }
?>
