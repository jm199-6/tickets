<?php
  include "printerT.php";
  include "../../controllers/ctrTicket.php";

  $ctrList = new CtrTicket();
  $ctrList->printTicket();
  $ctrList->printTicketR();
 ?>
