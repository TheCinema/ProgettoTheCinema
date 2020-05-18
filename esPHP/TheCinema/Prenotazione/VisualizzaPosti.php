<html>
  <head>
      <title>The Cinema </title>
    <style>
              ul {
            list-style-type: none;
          }
          li {
            display: inline-block;
          }

          input[type="checkbox"][id^="posto"] {
            display: none;
          }

          label {
            border: 1px solid #fff;
            padding: 10px;
            display: block;
            position: relative;
            margin: 10px;
            cursor: pointer;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color:  #d1e0e0
;

          }
          .label {

            background-color: red;
          }

          label::before {
            background-color: white;
            color: white;
            content: " ";
            display: block;
            border-radius: 50%;
            border: 1px solid grey;
            position: absolute;
            top: -5px;
            left: -5px;
            width: 25px;
            height: 25px;
            text-align: center;
            line-height: 28px;
            transition-duration: 0.4s;
            transform: scale(0);
          }

          label img {
            height: 50px;
            width: 50px;
            transition-duration: 0.2s;
            transform-origin: 50% 50%;
          }

          :checked+label {
            border-color: #ddd;
          }

          :checked+label::before {

            content: "✓";
            background-color: black;
            transform: scale(0.5);
          }

          :checked+label img {
            transform: scale(0.9);
            box-shadow: 0 0 5px #333;
            z-index: -1;
          }
          .button2 {
        		border: none;
          color: white;
          padding: 15px 32px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
        		background-color: #008CBA; /* Blue */
        	position: absolute;
        		top: 100%;
        		left: 80%;
        		transform: translate(-50%, -50%);
        	}
        	.button3 {
        		border: none;
          color: white;
          padding: 15px 32px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
        		background-color: #008CBA; /* Blue */
        	position: absolute;
        		top: 100%;
        		left: -100%;
        		transform: translate(-50%, -50%);
        	}

    </style>
  </head>
    <body>
    <?php
    include "connessione.php";
    include "posto.php";
    $postiOccupatiPresente=true;
    $gestionePosti=Array();

                  //prendo tutte le file disponibili

                        //prendo tutte le file max presenti nel db
                        $sql = "SELECT  fila from fila order by fila asc";

                        $records=$conn->query($sql);
                        if ( $records == TRUE) {
                            //echo "<br>Query eseguita!";
                        } else {
                          die("Errore nella query: " . $conn->error);
                        }
                        if($records->num_rows ==0){
                              //	echo "la query non ha prodotto risultato";
                              die("nella sala non sono presenti le file");
                        }else{
                            $fileMAX=array();
                            while($tupla=$records->fetch_assoc()){
                              $fileMAX[]=$tupla["fila"];

                            }
                        }
                        //////*******POSTI LIBERI*************//////////////
                        $sql = "SELECT posto.id,posto.fila, posto.numero,posto.disabile
                         from posto where posto.idSala=\"$idSala\" and posto.id not in ( Select posto.id
                                                            from posto join acquistabiglietto on posto.id=acquistabiglietto.id_posto)
                        order by posto.fila asc";
                         //mi restituisce fila e numero di posti liberi
                        $records=$conn->query($sql);
                        if ( $records == TRUE) {
                            //echo "<br>Query eseguita!";

                        } else {
                          die("Errore nella query: " . $conn->error);
                        }
                        if($records->num_rows ==0){
                              //	echo "la query non ha prodotto risultato";
                              //die("non si sono posti");
                              die("Spiacente, per questo spettacolo non è rimasto nessun posto libero.<a href=\"Prenotazione.php\">  Scegli un altro film</a>");
                        }else{
                          $_SESSION["nessunPostoDisponibile"]=null;
                                  while($tupla=$records->fetch_assoc()){
                                    $idPosto=$tupla["id"];
                                    $LetteraFila=$tupla["fila"];
                                    $numero=$tupla["numero"];
                                      $disabile=$tupla["disabile"];
                                      $posto= new PostiGest($idPosto,$numero,$LetteraFila,$disabile,"no");
                                      $gestionePosti[]=$posto;
                                  }
                          }

                          //////////////////////posti occupati////////////////////////////////////////////

                          $sql = "SELECT posto.id,posto.fila,posto.numero, posto.disabile
                           from posto where posto.idSala=\"$idSala\" and posto.id  in ( Select posto.id
                                                              from posto join acquistabiglietto on posto.id=acquistabiglietto.id_posto)
                          order by posto.fila asc";
                           $records=$conn->query($sql);
                           if ( $records == TRUE) {
                               //echo "<br>Query eseguita!";
                           } else {
                             die("Errore nella query: " . $conn->error);
                           }
                           if($records->num_rows ==0){
                                 //	echo "la query non ha prodotto risultato";
                                   $postiOccupatiPresente=false;
                           }else{

                                   while($tupla=$records->fetch_assoc()){
                                     $idPosto=$tupla["id"];
                                     $LetteraFila=$tupla["fila"];
                                       $numero=$tupla["numero"];
                                       $disabile=$tupla["disabile"];
                                       $posto= new PostiGest($idPosto,$numero,$LetteraFila,$disabile,"si");
                                       $gestionePosti[]=$posto;

                                   }

                              }

                              ///gli ordino
                              sort($gestionePosti);

                              $dimensione="10px";
                              $msg="<form action=\"prenotazione3.php\" method=\"post\">
                                    <ul>";
                                    $struttura=Array();

                                    echo "";
                                    $msg="<form action=\"prenotazione3.php\" style=\"width: 100%; margin-top: 80px; padding-right: 85px;\" method=\"post\">
                                          <ul>
                                          ";
                                          $id=1;
                                          $height="20px";
                                        $width="20px";
                                    for($j=0;$j<count($fileMAX);$j++){
                                      $n=$j;
                                      $n++;
                                      $msg.= "Fila  $n    -";
                                        for($i=0;$i<count($gestionePosti);$i++){
                                          $idPosto=$gestionePosti[$i]->getId();
                                          $numeriPosto=$gestionePosti[$i]->getNumero();
                                          $filaPosto= $gestionePosti[$i]->getFila();
                                          $disabilePosto=$gestionePosti[$i]->isDisabile();
                                          $occupatoPosto=$gestionePosti[$i]->isOccupato();

                                          if($fileMAX[$j]==$filaPosto){
                                            if($disabilePosto=="si" && $occupatoPosto=="si"){
                                              $msg.="<li><input type=\"checkbox\" name=\"$id\" id=\"posto$id\" disabled />
                                                <label for=\"posto$id\"  style=\"border: 2px solid black; border-radius: 25px;\"><img height=\"$height\" width\=\"$width\" src=\"Immagini\DisabileOccupato.png\" /></label>
                                              </li> ";
                                              $id++;
                                            }if($disabilePosto=="si" && $occupatoPosto=="no"){
                                              $msg.="<li><input type=\"checkbox\" name=\"$id\" id=\"posto$id\" value=\"$idSala?$numeriPosto?$filaPosto?$disabilePosto\"  />
                                                <label for=\"posto$id\"  style=\"border: 2px solid black; border-radius: 25px;\"><img height=\"$height\" width\=\"$width\" src=\"Immagini\Disabile.png\" /></label>
                                              </li> ";
                                                $id++;
                                            }if($disabilePosto=="no" && $occupatoPosto=="no"){
                                              $msg.="<li><input type=\"checkbox\" name=\"$id\" id=\"posto$id\"  value=\"$idPosto?$numeriPosto?$filaPosto?$disabilePosto\" />
                                                <label for=\"posto$id\"  style=\"border: 2px solid black; border-radius: 25px;\"><img height=\"$height\" width\=\"$width\" src=\"Immagini\Sedie\chairLibera$numeriPosto.png\" /></label>
                                              </li> ";
                                                $id++;
                                            }if($disabilePosto=="no" && $occupatoPosto=="si"){
                                              $msg.="<li><input type=\"checkbox\" name=\"$id\" id=\"posto$id\" disabled />
                                                <label for=\"posto$id\"  style=\"border: 2px solid black; border-radius: 25px;\"><img height=\"$height\" width\=\"$width\" src=\"Immagini\chair.png\" /></label>
                                              </li> ";
                                                $id++;
                                            }
                                          }

                                        }
                                        $msg.="<br>";
                                    }

      $msg.="
      <br>
        <input type=\"submit\" style=\"margin-left: 3%; border-radius: 25px; border: 2px solid black; width: 200px; height: 60px; background-color: #d25050; font-weight: bold;\" name=\"annulla\" value=\"DESELEZIONA TUTTO\">
        <input type=\"submit\" style=\"border-radius: 25px; border: 2px solid black;  width: 200px; height: 60px;  background-color:#6cdf66;  font-weight: bold;\" value=\"CONFERMA\">
        <input type=\"hidden\"  name=\"numeroPosti\" value=\"$id\" ></ul>
      </form>";


    echo $msg;



    ?>

    </body>
</html>
