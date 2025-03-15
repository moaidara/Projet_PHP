<?php

    require_once("UserController.php");

//Creation d'objet UserController
    $userController= new UserController();
    //Authentification
    if(isset($_POST['formLogin'])){
        $userController->auth();//Appel a la methode auth
    }
     //Deconnexion
     if(isset($_POST['logout'])){
        $userController->logout();//Appel a la methode auth
    }
?>