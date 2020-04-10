<html>
	<head>
			<title>The Cinema </title>
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	</head>
	<?php
		session_start();
		$mail = $_POST["email"];
    $cmail = $_POST["confEmail"];
    $dataNascita = $_POST["dataNascita"];
    $usr = $_POST["username"];
    $psw = $_POST["password"];
		$cpsw = $_POST["confermaPassword"];
		$orario = date("h:i:sa");

		if(isset($mail) && isset($cmail) && isset($usr) && isset($psw) &&isset($cpsw) && isset($dataNascita)) {
			if(empty($mail) || empty($cmail) || empty($usr) || empty($psw) || empty($cpsw) || empty($_POST["dataNascita"]) ) {
				$_SESSION["regsterFall"] = "not ok";
				header('Location: Login-Registra.php');

			}else{

				$data=date("Y-n-d");//data odierna
				$maggiorenne=date("Y")-16;
				//$eta=date_diff($data, $dataNascita);

				if(strpos($mail, "@") == false){
          $_SESSION["emailErrata"]=1;
         header('Location: Login-Registra.php');

        }else{

					$trovato=0;
					$dominio=array();
					$dominio=["gmail.com", "icloud.com", "yahoo.com", "outlook.it", "outlook.com"];
					for($i=0; $i<count($dominio); $i++){
						if(strpos($mail, dominio[$i])== true){
							$trovato=1;
							break;
						}
					}

					if($trovato==0){
						//email mailSbagliata
						$_SESSION["emailErrata"]=1;
						header('Location: Login-Registra.php');

					}else{
						//email corretta
						$_SESSION["emailErrata"]=null;

						if($mail!=$cmail){
							$_SESSION["emailDiverse"]=1;
							header('Location: Login-Registra.php');

						}else{

							$_SESSION["emailDiverse"]=null;
							if($psw!=$cpsw){
								$_SESSION["passDiverse"]=1;
								header('Location: Login-Registra.php');

							}else{

								$_SESSION["passDiverse"]=null;
								$timestamp = strtotime($dataNascita);

								if(date("Y", $timestamp)>$maggiorenne){
									$_SESSION["etaInsuf"]=1;
									header('Location: Login-Registra.php');
									die("");
								}else{
									if(date("n", $timestamp)<date("n")){
										$_SESSION["etaInsuf"]=1;
										header('Location: Login-Registra.php');
										die("");
									}else{
										if(date("d", $timestamp)<date("d")){

											header('Location: Login-Registra.php');
											die("");
										}
									}
								}

								$_SESSION["etaInsuf"]=null;
								include "connessione.php";

								$sql = "insert into utente(username, mail, psw, punti, dataNascita,ultimoAccesso) values('$usr', '$mail', '$psw', '0', '$dataNascita','$orario')";

								if($conn->query($sql) == TRUE) {
											$_SESSION["regsterFall"] = "ok";
											header('Location: Login-Registra.php');
								}else {
									//inserimento fallito
										$_SESSION["regsterFall"] = "not ok";
										header('Location: Login-Registra.php');
										die("");
									//echo "Error: " . $sql . "<br>" . $conn->error;
								}

							}
					 }
				 }
			 }
			}
			$conn->close();

		}
	?>

</body>
</html>
