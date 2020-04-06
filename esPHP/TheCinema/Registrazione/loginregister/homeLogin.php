<?php
	session_start();
	$ip=$_SERVER['SERVER_NAME'];  //server per vedere sei sei localhost o hai un ip
	$porta=$_SERVER['SERVER_PORT'];   //porta del serve, perchè c'è chi ha 80, chi 8080 etc...
	if(isset($_POST["username"]) && isset($_POST["password"])){

			$username=$_POST["username"];
			$password=$_POST["password"];
			$_SESSION["usrLogin"]=$username;

			if(!empty($username) && !empty($password)){
					$_SESSION["datiLoginNonPresenti"]=null;
				//echo $password;
				include "connessione.php";
				$ora=date("h:i:sa");
											$sql = "SELECT idUtente ,privilegi, mail, dataNascita from utente  where username=\"$username\" &&  psw=\"$password\" ";
											$records=$conn->query($sql);
											if ( $records == TRUE) {
													//echo "<br>Query eseguita!";
											}else {
												die("Errore nella query: " . $conn->error);
											}

											//gestisco gli eventuali dati estratti dalla query
											if($records->num_rows == 0){
													///dati non corretti
														$_SESSION["logFallito"]="yes";
													header('Location: Login-Registra.php');
											}else{
													$_SESSION["logFallito"]=null;
													while($tupla=$records-> fetch_assoc()){
														//echo $tupla["id"];
														$privilegi=$tupla["privilegi"];
														$mail=$tupla["mail"];
														$data=$tupla["dataNascita"];
													}
													$_SESSION["mailLogin"]=$mail;
													$_SESSION["dataLogin"]=$data;

														if($privilegi=="admin"){
															$_SESSION["privilegiAdmin"] = "yes";
														}else{
																$_SESSION["privilegiAdmin"] = null;

														}

													//login effettuato
													////////////////////////////////setto l'orario ////////////////////////////
														$sql = "update utente set ultimoAccesso=\"$ora\" where username=\"$username\"";//cerco la riga con lo username inserito e
																																																		//ne modifico l'orario
														$records=$conn->query($sql);
														if ( $records == TRUE) {
																//Query eseguita
														}else {
															////////////////login fallito////////////////

															//die("Errore nella query: " . $conn->error);
														//	die("errore");

														}
													//////////////////////////////////////////////////

													////////se il login viene eseguito/////////////////////

													$_SESSION["log"]="yes";

													if($_SESSION["regsterFall"] == "ok"){
														$_SESSION["regsterFall"]=null;
													}
													if(isset($_POST["restaConnesso"])){
														$nomeCookie1="username";
														$nomeCookie2="password";
														setcookie($nomeCookie1,$username,time() + (86400 * 30), "/");
														setcookie($nomeCookie2,$password,time() + (86400 * 30), "/");
														//echo "cliccato";

														$nomeCookie3="salvadati";
														setcookie($nomeCookie3,"yes",time() + (86400 * 30), "/");
														$_SESSION["user"] = $username;
													}else{
														//echo "NIENTE";
														$nomeCookie3="salvadati";
														setcookie($nomeCookie3,null,time() - 3600 , "/");
														$nomeCookie1="username";
														$nomeCookie2="password";
														setcookie($nomeCookie1,null,time()  - 3600, "/");
														setcookie($nomeCookie2,null,time()  - 3600, "/");
														$_SESSION["user"] = $username;

													}
													$_SESSION["regsterFall"]=null;
													$_SESSION["etaInsuf"]=null;

												header("Location: http://" .$ip .":" .$porta ."/esPHP/TheCinema/Home.php");

										}


			}else{
					$_SESSION["logFallito"]=null;
					$_SESSION["datiLoginNonPresenti"]="yes";
						header('Location: Login-Registra.php');
			}
		}



?>
