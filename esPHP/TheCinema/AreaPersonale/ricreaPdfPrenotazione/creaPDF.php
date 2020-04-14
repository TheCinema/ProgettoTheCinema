<?php
  session_start();
  include "connessione.php";
  if(isset($_GET["codTransazione"])){
    $codTrans=$_GET["codTransazione"];
    echo $codTrans;
  }
    //cerco nel db le transazio che ha lo stesso randomString, prendo anche la sala, nome del film e la data
      $sql="SELECT acquistaBiglietto.randomString,proiezione.idSala,proiezione.dataProiezione,proiezione.oraProiezione,film.nome from acquistaBiglietto where acquistaBiglietto.codTransazione=\"$codTrans\"";
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
                       $randomString=$tupla["randomString"];
                         echo "<br> ".$randomString;
                       }
              }

              //ora cerco nel db tutte le prenotazioni che hanno come randomString la stessa

              $sql="SELECT sala.id,";
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
                               $randomString=$tupla["randomString"];
                                 echo "<br> ".$randomString;
                               }
                      }

 ?>
