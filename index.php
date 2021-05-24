<?php

  date_default_timezone_set("America/El_Salvador");
  //Controladores
  require_once "controllers/encript.php";
  require_once "controllers/enrutador.php";
  //require_once "controllers/install.php";

  //modelos
  require_once "models/enrutador.php";
  //require_once "models/install.php";

  $plantilla = new routerC();
  $plantilla->getTemplate();
?>
