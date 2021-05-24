<?php
  class routerM {


    public static function getPage($r){
      $validRoutes = array('index', 'logout', 'listas', 'install', '404', 'menu-index');

      for ($i=0; $i < count($validRoutes); $i++) {
        if($r==$validRoutes[$i]){
          if($r=="index"){
            $page = "./views/modules/home.php";
          }else{
            $page = "./views/modules/".$r.".php";
          }
          break;
        }else{
          $page = "./views/modules/home.php";
        }
      }

      return $page;
    }
  }
?>
