<?php
date_default_timezone_set("America/El_Salvador");
  class CtrTicket{
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
            <td class="title"><h3>GRAN EXCURSION A "<?php echo $data["lugar"]; ?>"; </h3></td>
          </tr>

          <tr>
            <td>
              <?php
                $mes = array(1 => "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio","Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
              ?>
              Fecha a realizarse: <?php echo date("d", strtotime($data["fecha"]))." de ".$mes[date("n",strtotime($data["fecha"]))]." de ".date("Y",strtotime($data["fecha"])); ?>
              <br>Hora de Salida: <?php echo date("h", strtotime($data["hora"])).":".date("i",strtotime($data["hora"]))." ".date("a",strtotime($data["hora"])); ?>
              <br>Valor del Ticket: $<?php echo $data["precio"]; ?>
              <br>
              <?php echo $data["note"]; ?>
              <span class="id">N° <?php echo $ceros.$i; ?></span>
            </td>
          </tr>
        </table>
        <?php
      }
    }

    public function printTicket(){
      /*cant 1
        lugar 1
        fecha 1
        hora  1
        precio  1
        note 1*/
      if(isset($_POST["createTicket"])){
            if(isset($_POST["nota"])){
              $note=$_POST["nota"];
            }else{
              $note="";
            }
            $data = array("cant" => $_POST["cant"],
            "lugar" =>$_POST["lugar"],
            "fecha" => $_POST["fecha"],
            "hora" => $_POST["hora"],
            "precio" => $_POST["precio"],
            "note" => $note);

            $this->printTable($data);
      }
    }

    public function printTicketR(){
      if(isset($_POST["createListR"])){
        if(isset($_POST["nota"])){
          $note=$_POST["nota"];
        }else{
          $note="";
        }
        $data = array("desde" => $_POST["desde"],
        "hasta" => $_POST["hasta"],
        "lugar" =>$_POST["lugar"],
        "fecha" => $_POST["fecha"],
        "hora" => $_POST["hora"],
        "precio" => $_POST["precio"],
        "note" => $note );

        $this->printTable($data);
      }
    }
  }
?>
