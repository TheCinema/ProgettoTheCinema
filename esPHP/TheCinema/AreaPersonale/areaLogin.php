<html>
	<head>
		<title>The Cinema </title>
			<link rel="icon" href="Immagini\logoHome.gif" />
				<link rel="icon" href="..\Immagini\logoHome.gif" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<style>
		/*il b_container e' il contenitore di tutte le tabelle*/
			.b_container {
					padding: 0px;
					border: 0px;
					margin: 20px 0px;
					width: 100%;
			}
			/*il left_tpart e' il contenitore della tabella sulla sinistra contenente i dati dei biglietti Acquistati*/
			.left_tpart {
				width: 40%;
				left: 0%;
			}

			.button2 {
				border: none;
		  color: white;
		  padding: 15px 32px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  font-size: 16px;
				background-color: #EA7055; /* red */
			position: absolute;
				top: 95%;
				left: 15%;
				transform: translate(-50%, -50%);
			}
			.button1 {
				border: none;
		  color: white;
		  padding: 15px 32px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  font-size: 16px;
				background-color: #EA7055; /* red */
			position: absolute;
				top: 95%;
				right: 15%;
				transform: translate(-50%, -50%);
			}
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
		<a> <font face='Work Sans' size='900'> Benvenuto  </font></a>
		<?php
			session_start();
			$flagEnd= false;
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
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				   			//vedere form in basso
				if(isset($_POST["logout"])) {
					$_SESSION["usrLogin"]=null;
					$_SESSION["mailLogin"]=null;
					$_SESSION["dataLogin"]=null;
					header("location: http://" .$ip .":" .$porta ."/esPHP/TheCinema/Registrazione/loginregister/logout.php");
					die("");
				}
				if(isset($_POST["elimina"])) {
					die("eliminiamo");
				}
				if(isset($_POST["modifica"])) {
						header("location: http://" .$ip .":" .$porta ."/esPHP/TheCinema/AreaPersonale/modificaAccount.php");
				}
			}
								//Connessione con db
			//includo file per la connesione al database
			include "connessione.php";
			//Query estrapola tutti i film che ho guardato fino a oggi
			//creo la query
			$u = $_SESSION["user"];
			$sql = "select f.*, p.*, acqb.*,count(acqb.codTransazione) as num_posti_comprati,p.dataProiezione,acqb.codTransazione from acquistabiglietto acqb join utente u on(acqb.idCliente = u.idUtente)
				join proiezione p on(acqb.idProiezione = p.idProiezione)
				join film f on(p.codiceFilm = f.codiceFilm) where u.username = \"$u\"
				group by acqb.randomString";


			//eseguo la Query
			$result = $conn->query($sql);
			//controllo se ho dei risultati
			//il b_container e' il contenitore di tutte le tabelle
			$msg = " <h3 align=\"center\">Prenotazioni effettuate da $u</h3> <table  class=\"table\">
									<thead class=\"thead-dark\">
										<tr>
											<th scope=\"col\">Nome Film</th>
											<th scope=\"col\">Data Acquisto</th>
											<th scope=\"col\">Orario Acquisto</th>
											<th scope=\"col\">Numero Di Posti Acquistati</th>
											<th scope=\"col\">Durata</th>
											<th scope=\"col\">file prenotazione</th>
										</tr>
									</thead>
									<tbody>";

									$data=date("Y/m/d");
									$dataOggi = new DateTime($data);
									////////////////////anno///////////////
									$annoAttuale=$dataOggi->format('Y');
								//	echo "<br> Anno Attuale " .$annoAttuale;
									$meseAttuale=$dataOggi->format('F');
									//////////////////////mese/////////////////////
									//echo "<br> Mese Attuale " .$meseAttuale;
									///////////////////giorno//////////////////
									$giornoAttuale=$dataOggi->format('d');
								//	echo "<br> Giorno Attuale " .$giornoAttuale;
		////////////////////////////////////////////////////////////////////////////////////
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()) {

				$codTrans= $row["codTransazione"];
				$dtPren=$row["dataProiezione"];
				$dataPren = new DateTime($dtPren);
				/////////anno///////////////
				$annoproiezione=$dataPren->format('Y');
			//	echo "<br> Anno proiezione " .$annoproiezione;
				///////////mese/////////////////////
				$meseProiezione=$dataPren->format('F');
		//		echo "<br> Mese proiezione" .$mesePre;
				///////////////////giorno/////////////////
				$giornoProiezione=$dataPren->format('d');
		//		echo "<br> Giorno proiezione " .$giornoproiezione;

				//////////////////////////////////////////////////////////////////////////////////////////
						if($annoproiezione=$annoAttuale && $meseAttuale=$meseProiezione && $giornoAttuale>$giornoProiezione){
						$msg .= "<tr> <td scope=\"row\">  " . $row['nome'] . "</td>
												<td>" . $row['dataAcquisto'] . "</td>
												<td>" . $row['oraAcquisto'] . "</td>
												<td>" . $row['num_posti_comprati'] . "</td>
												<td>" . $row['durata'] . "</td>
												<td> non disponobile </td>
											</tr>";
						}else{
							$msg .= "<tr> <td scope=\"row\">  " . $row['nome'] . "</td>
													<td>" . $row['dataAcquisto'] . "</td>
													<td>" . $row['oraAcquisto'] . "</td>
													<td>" . $row['num_posti_comprati'] . "</td>
													<td>" . $row['durata'] . "</td>
													<td> <a href=\"ricreaPdfPrenotazione/creaPDF.php?codTransazione=$codTrans\" >scarica<a> </td>
												</tr>";
						}
				}
			}
			$msg .= "	</tbody>";

			//modifica account
			$username=$_SESSION["usrLogin"];
			$mail=$_SESSION["mailLogin"];
			$dataNascita=$_SESSION["dataLogin"];

				if(isset($_GET["campo"])){
					$campoDaModificare=$_GET["campo"];
					if($campoDaModificare=="usr"){//se vuole modificare lo username
						$_SESSION["modificoUsr"]=1;
						$_SESSION["modificoData"]=null;  //metto a null la modifica della data
						$_SESSION["modificaMail"]=null;		//metto a null la modifica dell'email
						$_SESSION["editMode"]=1;
					}
					if($campoDaModificare=="mail"){//se vuole modificare la mail
						$_SESSION["modificoMail"]=1;
						$_SESSION["modificoData"]=null;    //metto a null la modifica della data
						$_SESSION["modificoUsr"]=null;				//metto a null la modifica dell'usr
						$_SESSION["editMode"]=1;
					}
					if($campoDaModificare=="dataNascita"){//se vuole modificare la data
						$_SESSION["modificoData"]=1;
						$_SESSION["modificoUsr"]=null;					//metto a null la modifica dell'usr
						$_SESSION["modificoMail"]=null;			//metto a null la modifica dell'email
						$_SESSION["editMode"]=1;
					}
					$_SESSION["editMode"]=null;

					if(isset($_SESSION["modificoUsr"])){
						$msg.="<form method=\"post\" action=\"modificaAccount.php\">
						<input type=\"text\" name=\"editUsr\" value=\"$username\" ><input type=\"submit\" value=\"Aggiorna\"/><br><br>
						<input type=\"text\" name=\"mail\" value=\"$mail\" readonly><br><br>
						<input type=\"text\" name=\"data\" value=\"$dataNascita\" readonly><br><br>
						</form>";
						$_SESSION["editMode"]=null;

					}else{

						if(isset($_SESSION["modificoMail"])){
							$msg.="<form method=\"post\" action=\"modificaAccount.php\">
							<input type=\"text\" name=\"usr\" value=\"$username\" readonly><br><br>
							<input type=\"text\" name=\"editMail\" value=\"$mail\" ><input type=\"submit\" value=\"Aggiorna\"/><br><br>
							<input type=\"text\" name=\"data\" value=\"$dataNascita\" readonly><br><br>
							</form>";
							$_SESSION["editMode"]=null;

						}else{

							if(isset($_SESSION["modificoData"])){//sto modificando la data
								$msg.="<form method=\"post\" action=\"modificaAccount.php\">
								<input type=\"text\" name=\"usr\" value=\"$username\" readonly><br><br>
								<input type=\"text\" name=\"mail\" value=\"$mail\" readonly><br><br>";
								$data = date("Y-m-d");//data odierna
								$msg.="<input type=\"date\" name=\"editData\" value=\"$dataNascita\" min=\"1950-01-01\" max=\"$data\" ><input type=\"submit\" value=\"Aggiorna\"/><br><br>
								</form>";

								$_SESSION["editMode"]=null;
							}
						}
					}
				}else{
					if(!isset(	$_SESSION["editMode"])){
						$msg.="

						<input type=\"text\" name=\"usr\" value=\"$username\" readonly><a href=\"http://$ip:$porta/esPHP/TheCinema/AreaPersonale/areaLogin.php?campo=usr\" > <img  width=\"40px\" height=\"40px\" src=\" http://" .$ip .":" .$porta ."/esPHP/TheCinema/Immagini/pen.png\" /></a><br><br>
						<input type=\"text\" name=\"mail\" value=\"$mail\" readonly><a href=\"http://$ip:$porta/esPHP/TheCinema/AreaPersonale/areaLogin.php?campo=mail\" > <img  width=\"40px\" height=\"40px\" src=\"http://" .$ip .":" .$porta ."/esPHP/TheCinema/Immagini/pen.png\" /></a><br><br>
						<input type=\"text\" name=\"data\" value=\"$dataNascita\" readonly><a href=\"http://$ip:$porta/esPHP/TheCinema/AreaPersonale/areaLogin.php?campo=dataNascita\" > <img  width=\"40px\" height=\"40px\" src=\"http://" .$ip .":" .$porta ."/esPHP/TheCinema/Immagini/pen.png\" /></a><br><br>
									";

					}
				}





			if(isset($_SESSION["modificaAvvenuta"])){
				$msg.="Modifica avvenuta";
				$_SESSION["modificaAvvenuta"]=null;
			}


			/////////////////////////////////////MESSAGGI ERRORE///////////////////////////////////////////////
			if(!isset($_SESSION["valoreUguale"])){
				if(isset($_SESSION["erroreModifica"])){
					$msg.="Errore, campo non modificato";
					$_SESSION["erroreModifica"]=null;
				}
			}

			if(isset($_SESSION["valoreUguale"])){//messaggio che compare quando lutente inserisce un username o mail gia esistente
				$msg.="Errore, valore già presente";
				$_SESSION["valoreUguale"]=null;
			}

			if(isset($_SESSION["mailSbagliata"])){//se nell'email manca la @ o il dominio finale
				$msg.="Email non valida";
				$_SESSION["mailSbagliata"]=null;
			}

			$conn->close();
			echo "<div class=\"b_container\">
							<div class=\"left_tpart\">
								$msg
							</div>
						</div>";


?>
<div>
	<form action="areaLogin.php" method="post">
		<input type="submit" name="logout" class="button1"  value="Logout"></input>
	</form>
	<button type="submit" onclick="myFunction()" name="elimina" class="button2" id="2" >Elimina l'account</button>
</div>
<p id="eliminaAccount"></p>

	<?php
		//uso la variabile $username che prende l'username da una session
		$alertBox="
				<script>
							function myFunction() {
								  var txt;
								  var person = prompt(\"Scrivi il tuo username per cancellare definitivamente il tuo account '$username' : \");
								  if (person == null || person == \"\" ) {
											txt=\"\";
								  }if(person==\"$username\") {
								    txt =\"\";
										location.href = 'eliminaAccount.php';								  }
								  document.getElementById(\"eliminaAccount\").innerHTML = txt;
							}


	 			</script>";
				echo $alertBox;
	?>
</body>
</html>
