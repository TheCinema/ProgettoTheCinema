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
      /*
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
                */
                echo "$usernameUtente prenotazione effettuata correttamente.";
                echo "Per ritirare il biglietto è necessario presentarsi alla cassa mostrando il QRCode";
                  //echo "<p> DETTAGLI </p>";
                  /////////genero qrcode e il valore casuale(128) usato come input per il qrcode verrà caricato bel db//////////////


                  function generateRandomString($length) {
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $charactersLength = strlen($characters);
                    $randomString = '';
                    for ($i = 0; $i < $length; $i++) {
                      $randomString .= $characters[rand(0, $charactersLength - 1)];
                      }
                    return $randomString;
                  }
                      $dimensione=128;
                  echo generateRandomString($dimensione);


                    $valIns="
                    <script>
                      function generate_qrcode($dimensione){
                        $.ajax({
                        type: 'post',
                        url: 'generator.php',
                        data : {sample:sample},
                        success: function(code){
                        $('#result').html(code);
                        }
                        });
                      }
                    </script> ";
                    echo $valIns;





     ?>



  </body>

</html>
