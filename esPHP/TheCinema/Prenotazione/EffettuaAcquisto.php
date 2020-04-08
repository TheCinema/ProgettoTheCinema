<html>
  <body>
    <?php
    session_start();
    include "connessione.php";
    $ip=$_SERVER['SERVER_NAME'];  //server per vedere sei sei localhost o hai un ip
    $porta=$_SERVER['SERVER_PORT'];   //porta del serve, perchè c'è chi ha 80, chi 8080 etc...
        if(isset($_SESSION["usrLogin"])){
          //vuoldire che é stato effettuato il login precedentemente
        }else{
          $_SESSION["loginPerAcquisto"]="yes";
          header("Location: http://" .$ip .":" .$porta ."/esPHP/TheCinema/Registrazione/loginregister/Login-Registra.php");
          die("");
        }


    ///ricevo gli id
    $arrId=Array();
      if(isset($_POST["numeroPosti"])){
        $numPosti=$_POST["numeroPosti"];
        echo "Valore -> " . $numPosti;
        for($i=0;$i<$numPosti;$i++){
          if(isset($_POST["id$i"])) {
            $app=$_POST["id$i"];
            $arrId[]=$app;
          }
        }
      }
      /*
      echo "Id dei posti ricevuti";
      for($i=0;$i<count($arrId);$i++){
        echo "<br>id Posto -> " .$arrId[$i];
      }
      */
    ////////dopo che è stato cliccato il pulsante/////////////////////
      //////////////////////procedo ad aggiornare il db //////////////////////////////////////
      /////////////////////////////////prendo l'id del cliente/////////////
      $usernameUtente=$_SESSION["usrLogin"];
      $sql = "SELECT idUtente from utente where username=\"$usernameUtente\"  ";
                 $records=$conn->query($sql);
                 if ( $records == TRUE) {
                     //echo "<br>Query eseguita!";
                 } else {
                   die("Errore nella query: " . $conn->error);
                 }
                 if($records->num_rows ==0){
                       //	echo "la query non ha prodotto risultato";

                 }else{

                         while($tupla=$records->fetch_assoc()){
                             $idUtente=$tupla["idUtente"];
                             //echo "<br>id utente : $idUtente ";
                           //	echo "<br> Costo intero $costoIntero";
                           //	echo "<br> Costo ricotto $costoRidottoU6";
                         }
                }



      //////1. inserisco l'acquisto dell'utente per ciascun biglietto acquistato////////////
      if(isset($_SESSION["idProiezione"])){
                  $idProiezione=$_SESSION["idProiezione"];
                }else{
                  die("errore");
                }
                for($i=0;$i<count($arrId);$i++){

                  echo "<br> id -> " .$arrId[$i];
                     $sql = "insert into acquistaBiglietto(idCliente,idProiezione,id_posto) values(\"$idUtente\",\"$idProiezione\",\"$arrId[$i]\") ";
                                if ( $conn->query($sql) == TRUE) {
                                    //echo "<br>Query eseguita!";
                                    //die("Registrazione avvenuta correttamente");
                                } else {
                                  die("(registrazione) Errore nella query: " . $conn->error);
                                }

                }

                die("Registrazione avvenuta correttamente");
                /////2. cambio lo stato del posto a occupato//////////////



     ?>



  </body>

</html>
