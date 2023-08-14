<?php
date_default_timezone_set("America/El_Salvador");
  class CtrTicket{

    private function printTable($data){
      if(isset($data["desde"])){
        $desde=$data["desde"];
        $hasta=$data["hasta"];
      }else{
        $desde=1;
        $hasta=$data["cant"];
      }
      $tck_impar=33;
      $tck_par=34;
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

        <table id="tbl-ticket<?php echo $i; ?>" class="ticket">
          <tr>
            <td class="title"><h3>GRAN EXCURSION A <br>"<?php echo $data["lugar"]; ?>" </h3></td>
          </tr>

          <tr>
            <td>
              <?php
                $mes = array(1 => "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio","Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
              ?>
              <?php echo $data["beneficio"]; ?>
              <br>Fecha a realizarse: <?php echo date("d", strtotime($data["fecha"]))." de ".$mes[date("n",strtotime($data["fecha"]))]." de ".date("Y",strtotime($data["fecha"])); ?>
              <br>Lugar y Hora Salida: <?php echo $data["lugar-s"]." - ".date("h", strtotime($data["hora"])).":".date("i",strtotime($data["hora"]))." ".date("a",strtotime($data["hora"])); ?>
              <br>Valor del Ticket: $<?php echo $data["precio"]; ?>
              <br>
              <?php echo $data["note"]; ?>
              <span class="id">N° <?php echo $ceros.$i; ?></span>
            </td>
          </tr>
        </table>
        <?php if ($tck_impar==$i){
          ?>
          <script type="text/javascript">
            newmargin(<?php echo $i; ?>);
          </script>
          <?php
          $tck_impar+=32;
        }else if($tck_par==$i){
          ?>
          <script type="text/javascript">
            newmargin(<?php echo $i; ?>);
          </script>
          <?php
          $tck_par+=32;
        }
      }
    }

    public function printTicket(){

      if(isset($_POST["createTicket"])){
            if(isset($_POST["nota"])){
              $note="Nota: ".$_POST["nota"];
            }else{
              $note="<br>";
            }
            if(isset($_POST["beneficio"])){
              $beneficio="A beneficio de: ".$_POST["beneficio"];
            }else{
              $beneficio="<br>";
            }
            $data = array("cant" => $_POST["cant"],
            "lugar" =>$_POST["lugar"],
            "lugar-s" =>$_POST["lugar-s"],
            "beneficio" => $beneficio,
            "fecha" => $_POST["fecha"],
            "hora" => $_POST["hora"],
            "precio" => $_POST["precio"],
            "note" => $note);

            $this->printTable($data);
      }
    }

    public function printTicketR(){
      if(isset($_POST["createTicketR"])){

        if(isset($_POST["nota"])){
          $note="Nota: ".$_POST["nota"];
        }else{
          $note="<br>";
        }
        if(isset($_POST["beneficio"])){
          $beneficio="A beneficio de: ".$_POST["beneficio"];
        }else{
          $beneficio="<br>";
        }
        $data = array("desde" => $_POST["desde"],
        "hasta" => $_POST["hasta"],
        "lugar" =>$_POST["lugar"],
        "lugar-s" =>$_POST["lugar-s"],
        "beneficio" => $beneficio,
        "fecha" => $_POST["fecha"],
        "hora" => $_POST["hora"],
        "precio" => $_POST["precio"],
        "note" => $note );

        $this->printTable($data);
      }
    }
  }
?>
