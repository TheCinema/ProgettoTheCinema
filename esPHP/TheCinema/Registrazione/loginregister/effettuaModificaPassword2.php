<?php

session_start();

  $usr=$_SESSION["username"];
  $psw=$_POST["newPsw"];
  $confPsw=$_POST["confNewPsw"];


  if(!isset($psw)  || !isset($confPsw)){
    $_SESSION["datiNonInseriti"]="1";
    header('Location: recuperaPassword.php');
  }else{
    if($psw!=$confPsw){
      $_SESSION["pswSbagliate"]="1";
      header('Location: recuperaPassword.php');
    }else{
      include "connessione.php";

      $sql="update utente set psw=\"$psw\" WHERE username=\"$usr\"";

      $records=$conn->query($sql);

      if($records==TRUE){
        $_SESSION["pswChanged"]="1";
        header('Location: Login-Registra.php');
      }
    }
  }



 ?>
