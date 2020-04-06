<html>
	<head>
		<title>The Cinema </title>
			<link rel="icon" href="Immagini\logoHome.gif" />
				<link rel="icon" href="..\Immagini\logoHome.gif" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<style>

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

			if($_SERVER["REQUEST_METHOD"]=="POST"){
				   			//vedere form in basso
				if(isset($_POST["logout"])) {
					header("location: http://" .$ip .":" .$porta ."/esPHP/TheCinema/Registrazione/loginregister/logout.php");
					die("");
				}
				if(isset($_POST["elimina"])) {
					die("");
				}
				if(isset($_POST["modifica"])) {
						header("location: http://" .$ip .":" .$porta ."/esPHP/TheCinema/modificaAccount.php");
				}
			}
								//Connessione con db
			//includo file per la connesione al database
			include "Registrazione/loginregister/connessione.php";
			//Query estrapola tutti i film che ho guardato fino a oggi
			//creo la query
			$u = $_SESSION["user"];
			$sql = "select f.* from acquistabiglietto acqb join utente u on(acqb.idCliente = u.idUtente)
				join proiezione p on(acqb.idProiezione = p.idProiezione)
				join film f on(p.codiceFilm = f.codiceFilm) where u.username = \"$u\" ";


			//eseguo la Query
			$result = $conn->query($sql);
			//controllo se ho dei risultati
			$msg=" <h3 align=\"center\">Prenotazioni effettuate da $u</h3> <table  class=\"table\">

									<thead class=\"thead-dark\">
										<tr>
											<th scope=\"col\">codiceFilm</th>
											<th scope=\"col\">nome</th>
											<th scope=\"col\">dataInizioProiezione</th>
											<th scope=\"col\">dataFineProiezione</th>
											<th scope=\"col\">durata</th>
										</tr>
									</thead> <tbody>    ";
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()) {
					$msg .= "<tr> <td scope=\"row\">  " . $row['codiceFilm'] . "</td>
											<td>" . $row['nome'] . "</td>
											<td>" . $row['dataInizioProiezione'] . "</td>
											<td>" . $row['dataFineProiezione'] . "</td>
											<td>" . $row['durata'] . "</td>
										</tr>";
				}
			}


			//modifica account
			$username=$_SESSION["usrLogin"];
			$mail=$_SESSION["mailLogin"];
			$dataNascita=$_SESSION["dataLogin"];


			if(!isset($_SESSION["editMode"])){

				$msg.="
				<input type=\"text\" name=\"usr\" value=\"$username\" readonly><a href=\"http://$ip:$porta/esPHP/TheCinema/areaLogin.php?campo=usr\" > <img  width=\"40px\" height=\"40px\" src=\"Immagini/pen.png\" /></a><br><br>
				<input type=\"text\" name=\"mail\" value=\"$mail\" readonly><a href=\"http://$ip:$porta/esPHP/TheCinema/areaLogin.php?campo=mail\" > <img  width=\"40px\" height=\"40px\" src=\"Immagini/pen.png\" /></a><br><br>
				<input type=\"text\" name=\"data\" value=\"$dataNascita\" readonly><a href=\"http://$ip:$porta/esPHP/TheCinema/areaLogin.php?campo=dataNascita\" > <img  width=\"40px\" height=\"40px\" src=\"Immagini/pen.png\" /></a><br><br>
							";
				$_SESSION["editMode"]=1;

			}else{//vogliamo modificare

				if(isset($_GET["campo"])){
					$campoDaModificare=$_GET["campo"];

					if($campoDaModificare=="usr"){//se vuole modificare lo username
						$_SESSION["modificoUsr"]=1;
						$_SESSION["modificoData"]=null;  //metto a null la modifica della data
						$_SESSION["modificaMail"]=null;		//metto a null la modifica dell'email

					}
					if($campoDaModificare=="mail"){//se vuole modificare la mail
						$_SESSION["modificoMail"]=1;
						$_SESSION["modificoData"]=null;    //metto a null la modifica della data
						$_SESSION["modificoUsr"]=null;				//metto a null la modifica dell'usr
					}
					if($campoDaModificare=="dataNascita"){//se vuole modificare la data
						$_SESSION["modificoData"]=1;
						$_SESSION["modificoUsr"]=null;					//metto a null la modifica dell'usr
						$_SESSION["modificoMail"]=null;			//metto a null la modifica dell'email
					}
				}

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
			echo $msg;


?>
<div>
	<form action="areaLogin.php" method="post">
		<input type="submit" name="logout" class="button1"  value="Logout"></input>
		<input type="submit" name="elimina" class="button2" id="2" value="Elimina l'account"></input>
	</form>
</div>
</body>
</html>
