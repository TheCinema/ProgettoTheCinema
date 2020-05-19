<!DOCTYPE html>
<html>
<head>
	<title>The Cinema </title>
		<link rel="icon" href="..\Immagini\logoHome.gif" />
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>user login</title>
	<style>
				body {
					margin: 0;
					background-color: #FAD961;
					background-image: linear-gradient(90deg, #FAD961 0%, #F76B1C 100%);
					/*
					background: #8e9eab;
				  background: -webkit-linear-gradient(to bottom, #8e9eab, #eef2f3);
				  background: linear-gradient(to bottom, #8e9eab, #eef2f3); */
					font-family: 'Work Sans', sans-serif;
					font-weight: 800px;
				}
				.input{
				background: #00ffff;
				}

				input[type="date"] {
					appearance: none;
					-webkit-appearance: none;
					color: #00ffff;
					font-family: 'Work Sans', sans-serif;
					font-size: 18px;
					border:1px solid #00ffff;
					background:black;
					padding:5px;
					display: inline-block !important;
					visibility: visible !important;
					position: absolute;
		top: 79%;
		left: 65%;
		transform: translate(-50%, -50%);
}

			input[type="date"], focus {
			color: #00ffff;
			box-shadow: none;
			-webkit-box-shadow: none;
			-moz-box-shadow: none;
}

				.card button {
					display: block;
					background: #00ffff;
					padding: 10px 52px;
					border-radius: 18px;
					color: #003B15;
					font-weight: 600px;
					font-size: 18px;
					cursor: pointer;
					position: absolute;
					top: 90%;
					left: 50%;
					transform: translate(-50%, -50%);
				}
				.card button2 {
					display: block;
					background: red;
					padding: 10px 52px;
					border-radius: 18px;
					color: #003B15;
					font-weight: 600px;
					font-size: 18px;
					cursor: pointer;

				}

					.head a {
						height: 100%;
						padding: 0 28px;
						display: flex;
						align-items: center;
						justify-content: center;
						color: rgb(140,140,140);
						font-size: 20px;
						font-weight: 500;
					}

					.head .selected {
						position: relative;
						color: #00ffff;
						font-weight: 700;
					}

					.head .selected:after {
						position: absolute;
						content: "";
						bottom: 0;
						left: 0;
						height: 5px;
						width: 100%;
						background: #00ffff;
						border-radius: 99px 99px 0 0;
					}

				.card {

					height: 110%;
					max-height: 650px;
					width: 450px;
					background: #121212;
					border: 2px solid #00ffff;
					border-radius: 15px;
					overflow: hidden;
					transition: max-height 0.2s;
				}

				.logo{
				position: absolute;
		top: 5%;
		left: 25%;
		transform: translate(-50%, -50%);
				}

			.colore{
				color:#00ffff;
				}

				.centro{
					position: absolute;
			top: 95%;
			left: 50%;
			transform: translate(-50%, -50%);
				}

	</style>
</head>
<body>
	<?php
		session_start();
		$ip=$_SERVER['SERVER_NAME'];  //server per vedere sei sei localhost o hai un ip
		$porta=$_SERVER['SERVER_PORT'];   //porta del serve, perchè c'è chi ha 80, chi 8080 etc...
		if(!isset($_COOKIE["salvadati"])){
			$logReg="<div class=\"align\">
			<div class=\"card\">
				<div class=\"head\">
					<div></div>
					<a id=\"login\" class=\"selected\" href=\"#login\">Login</a>
					<a id=\"register\" href=\"#register\">Registrati</a>
					<div></div>
				</div>
				<div  class=\"tabs\">
					<form action=\"homeLogin.php\" method=\"POST\">
					<input name=\"restaLogin\" value=\"restaLogin\" type=\"hidden\">
						<div  class=\"inputs\">
							<div align=\"center\" class=\"input\">
								<input name=\"username\" placeholder=\"Username\" type=\"text\">
								<img src=\"img/user.svg\">
							</div>
							<div class=\"input\">
								<input name=\"password\" placeholder=\"Password\" type=\"password\">
								<img src=\"img/pass.svg\">
							</div>
							<label class=\"checkbox\">
								<input type=\"checkbox\" name=\"restaConnesso\">
								<span>Resta connesso</span>

							</label>
								<br> <a href=\"http://$ip:$porta/esPHP/TheCinema/Home.php\" > <img  width=\"40px\" height=\"40px\" src=\"img/home.png\"</a>
								<br> <br><a href=\"recuperaPassword.php\" >  <font color=\"#2291c3\">Password Dimenticata? Ripristinala</font></a> ";
								if(isset($_SESSION["datiLoginNonPresenti"])){
										$logReg .= " <br><a  > <font color=\"red\">Uno o più dati non sono stati inseriti</font></a>";
										$_SESSION["datiLoginNonPresenti"]=null;
								}
								if(isset($_SESSION["logFallito"])){
										$logReg .= " <br><a  > <font color=\"red\">Login fallito!dati non corretti</font></a>";
										$_SESSION["logFallito"]=null;
								}
								if(isset($_SESSION["regsterFall"])){
									if($_SESSION["regsterFall"] == "not ok"){
										$logReg .= " <br><a  > <font color=\"red\">Dati mancanti o già presenti</font></a>";
										$_SESSION["regsterFall"]=null;
									}if($_SESSION["regsterFall"] == "ok"){
										$logReg .= " <br><a  > <font color=\"green\">Registrazione avvenuta correttamente</font></a>";
										$_SESSION["regsterFall"]=null;
									}
								}
								if(isset($_SESSION["regsterFall"])){
											$logReg .= " <br><a  > <font color=\"red\">Età non sufficiente</font></a>";
											$_SESSION["regsterFall"]=null;

								}
								if(isset($_SESSION["etaInsuf"])){
											$logReg .= " <br><a  > <font color=\"red\">Età non sufficiente</font></a>";
											$_SESSION["regsterFall"]=null;
											$_SESSION["etaInsuf"]=null;

								}
								if(isset($_SESSION["emailDiverse"])){
											$logReg .= " <br><a  > <font color=\"red\">Le email non corrispondono</font></a>";
											$_SESSION["emailDiverse"]=null;

								}
								if(isset($_SESSION["emailErrata"])){
											$logReg .= " <br><a  > <font color=\"red\">Email non valida</font></a>";
											$_SESSION["emailErrata"]=null;

								}
								if(isset($_SESSION["passDiverse"])){
											$logReg .= " <br><a  > <font color=\"red\">Le password non corrispondono</font></a>";
											$_SESSION["passDiverse"]=null;

								}
								if(isset($_SESSION["pswChanged"])){
										$logReg.=" <br><a  > <font color=\"green\">Password modificata</font></a>";
										$_SESSION["pswChanged"]=null;
								}
								$logReg.="	</div>
						<button>Login</button>
					</form> ";

		}else{
			$us=$_COOKIE["username"];
			$pas=$_COOKIE["password"];
			$logReg="<div class=\"align\">
			<div class=\"card\">
				<div class=\"head\">
					<div></div>
					<a id=\"login\" class=\"selected\" href=\"#login\">Login</a>
					<a id=\"register\" href=\"#register\">Registrati</a>
					<div></div>
				</div>
				<div  class=\"tabs\">
					<form action=\"homeLogin.php\" method=\"POST\">
						<input name=\"restaLogin\" value=\"restaLogin\" type=\"hidden\">
						<div  class=\"inputs\">
							<div align=\"center\" class=\"input\">
								<input name=\"username\" placeholder=\"Username\" value=\"$us\" type=\"text\">
								<img src=\"img/user.svg\">
							</div>
							<div class=\"input\">
								<input name=\"password\" placeholder=\"Password\"  value=\"$pas\" type=\"password\">
								<img src=\"img/pass.svg\">
							</div>
							<label class=\"checkbox\">
								<input type=\"checkbox\" name=\"restaConnesso\" >
								<span>Resta connesso</span>
							</label>
							<br> <a href=\"http://$ip:$porta/esPHP/TheCinema/Home.php\" > <img  width=\"40px\" height=\"40px\" src=\"img/home.png\"</a>
								<br><br> <a href=\"recuperaPassword.php\" >  <font color=\"white\">Password Dimenticata? Ripristinala</font></a> ";
								if(isset($_SESSION["datiLoginNonPresenti"])){
										$logReg .= " <br><a  > <font color=\"red\">Uno o più dati non sono stati inseriti</font></a>";
										$_SESSION["datiLoginNonPresenti"]=null;
								}
								if(isset($_SESSION["logFallito"])){
										$logReg .= " <br><a  > <font color=\"red\">Login fallito!dati non corretti</font></a>";
										$_SESSION["logFallito"]=null;
								}
								if(isset($_SESSION["regsterFall"])){
									if($_SESSION["regsterFall"] == "not ok"){
										$logReg .= " <br><a  > <font color=\"red\">Dati mancanti o già usati</font></a>";
										$_SESSION["regsterFall"]=null;
									}if($_SESSION["regsterFall"] == "ok"){
										$logReg .= " <br><a  > <font color=\"green\">Registrazione avvenuta correttamente</font></a>";
										$_SESSION["regsterFall"]=null;
									}
								}
								if(isset($_SESSION["etaInsuf"])){
											$logReg .= " <br><a  > <font color=\"red\">Età non sufficiente</font></a>";
											$_SESSION["regsterFall"]=null;
											$_SESSION["etaInsuf"]=null;

								}
								if(isset($_SESSION["emailDiverse"])){
											$logReg .= " <br><a  > <font color=\"red\">Le email non corrispondono</font></a>";
											$_SESSION["emailDiverse"]=null;
								}

								if(isset($_SESSION["emailErrata"])){
											$logReg .= " <br><a  > <font color=\"red\">Email non valida</font></a>";
											$_SESSION["emailErrata"]=null;

								}

								if(isset($_SESSION["passDiverse"])){

											$logReg .= " <br><a  > <font color=\"red\">Le password non corrispondono</font></a>";
											$_SESSION["passDiverse"]=null;

								}
								if(isset($_SESSION["pswChanged"])){
										$logReg.=" <br><a  > <font color=\"green\">Password modificata</font></a>";
										$_SESSION["pswChanged"]=null;
								}

								$logReg .= "	</div>
													<button>Login</button>
												</form> ";

		}

				//registrazione
		$logReg.="
					<form action=\"RegistrazioneInserimentoDB.php\" method=\"POST\">
						<div class=\"inputs\">
							<div class=\"input\">
								<input name=\"email\" placeholder=\"Email\" type=\"text\">
								<img src=\"img/mail.svg\">
							</div>
							<div class=\"input\">
								<input name=\"confEmail\" placeholder=\"Conferma Email\" type=\"text\">
								<img src=\"img/mail.svg\">
							</div>
							<div class=\"input\">
								<input name=\"username\" placeholder=\"Username\" type=\"text\">
								<img src=\"img/user.svg\">
							</div>

							<div class=\"input\">
								<input name=\"password\" placeholder=\"Password\" type=\"password\">
								<img src=\"img/pass.svg\">
							</div>
							<div class=\"input\">
								<input name=\"confermaPassword\" placeholder=\"Conferma Password\" type=\"password\">
								<img src=\"img/pass.svg\">
							</div>

						  ";

							$data = date("Y-m-d");
							$logReg.="
							<div class=\"colore\">
							Inserisci Data Nascita :
						</div><div class\"input\"> <input type=\"date\"
							name=\"dataNascita\" value=\"$data\" min=\"1950-01-01\" max=\"$data\" ";
							/*
							if(isset($_SESSION["emailDiverse"])){
										$logReg .= " <br><a  > <font color=\"red\">Le email non corrispondono</font></a>";
										$_SESSION["emailDiverse"]=null;
							}
							if(isset($_SESSION["emailDiverse"])){
										$logReg .= " <br><a  > <font color=\"red\">Le email non corrispondono</font></a>";
										$_SESSION["emailDiverse"]=null;
							}

							if(isset($_SESSION["emailErrata"])){
										$logReg .= " <br><a  > <font color=\"red\">Email non valida</font></a>";
										$_SESSION["emailErrata"]=null;
										echo "ciao";
							}

							if(isset($_SESSION["passDiverse"])){
				   					$logReg .= " <br><a  > <font color=\"red\">Le password non corrispondono</font></a>";
										$_SESSION["passDiverse"]=null;
							}*/
						  $logReg.="
						</div>



					  <button>Registrati</button>


					</form>
				</div>
			</div>
		</div>
		<script src=\"js/jquery-3.3.1.min.js\"></script>
		<script src=\"js/index.js\"></script> ";

		echo $logReg;


	?>

</body>
</html>
