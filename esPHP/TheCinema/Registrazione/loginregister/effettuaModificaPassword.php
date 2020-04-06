<?php
session_start();


  $email=$_POST["email"];
  $usr=$_POST["usr"];
  $dataNascita=$_POST["dataNascita"];

  if($email==null || $usr==null || $dataNascita==null){

      $_SESSION["datiNonInseriti"]="1";
      header('Location: recuperaPassword.php');
  }else{

      include "connessione.php";

      $sql="select idUtente from utente where username=\"$usr\" && mail=\"$email\" && dataNascita=\"$dataNascita\"";

      $records=$conn->query($sql);
      if(mysqli_num_rows($records)==0){
        $_SESSION["datiNonEsistenti"]="1";
        header('Location: recuperaPassword.php');
      }
      else{// se i dati sono corretti
        $_SESSION["newPsw"]="1";
        $_SESSION["email"]=$email;
        $_SESSION["dataNascita"]=$dataNascita;
        $_SESSION["username"]=$usr;


        header('Location: recuperaPassword.php');

      }
  }


?>
