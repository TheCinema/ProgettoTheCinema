<html>
	<head>
		<title>The Cinema </title>
			<link rel="icon" href="Immagini\logoHome.gif" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<style>




			.button2 {
				border: none;
			  color: black;
			  padding: 15px 32px;
			  text-align: center;
			  text-decoration: none;
			  display: inline-block;
			  font-size: 18px;
				background-color: #2291c3; /* red */
				position: absolute;
				top: 90%;
				left: 15%;
				transform: translate(-50%, -50%);
			}

			.button1 {
				border: none;
				color: black;
				padding: 15px 32px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 18px;
				background-color: #2291c3; /* red */
				position: absolute;
				top: 90%;
				left: 50%;
				transform: translate(-50%, -50%);
			}

			body {
				margin: 10;
				background-color: #FAD961;
				background-image: linear-gradient(90deg, #FAD961 0%, #F76B1C 100%);
				font-family: 'Work Sans', sans-serif;
				font-weight: 900;
			}

		</style>
	</head>

		<form action="areaLoginAdmin.php" method="post">
				<input type="submit" name="svuotaDatabase" class="button2"  value="Svuota Database"></input>
				<input type="submit" name="logout" class="button1"  value="Logout"></input>
		</form>

	<body>

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
					//includo file per la connesione al database
					include "connessione.php";
					//quando viene cliccato il pulsante
					if($_SERVER["REQUEST_METHOD"]=="POST") {
						if(isset($_POST["svuotaDatabase"])) {
							//creo la query
							$priv="user";
							$sql="delete from utente where privilegi=\"user\" ";

							if ($conn->query($sql) === TRUE) {

							}else {
									echo "non fa";
							}

							$conn->close();
							header('refresh:0');
						}

						if(isset($_POST["logout"])){
							//ripristino tutte le variabili di sessione
							$_SESSION["usrLogin"]=null;
							$_SESSION["mailLogin"]=null;
							$_SESSION["dataLogin"]=null;
							header("location: http://" .$ip .":" .$porta ."/esPHP/TheCinema/Registrazione/loginregister/logout.php");
							die("");
						}

					}else{
							//prendo tutti i dati dal Database su tutti gli utenti Registrati
							$sql = "SELECT idUtente,username,mail,psw,dataNascita,punti,privilegi,ultimoAccesso from utente";
							$records=$conn->query($sql);

							if ( $records == TRUE) {
									//echo "<br>Query eseguita!";
							}else {
									die("Errore nella query: " . $conn->error);
							}

							//gestisco gli eventuali dati estratti dalla query
							if($records->num_rows ==0){
									header('Location: Login-Registra.php');
									//die("");
							}else {
									$msgTable=" <table class=\"table\">
															<thead class=\"thead-dark\">
																<tr>
																	<th scope=\"col\">IdUtente</th>
																	<th scope=\"col\">Username</th>
																	<th scope=\"col\">Email</th>
																	<th scope=\"col\">Password</th>
																	<th scope=\"col\">DataNascita</th>
																	<th scope=\"col\">Punti</th>
																	<th scope=\"col\">Orario</th>
																	<th scope=\"col\">Privilegi</th>
																</tr>
															</thead> <tbody> ";
								while($tupla=$records-> fetch_assoc()){
											//dati presi dal Database
											$idUtente=$tupla["idUtente"];
											$username=$tupla["username"];
											$email=$tupla["mail"];
											$pass=$tupla["psw"];
											$dataNascita=$tupla["dataNascita"];
											$punti=$tupla["punti"];
											$privilegi=$tupla["privilegi"];
											$orario=$tupla["ultimoAccesso"];
											//inserimento nella tabella
											if($privilegi=="admin"){
													$msgTable.="<tr>
																				<th scope=\"row\" class=\"bg-danger\" >$idUtente</th>
																				<td class=\"bg-danger\" >$username</td>
																				<td class=\"bg-danger\" >$email</td>
																				<td class=\"bg-danger\" >$pass</td>
																				<td class=\"bg-danger\" >$dataNascita</td>
																				<td class=\"bg-danger\" >$punti</td>
																				<td class=\"bg-danger\" >$orario</td>
																				<td class=\"bg-danger\" >$privilegi</td>
																			</tr>";
											}else{
													$msgTable.="<tr>
																	      <th scope=\"row\" class=\"bg-info\">$idUtente</th>
																			  <td class=\"bg-info\" >$username</td>
																				<td class=\"bg-info\" >$email</td>
																				<td class=\"bg-info\" >$pass</td>
																				<td class=\"bg-info\" >$dataNascita</td>
																				<td class=\"bg-info\" >$punti</td>
																				<td class=\"bg-info\" >$orario</td>
																				<td class=\"bg-info\" >$privilegi</td>
																			 </tr>";
											}
													//$privilegi=$tupla["privilegi"];
							}
											$msgTable.="</tbody>
																	</table>";
											echo $msgTable;
				 }
			}
		?>
	</body>
</html>
