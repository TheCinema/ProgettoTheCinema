<html>
<head>
		<title>The Cinema </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style>
								a:hover{
							border:2px solid red;
							}
							a{
						border:2px solid black;
						}
							body {
								margin:auto;
								background: rgb(253,187,45);

								font-family: 'Roboto', sans-serif;
								font-weight: 800;
								position: relative;

							}
							.c{
								position: absolute;
									top: 30%;
							}

							/*
								form{
								position: absolute;
								top: 55%;
								left: 70%;
								transform: translate(-50%, -50%);
								}
							*/
							form{
						position: absolute;
							top: 15%;


							}

						p {
							border-style: inset;
							text-align:center;
							position: absolute;
							top: 20%;
							left: 30%;
							transform: translate(-50%, -50%);
							 font-size: 34px;
							padding: 30px;
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
								top: 105%;
								left: 50%;
								transform: translate(-50%, -50%);
							}
							.button3 {
								background-color: Transparent;
									 background-repeat:no-repeat;
									 border: none;
									 cursor:pointer;
									 overflow: hidden;
									 outline:none;
								}
								.container {
									font-family: 'Roboto', sans-serif;
								  width: 1300px;
								  margin: 30px ;

						  }
						  .progressbar {font-family: 'Roboto', sans-serif;
							  counter-reset: step;

						  }
						  .progressbar li {
							  font-family: 'Roboto', sans-serif;
							  list-style-type: none;
							  width: 25%;
							  float: left;

							  font-size: 12px;
							  position: relative;
							  text-align: center;
							  text-transform: uppercase;
							  color: #7d7d7d;
						  }
						  .progressbar li:before {
							  font-family: 'Roboto', sans-serif;
							  width: 30px;
							  height: 30px;
							  content: counter(step);
							  counter-increment: step;
							  line-height: 30px;
							  border: 2px solid #7d7d7d;
							  display: block;
							  text-align: center;
							  margin: 0 auto 10px auto;
							  border-radius: 50%;
							  background-color: white;
						  }
						  .progressbar li:after {
							  font-family: 'Roboto', sans-serif;
							  width: 100%;
							  height: 2px;
							  content: '';
							  position: absolute;
							  background-color: #7d7d7d;
							  top: 15px;
							  left: -50%;
							  z-index: -1;
						  }
						  .progressbar li:first-child:after {
							  font-family: 'Roboto', sans-serif;
							  content: none;
						  }
						  .progressbar li.active {
							  font-family: 'Roboto', sans-serif;
							  color: black;

						  }
						  .progressbar li.active:before {
							  font-family: 'Roboto', sans-serif;
							  border-color: black;
						  }
						  .progressbar li.active + li:after {
							  font-family: 'Roboto', sans-serif;
							  background-color: black;
						  }
						  img {
							  border-radius: 0px;
							  position: relative;
										top: 70%;
							}
	</style>
</head>

<body>
 <div class="container">
      <ul class="progressbar">
          <li class="active">Scegli il film</li>
          <li>Seleziona i posti</li>
          <li>Ricapitolo</li>
          <li>Pagamento</li>
  </ul>
	<?php
		session_start();
		$ip=$_SERVER['SERVER_NAME'];  //server per vedere sei sei localhost o hai un ip
		$porta=$_SERVER['SERVER_PORT'];   //porta del serve, perchè c'è chi ha 80, chi 8080 etc...


		include "connessione.php";
		if($_SERVER["REQUEST_METHOD"]=="POST"){
					if(isset($_POST["data"])){ //2. lo ricevo e lo salvo
						$data=$_POST["data"];
						$_SESSION["dataDaMantenere"]=$data;   //la ricarico al riavvio cosi si salva la data di ora  //3. lo inserisco come sessione
					}

		}else{
			//vuoldire che non è stato cliccato niente quindi uso come data quella del RegistrazioneInserimentoDB
			if(isset($_SESSION["dataDaMantenere"])){
				$data=$_SESSION["dataDaMantenere"];
			}else{
					$data = date("Y-m-d");
			}

		}

		//$_SESSION["data"]=null;
					//calendario per la scelta del giorno
				//	$_SESSION["dataDaMantenere"]=null;
					if(isset(	$_SESSION["dataDaMantenere"])){

								$dataSelezionata =$_SESSION["dataDaMantenere"];
										$dataAttuale = date("Y-m-d");
											$msg=" <br><form action=\"Prenotazione.php\" method=\"POST\" ><input type=\"date\"
							name=\"data\" value=\"$dataSelezionata\"  min=\"$dataAttuale\" ></input>
							<input type=\"submit\" value=\"invia\"></input>"; //1.invio il dato
						//	$_SESSION["data"]=null;
					}else{
								$dataAttuale = date("Y-m-d");
						$msg=" <br><form action=\"Prenotazione.php\" method=\"POST\" ><input type=\"date\"
							name=\"data\" value=\"$dataAttuale\"  min=\"$dataAttuale\" ></input>
							<input type=\"submit\" value=\"invia\"></input>";
				}



			echo $msg;




								///////////////trovo i film disponibili per la data selezionata//////////////////////
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
							          $msg="<table>";
							          foreach($film as $id=>$foto){
								          	$msg.= "<tr><td><img width=\"300px\" height=\"200px\" src=\"$foto\"></img><br></td>";
														$immagineOra="Immagini/1.png";
														///////////////////////////////trovo gli orari disponibili per ciascun film(id)///////////////////////////////////
														$sql = "SELECT proiezione.orarioProiezione,proiezione.idProiezione from proiezione join film on proiezione.codiceFilm=film.codiceFilm where proiezione.codiceFilm=\"$id\"";
																	$orario=Array();
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
																								 $idProiezione=$tupla["idProiezione"];
														                     $ora=$tupla["orarioProiezione"];
																								 //<img width=\"50px\" height=\"50px\"src=\"$immagineOra\"></img>
																									$msg.= "<td><a href=\"Prenotazione2.php?idProiezione=$idProiezione\">$ora</a><br></td>";
																							//	 $msg.= "<td><button class=\"button3\" onclick=\"window.location.href = \"Prenotazione2.php?id=$idProiezione\";\"  ></button><br></td> ";


														                   }
														          }


														 $msg.="</tr>";

							          }
												//	header("Location: http://" .$ip .":" .$porta ."/esPHP/TheCinema/Home.php");
													// da usare per le foto http://" .$ip .":" .$porta ."/esPHP/TheCinema/Immagini
													$msg.="</table>";
							          echo $msg;

			?>




</body>
</html>
