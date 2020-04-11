 <html>
<head>
    <title>The Cinema </title>
  <style>
  body {
    margin: 10;
    background: rgb(253,187,45);
    background: linear-gradient(0deg, rgba(253,187,45,1) 0%, rgba(34,193,195,1) 100%);
    font-family: 'Work Sans', sans-serif;
    font-weight: 900;
  }
</style>


</head>

<body>

<?php
  session_start();
  $ip=$_SERVER['SERVER_NAME'];
  $porta=$_SERVER['SERVER_PORT'];

  include "connessione.php";

  if(isset($_SESSION["modificoUsr"])){

    $newUsr=$_POST["editUsr"];
    $usr=$_SESSION["usrLogin"];

    //Controllo se lo username è uguale a quello vecchio
    if($newUsr==$usr){
      $_SESSION["valoreUguale"]=1;
      header('Location: areaLogin.php?campo=usr');
    }else{// selo username è gia presente
      $sql = "select username from utente";
      $result = $conn->query($sql);
      while($row =$result->fetch_assoc()) {
        if($newUsr == $row["username"]){
          $_SESSION["valoreUguale"]=1;
          header('Location: areaLogin.php?campo=usr');
          break;
        }
      }
/// se tutto è ok
      $sql="update utente set username=\"$newUsr\" where username=\"$usr\"";
      $_SESSION["modificoUsr"]=null;
      if ($conn->query($sql) === TRUE) {
        $_SESSION["modificaAvvenuta"]=1;
        $_SESSION["usrLogin"]=$newUsr;
        $_SESSION["modificoData"]=null;
        $_SESSION["modificoUsr"]=null;
        $_SESSION["modificoMail"]=null;
        header('Location: areaLogin.php');
      }else {
        $_SESSION["erroreModifica"]=1;
      }
    }
  }else{////modifica mail

    if(isset($_SESSION["modificoMail"])){
      $newMail=$_POST["editMail"];
      $usr=$_SESSION["usrLogin"];
      $mail=$_SESSION["mailLogin"];

      if($newMail==$mail){
        $_SESSION["valoreUguale"]=1;
        header('Location: areaLogin.php?campo=mail');
      }else{//
        $sql = "select mail from utente";
        $result = $conn->query($sql);
        while($row =$result->fetch_assoc()) {
          if($newMail == $row["mail"]){
            $_SESSION["valoreUguale"]=1;
            header('Location: areaLogin.php?campo=mail');
            break;
          }
        }

      //controllo se all'email manca la @ o il dominio
        if(strpos($newMail, "@") === false){
          $_SESSION["mailSbagliata"]=1;
          header('Location: areaLogin.php?campo=mail');
        }else{
          $trovato=0;
          $dominio=array();
          $dominio=["gmail.com", "icloud.com", "yahoo.com", "outlook.it", "outlook.com"];
          for($i=0; $i<count($dominio); $i++){
            if(strpos($newMail, dominio[$i])== true){
              $trovato=1;
            }
          }
          if($trovato==0){
            $_SESSION["mailSbagliata"]=1;
            header('Location: areaLogin.php?campo=mail');
          }else{
        // se è tutto ok
            $sql="update utente set mail=\"$newMail\" where username=\"$usr\"";
            if ($conn->query($sql) === TRUE) {
              $_SESSION["modificaAvvenuta"]=1;;
              $_SESSION["modificoData"]=null;
              $_SESSION["modificoUsr"]=null;
              $_SESSION["modificoMail"]=null;
              $_SESSION["mailLogin"]=$newMail;
              $_SESSION["newMail"]=$newMail;//variabile di sessione che avrò la nuova mail
              header('Location: areaLogin.php');
            }
            else {
              $_SESSION["erroreModifica"]=1;
            }
          }
        }
      }

    }else{

      if(isset($_SESSION["modificoData"])){
        $newData=$_POST["editData"];//data nascita nuova6
        $usr=$_SESSION["usrLogin"];
        $data=$_SESSION["dataLogin"];//data nascita attuale

        if($newData==$data){
          $_SESSION["valoreUguale"]=1;
          header('Location: areaLogin.php?campo=data');
        }else{
          $sql="update utente set dataNascita=\"$newData\" where username=\"$usr\"";
          if ($conn->query($sql) === TRUE) {
            $_SESSION["modificaAvvenuta"]=1;
            $_SESSION["newData"]=$newData;//variabile di sessione che avrò la nuova mail
            $_SESSION["modificoData"]=null;
            $_SESSION["modificoUsr"]=null;
            $_SESSION["modificoMail"]=null;
            $_SESSION["dataLogin"]=$newData;
            header('Location: areaLogin.php');
          }
          else {
            $_SESSION["erroreModifica"]=1;
          }
        }
      }
    }
  }

  if(isset($_SESSION["datiNonInseriti"])){//nuovo campo per il  reset della password
      $logReg .= " <br><a  > <font color=\"red\">Uno o più campi non compilati</font></a>";
      $_SESSION["datiNonInseriti"]=null;
  }

 ?>

</body>
 </html>
