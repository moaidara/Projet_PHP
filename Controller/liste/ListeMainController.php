<?php
    require_once("ListeController.php");

    $listeController = new ListeController();

    if(isset($_POST["frmModify"])){
        $listeController->modifyStudent();
    }

    if(isset($_POST["frmDelete"])){
        $listeController->suprimer();
    }
?>