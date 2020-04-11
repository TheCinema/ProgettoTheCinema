<!DOCTYPE html>
<html>
	<head>
		<title>The Cinema </title>
			<link rel="icon" href="..\Immagini\logoHome.gif" />
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<title>user login</title>
	  <script src="https://kit.fontawesome.com/6871a685d8.js" crossorigin="anonymous"></script>

		<style>
					body {
						margin: 0;
						background: rgb(253,187,45);
						background: linear-gradient(0deg, rgba(253,187,45,1) 0%, rgba(34,193,195,1) 100%);
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
			top: 42%;
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

		</style>
	</head>
<body>
	<?php
		session_start();
		$ip=$_SERVER['SERVER_NAME'];  //server per vedere sei sei localhost o hai un ip
		$porta=$_SERVER['SERVER_PORT'];   //porta del serve, perchè c'è chi ha 80, chi 8080 etc...
			if(isset($_SESSION["newPsw"])){
				//deve recuperare la password
				$logReg="<div class=\"align\">
				<div class=\"card\">
					<div class=\"head\">
						<div></div>
						<a id=\"login\" class=\"selected\" href=\"#login\">Recupera Password</a>
						<div></div>
					</div>
					<div  class=\"tabs\">

						<form action=\"effettuaModificaPassword2.php\" method=\"POST\">";
						$em=$_SESSION["email"];
						$usr=$_SESSION["username"];
						$dataNascita=$_SESSION["dataNascita"];
						//mandi i dati in un nuovo file,se sono uguali inserisci i dati nel db , alttimenti setti una session per errore
								if(isset($_SESSION["newPsw"])){//nuovo campo per il  reset della password
									$logReg.="<div  class=\"inputs\">
										<div align=\"center\" class=\"input\">
											<input name=\"newPsw\" placeholder=\"Nuova password\" type=\"password\"/>

											<img src=\"img/user.svg\">
										</div>
										<div  class=\"inputs\">
											<div align=\"center\" class=\"input\">
												<input name=\"confNewPsw\" placeholder=\"Conferma nuova password\" type=\"password\"/>
												<img src=\"img/user.svg\">
											</div>";

									$_SESSION["newPsw"]=null;
								}

								$logReg.="
								</div>
								<br> <a href=\"http://$ip:$porta/esPHP/TheCinema/Home.php\" > <img  width=\"40px\" height=\"40px\" src=\"img/home.png\"</a>
								</div>
								</form>";

								}else{
									//quando devo inserire i dati per modificare i dati
									$logReg="<div class=\"align\">
									<img class=\"logo\" src=\"img/logo.gif\">
									<div class=\"card\">
										<div class=\"head\">
											<div></div>
											<a id=\"login\" class=\"selected\" href=\"#login\">Recupera Password</a>
											<div></div>
										</div>
										<div  class=\"tabs\">

										<form action=\"effettuaModificaPassword.php\" method=\"POST\">";

									$logReg.="<input name=\"restaLogin\" value=\"restaLogin\" type=\"hidden\">
										<div  class=\"inputs\">
											<div align=\"center\" class=\"input\">

												<input name=\"email\" placeholder=\"Email\" type=\"text\">
												<img src=\"img/user.svg\">
											</div>
											<div class=\"input\">
												<input name=\"usr\" placeholder=\"Username\" type=\"text\">
												<img src=\"img/pass.svg\">
											</div> ";

			                $data = date("Y-m-d");
			                $logReg.="
			                <div class=\"colore\">
			                	<br>Inserisci Data Nascita :
			                </div><div class\"input\"> <input type=\"date\"
			                name=\"dataNascita\" value=\"$data\" min=\"1950-01-01\" max=\"$data\" ";
			                $logReg.="
			                </div>

											<br> <a href=\"http://$ip:$porta/esPHP/TheCinema/Home.php\" > <img  width=\"40px\" height=\"40px\" src=\"img/home.png\"</a>

											</div>";

								}
								if(isset($_SESSION["pswSbagliate"])){
									$logReg .= " <br><a  > <font color=\"red\">Le password non concidono</font></a>";
									$_SESSION["pswSbagliate"]=null;
								}

								if(isset($_SESSION["datiNonInseriti"])){//nuovo campo per il  reset della password
										$logReg .= " <br><a  > <font color=\"red\">Uno o più campi non compilati</font></a>";
										$_SESSION["datiNonInseriti"]=null;
								}

								if(isset($_SESSION["datiNonEsistenti"])){//nuovo campo per il  reset della password
									$logReg .= " <br><a  > <font color=\"red\">I dati inseriti non sono esistono</font></a>";
									$_SESSION["datiNonEsistenti"]=null;
								}

								$logReg.="
								<button>Recupera</button>
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
