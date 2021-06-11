<?php
  include "printer.php";
  include "../../controllers/ctrList.php";

  $ctrList = new CtrList();
  $ctrList->printList();
  $ctrList->printListR();
 ?>
