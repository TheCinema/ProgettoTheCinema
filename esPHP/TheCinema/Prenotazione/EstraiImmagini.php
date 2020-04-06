<?php

  if(isset($_GET["data"])){
    $data=$_GET["data"];
  }else{
    die("errore");
  }

include "connessione.php";
  $film=Array();
$sql = "SELECT film.foto,film.codiceFilm from film join proiezione on film.codiceFilm=proiezione.codiceFilm where proiezione.DataProiezione=\"$data\"";
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
                     $id=$tupla["codiceFilm"];
                       $foto=$tupla["foto"];
                       $film+=Array($id=>$foto);
                   }
          }
          //$msg="<form>";
        //	$msg.="<br><input type=\"radio\" name=\"film\"  value=\"$codice\">$nome</input>";
          //echo "<br>$nome : $codice";
        //	$msg.="<br><input type=\"submit\" value=\"Invia\"></input>
          //			</form>";
          $msg="";
          foreach($film as $id=>$foto){
            echo "<br>" .$foto;
            echo "  ".$id;
          $msg.= "<br><a href=\"Prenotazione2.php?id=$id\" ><img width=\"300px\" height=\"200px\"src=\"$foto\"></img> </a><br>";

          }
          echo $msg;





 ?>
