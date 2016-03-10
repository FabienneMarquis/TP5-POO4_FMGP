<?php
echo "OKOK";
require_once 'application/Controllers/clientController.php';
$this->ctrlcomp = new client();
$this->ctrlcomp->show_add();
?>
