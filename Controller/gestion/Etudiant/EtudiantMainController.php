<?php
    require_once("EtudiantController.php");

    $etudiantController = new EtudiantController();

    if(isset($_POST["frmAddStudent"])){
        $etudiantController->addEtudiant();
    }
?>