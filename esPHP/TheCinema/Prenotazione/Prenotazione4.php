<html>
		<head>
				<title>The Cinema </title>
			<style>
				body {
					margin:auto;
					background: rgb(253,187,45);
					background: linear-gradient(0deg, rgba(253,187,45,1) 0%, rgba(34,193,195,1) 100%);
					font-family: 'Roboto', sans-serif;
					font-weight: 800;
					position: relative;
				}
				form{
				position: absolute;
				top: 60%;
				left: 50%;
				transform: translate(-50%, -50%);
				}
				p {
				border-style: inset;
				text-align:center;
				position: absolute;
				top: 20%;
				left: 50%;
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
				top: 100%;
				left: 50%;
				transform: translate(-50%, -50%);
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
			</style>
		</head>

<body>
  <div class="container">
     <ul class="progressbar">
          <li >Scegli il film</li>
          <li>Seleziona i posti</li>
          <li>Ricapitolo</li>
          <li class="active">Pagamento</li>
  		</ul>
	<?php
		session_start();
		$ip = $_SERVER['SERVER_NAME'];  //server per vedere sei sei localhost o hai un ip
		$porta = $_SERVER['SERVER_PORT'];   //porta del serve, perchè c'è chi ha 80, chi 8080 etc...
		//verifico se è stato fatto il login
		$username=$_SESSION["usrLogin"];
		if(isset($username)){
			//ok rimane
		}else{
				header("location: http://" .$ip .":" .$porta ."/esPHP/TheCinema/Home.php");  //viene rimandato alla Home
				die("");
		}
					$arrPosti=Array();
					$costo=0;
						if(isset($_POST["numeroPosti"])){
							$numeroPosti=$_POST["numeroPosti"];
							for($i=1;$i<=$numeroPosti;$i++){
									if(isset($_POST["idPosto$i"])){
										echo $_POST["idPosto$i"];
										$ps=$_POST["idPosto$i"];
										$arrPosti[]=$ps;
									}
									if(isset($_POST["costo$i"])){
										$costo+= $_POST["costo$i"];
									}
							}
						}
						$nmEffettivo=$numeroPosti-1;
						$msg="<br>";
						echo "<br> Costo totale $costo";
						$msg.= "<form action=\"EffettuaAcquisto.php\" method=\"POST\">
										<input class=\"button2\" type=\"submit\" value=\"Acquista $nmEffettivo biglietti\"</input>
										";
											for($i=0;$i<count($arrPosti);$i++){
												$msg.="<input type=\"hidden\" value=\"$arrPosti[$i]\" name=\"id$i\"></input>";
											}
												$val=count($arrPosti);
												$msg.="<input type=\"hidden\" value=\"$val\" name=\"numeroPosti\"></input>";
											$msg.="</form>";
						echo $msg;
						//devo reinviare i dati ad un altra pagina
						/*
						////////dopo che è stato cliccato il pulsante/////////////////////
						if($_SERVER["REQUEST_METHOD"]=="POST"){
							//////////////////////procedo ad aggiornare il db //////////////////////////////////////
							/////////////////////////////////prendo l'id del cliente/////////////
							include "connessione.php";
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
																		 echo "id utente : $idUtente ";
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
												for($i=0;$i<count($arrPosti);$i++){

														 $sql = "insert into acquistabiglietto(idCliente,idProiezione,id_posto) values(\"$idUtente\",\"$idProiezione\",\"$arrPosti[$i]\") ";
																				$records=$conn->query($sql);
																				if ( $records == TRUE) {
																						//echo "<br>Query eseguita!";
																						die("Registrazione avvenuta correttamente");
																				} else {
																					die("Errore nella query: " . $conn->error);
																				}

												}

						}
						*/

		?>

</body>
</html>
