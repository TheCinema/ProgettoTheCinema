<html>
  <head>
      <title>The Cinema </title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>

    </style>
  </head>
  <body>
    <?php
    session_start();

    include "connessione.php";
    if(isset($_SESSION["usrLogin"])){
      $usernameUtente=$_SESSION["usrLogin"];
    }else{
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
                  $ora=date("h:i:sa");
                  $data = date("Y-m-d");

                  echo "<br> id -> " .$arrId[$i];
                     $sql = "insert into acquistaBiglietto(oraAcquisto,DataAcquisto,idCliente,idProiezione,id_posto) values(\"$ora\",\"$data\",\"$idUtente\",\"$idProiezione\",\"$arrId[$i]\") ";
                                if ( $conn->query($sql) == TRUE) {
                                    //echo "<br>Query eseguita!";
                                    //die("Registrazione avvenuta correttamente");
                                } else {
                                  die("(registrazione) Errore nella query: " . $conn->error);
                                }

                }

                echo "$usernameUtente prenotazione effettuata correttamente.";
                echo "Per ritirare il biglietto è necessario presentarsi alla cassa mostrando il QRCode";
                  //echo "<p> DETTAGLI </p>";
                  /////////genero qrcode e il valore casuale(128) usato come input per il qrcode verrà caricato bel db//////////////
                  //dopo che ho registrato l'acquisto vado a generare il barcode( la stringa in input per crearla verrà caricata nel db)

                  //dato che sono presenti già qua tutti i dati di cui ho bisogno richiamo la pagina php qua anzichè reindirizzare a quella pagina
                //  header ("location:barcode/GeneraBarcode.php");

                  /*dati necessari da inserire e che prendo dal db, gli cerco dagli id salvati nelle session.
                    -Nome del FILM
                    -Data di Proiezione
                    -Orario di Proiezione
                    -Sala
                    -Fila
                    -Posto

                    */
                    /////////////////////////////////////////mi trovo  idAcquisto///////////////
                    $idProiezione=$_SESSION["idProiezione"];
                    $codTrans=Array();
                    $sql = "SELECT acquistaBiglietto.codTransazione from acquistaBiglietto where acquistaBiglietto.oraAcquisto=\"$ora\" and acquistaBiglietto.DataAcquisto=\"$data\" and acquistaBiglietto.idProiezione=\"$idProiezione\" and acquistaBiglietto.idCliente=\"$idUtente\"  ";
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
                                           $codTrans[]=$tupla["codTransazione"];
                                         }
                                      //  echo $nomeFilm;
                              }

                              $_SESSION["numTrans"]=count($codTrans);
                              for($i=0;$i<count($codTrans);$i++){
                                $_SESSION["trans$i"]=$codTrans[$i];
                              }

                      ///////////da idProiezione trovo il nome del film,la Sala e la data e l'ora di proiezione
                      $idProiezione=$_SESSION["idProiezione"];
                      $sql = "SELECT film.nome,proiezione.idSala,proiezione.dataProiezione,proiezione.orarioProiezione from proiezione join film on proiezione.codiceFilm=film.codiceFilm where proiezione.idProiezione=\"$idProiezione\"  ";
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
                                             $nomeFilm=$tupla["nome"];
                                             $salaFilm=$tupla["idSala"];
                                             $dataProiezione=$tupla["dataProiezione"];
                                             $oraProiezione=$tupla["orarioProiezione"];
                                         }
                                        //  echo $nomeFilm;
                                }
                                  //gli inserisco nella sessione mando a ex.php per creare il pdf
                                $_SESSION["nomeFilm"]=$nomeFilm;
                                $_SESSION["salaFilm"]=$salaFilm;
                                $_SESSION["dataProiezione"]=$dataProiezione;
                                $_SESSION["oraProiezione"]=$oraProiezione;
                                //array in cui sono presenti gli id dei posti
                                //  $arrId
                                $_SESSION["numPosti"]=count($arrId);   //mi salvo il numero di posti
                                for($i=0;$i<count($arrId);$i++){
                                  $_SESSION["posto$i"]=$arrId[$i];
                                }



//////////////////////////////////////////////************CODICE PER CREARE IL PDF*************************//////////////////////////////////////////////////////

                                            header("location:barcode/ex.php");

          ?>

  </body>

</html>
