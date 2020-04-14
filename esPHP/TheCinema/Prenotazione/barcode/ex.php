<?php
  session_start();
  $ip=$_SERVER['SERVER_NAME'];  //server per vedere sei sei localhost o hai un ip
  $porta=$_SERVER['SERVER_PORT'];   //porta del serve, perchè c'è chi ha 80, chi 8080 etc...
include "connessione.php";
  if(isset($_SESSION["nomeFilm"]) && isset(  $_SESSION["salaFilm"]) && isset($_SESSION["dataProiezione"]) && isset(  $_SESSION["oraProiezione"])){
      //sono settati, continuo
        $arrPosti=Array();  //array in cui mettere i posti
      if(isset($_SESSION["numPosti"])){
        $numeroPosti=$_SESSION["numPosti"];
        for($i=0;$i<$numeroPosti;$i++){
          $arrPosti[]=$_SESSION["posto$i"];
        }
      }
      //mi salvo i dati presi dalle variabili di sessione
      $nomeFilm=$_SESSION["nomeFilm"];
      $salaFilm=$_SESSION["salaFilm"];
      $dataProiezione=$_SESSION["dataProiezione"];
      $oraProiezione=$_SESSION["oraProiezione"];
  }else{
      //non sono settati,torno alla home
      header("Location: http://" .$ip .":" .$porta ."/esPHP/TheCinema/home.php");
      die("");
  }
    $gestionePosti=Array();
    include "PostiAcquistati.php";
    $postiArr=Array();  //definisco l'arrary associativo in cui mettere la fila e il numero del posto
    //per ciascun id faccio una query per trovare la fila e il posto
    for($i=0;$i<count($arrPosti);$i++){

      $sql = "SELECT posto.fila,posto.numero FROM posto WHERE posto.id=\"$arrPosti[$i]\"";
               $records=$conn->query($sql);
               if ( $records == TRUE) {
                   //echo "<br>Query eseguita!";
               } else {
                 die("Errore nella query:  " . $conn->error);
               }
               if($records->num_rows ==0){
                     //	echo "la query non ha prodotto risultato";

               }else{

                       while($tupla=$records->fetch_assoc()){
                         $fila=$tupla["fila"];
                         $numero=$tupla["numero"];
                         $posto= new PostiAcquistati($arrPosti[$i],$numero,$fila);
                         $gestionePosti[]=$posto;
                       }
                      //  echo $nomeFilm;
              }
      }
      //////////////////////////////**prendo tutte le file presenti nel db**/////////////////////////////////
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
      ////////////////////////////////////////////////////////////////////
    sort($gestionePosti);  //ordino l'array
    include "code.php";


    ////////////////////////////////////////////////////////
        $pdf=new PDF();
        $pdf->AddPage();
          $dimensione=8;
            $stringaRandom=generateRandomString($dimensione);
            $idProiezione=$_SESSION["idProiezione"];
            /////////////////////aggiungo nel db la stringa usata per generare il barcode (la aggiungio a ciascuna prenotazione)/////////////
            $numTrans=$_SESSION["numTrans"];
            for($i=0;$i<$numTrans;$i++){
              $transCod=$_SESSION["trans$i"];
              $sql = "UPDATE acquistaBiglietto set acquistaBiglietto.randomString=\"$stringaRandom\" where acquistaBiglietto.codTransazione=\"$transCod\"";

              $records=$conn->query($sql);
              if ( $records == TRUE) {
                  //echo "<br>Query eseguita!";
              } else {
                die("Errore nella query: " . $conn->error);
              }
          }
            ////////////////////////////////////////////////////

        $pdf->Ln(5);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(0,0,"  TheCinema",0,0,'A');
        $pdf->Ln(11);
        $pdf->SetFont('Arial','',30);
        $pdf->Cell(0,0,"                       Prenotazione",0,0,'B');


        $pdf->Ln(50);

        $pdf->SetFont('Arial','',13);
        $pdf->Cell(0,0,"Nome film:",0,0,'A');

        $pdf->SetFont('Arial','',20);
        $pdf->Cell(0,0,"      $nomeFilm                                                                                                                                                         ",0,0,'C');

        $pdf->Ln(10);

        $pdf->SetFont('Arial','',13);
        $pdf->Cell(0,0,"Data Proiezione:",0,0,'A');

        $pdf->SetFont('Arial','',20);
        $pdf->Cell(0,0,"              $dataProiezione                                                                                                                                                         ",0,0,'C');

        $pdf->Ln(10);

        $pdf->SetFont('Arial','',13);
        $pdf->Cell(0,0,"Orario Proiezione:",0,0,'A');

        $pdf->SetFont('Arial','',20);
        $pdf->Cell(0,0,"              $oraProiezione                                                                                                                                                         ",0,0,'C');

        $pdf->Ln(10);
        $pdf->SetFont('Arial','',13);
        $pdf->Cell(0,0,"Sala:",0,0,'A');

        $pdf->SetFont('Arial','',20);
        $pdf->Cell(0,0," $salaFilm                                                                                                                                                                                  ",0,0,'C');

        $appe=0;
        $pdf->Ln(10);
        //faccio un ciclo per prendere tutti i posti per questa prenotazione
        $pdf->SetFont('Arial','',20);
        for($j=0;$j<count($fileMAX);$j++){
          for($i=0;$i<count($gestionePosti);$i++){
            $numeriPosto=$gestionePosti[$i]->getNumero();
            $filaPosto= $gestionePosti[$i]->getFila();
            if($fileMAX[$j]==$filaPosto){
              $pdf->Cell(0,0,"Fila: $filaPosto    Posto: $numeriPosto                                                                                                                                                                            ",0,0,'A');
              $pdf->Ln(10);
              $appe++;
            }

          }
        }

        $valore=$appe*10;
        $pdf->Ln(35+$valore);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(0,0,"      Da mostrare alla cassa: ",0,0,'A');

        $pdf->Code(80,155+$valore,$stringaRandom,1,10);   //stampo il barcode



        $pdf->Output();

        function generateRandomString($length) {
            $characters = '0cdS89rNOPQRxyabLMopqzABef23WXklmn1IJKCDEYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
    ?>
