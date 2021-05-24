<?php
  class routerC extends Seguridad{
    public function getTemplate(){
      include("./views/plantilla.php");
    }

    public function getMenu(){
        $menu="menu-index";
      include(RouterM::getPage("menu-index"));
    }

    public function route(){
      if(isset($_GET['p'])){
        $r=$_GET['p'];
        $r=$this->desencript($r);
      }else{
        $r="index";
      }

      $resp = routerM::getPage($r);
      if(file_exists($resp)){
        include $resp;
      }else{
        include routerM::getPage("404");
      }
    }
  }
?>
