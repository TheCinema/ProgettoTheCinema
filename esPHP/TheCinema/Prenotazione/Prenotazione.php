<?php
	header('Cache-Control: no cache'); //no cache
  session_cache_limiter('private_no_expire'); // works
	session_start();
	$ip=$_SERVER['SERVER_NAME'];  //server per vedere sei sei localhost o hai un ip
	$porta=$_SERVER['SERVER_PORT'];   //porta del serve, perchè c'è chi ha 80, chi 8080 etc...
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<script src="https://kit.fontawesome.com/81c2c05f29.js"	crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<meta charset="utf-8">
	<title>Prenota Biglietto</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
	<script type="text/javascript">
		$(".menu-toggle-btn").click(function(){
			$(this).toggleClass("fa-times");
			$(".navigation-menu").toggleClass("active");
		});
	</script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style>
	@import url("https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css");
	@import url('https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap');
	@font-face {
		font-family: "font2";
		src: url(../font2.ttf);
	}
	body {
		background-color: #FAD961;
		background-image: linear-gradient(90deg, #FAD961 0%, #F76B1C 100%);
		height: 100%;
		font-weight: 500;
		font-family: "font2";
	}
	.c{
		position: absolute;
		top: 30%;
	}
	.container {
	  width: 100%;
		min-height: 300px;
		height: 100%;
		text-align: center;
  }
	form{
		width: 100%;
		height: 100%;
		display: inline-block;
	}

	p{
		border-style: inset;
		text-align:center;
		position: absolute;
		top: 20%;
		left: 30%;
		transform: translate(-50%, -50%);
		font-size: 34px;
		padding: 30px;
	}
	.progressbar{
		width: auto;
		margin-top: 3%;

	  counter-reset: step;
	}
	.progressbar li {

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
	  content: none;
	}
	.progressbar li.active {
	  color: black;

	}
	.progressbar li.active:before {
	  border-color: black;
	}
	.progressbar li.active + li:after {
	  background-color: black;
	}
	img {
	  border-radius: 0px;
	  position: relative;
				top: 70%;
	}
	table{
		width: 100%;
		text-align: center;
		height: 100%;
	}
	tr{
		text-align: center;
	}
	th{
		width: 50%;
		text-align: center;
	}
	tr .body{
		height: 300px;
		max-height: 300px;
		width: 100%;
	}

	a .ora{
		border: 4px solid green;
		border-radius: 20px;
		width: 20px;
	}
	header{
		height: 90px;
		background: #2f3640;
	}

	.inner-width{
		background: black;
		max-width: 100%;
		padding: 0 10px;
		margin: auto;
	}

	.logo{
		float: left;
		min-left :10px;
		padding: 0 0;
	}

	.logo img{
		height: 30px;
	}

	.navigation-menu{
		float: right;
		display: flex;
		align-items: center;
		min-height: 90px;
	}
	.navigation-menu a{
		margin-left: 10px;
		color: #ddd;
		text-transform: uppercase;
		font-size: 14px;
		padding: 12px 20px;
		border-radius: 6px;
		transition: .3s linear;
	}
	.navigation-menu a:hover{
		background: #fff;
		color: #2f3640;
		transform: scale(1.1);
	}
	.navigation-menu i{
		margin-right: 8px;
		font-size: 16px;
		}

	.home{
		color: #ff6b6b;
	}

	.about{
		color: #0abde3;
	}

	.works{
		color: #feca57;
	}

	.team{
		color: #5f27cd;
	}

	.contact{
	color: #1dd1a1;
	}

	.menu-toggle-btn{
		float: right;
		height: 90px;
		line-height: 90px !important;
		color: #fff;
		font-size: 26px;
		display: none !important;
		cursor: pointer;
		}


	@media screen and (max-width:700px) {
		.menu-toggle-btn{
			display: block !important;
		}

		.navigation-menu{
				position: fixed;
				width: 100%;
				background: #172b4d;
				top: 90px;
				right: 0;
				display: none;
				padding: 20px 40px;
				box-sizing: border-box;
			}
		.navigation-menu::before{
			content: "";
			border-left: 10px solid transparent;
			border-right: 10px solid transparent;
			border-bottom: 10px solid #172b4d;
			position: absolute;
			top: -10px;
			right: 10px;
		}
		.navigation-menu a{
			display: block;
			margin: 10px 0;
		}
		.navigation-menu.active{
			display: block;
		}
	}

	.data{
		width: 100%;
		margin-top: 50px;

	}
	</style>
</head>

<body>
	<?php
		//Per sistemare il problema del ERR_CACHE_MISS

	?>

	<header>
		<div class="inner-width">

			<i class="menu-toggle-btn fas fa-bars"></i>
			<nav class="navigation-menu">
				<a href="../Home.php"><i class="fas fa-home home"></i> HOME</a>
				<a href="Prenotazione.php"><i class="fas fa-align-left about"></i>PRENOTA BIGLIETTO</a>
				<a href="../AreaPersonale/areaLogin.php"><i class="fab fa-buffer works"></i> AREA PERSONALE</a>

			</nav>
		</div>
	</header>

 <div class="container">
      <ul class="progressbar">
          <li class="active">FILM</li>
          <li>POSTI</li>
          <li>RIEPILOGO</li>
          <li>PAGAMENTO</li>
  </ul>

<?php
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

		if(isset(	$_SESSION["dataDaMantenere"])){
			$dataSelezionata =$_SESSION["dataDaMantenere"];
			$dataAttuale = date("Y-m-d");
			$msg=" <br><form action=\"Prenotazione.php\" method=\"POST\" >
							<div class=\"data\">
								<b style=\"font-size: 30px\">Seleziona il giorno</b><br />
								<input type=\"date\" name=\"data\" value=\"$dataAttuale\" min=\"$dataAttuale\" style=\"border-radius: 25px; border: 2px solid #2f3640;\"></input>
								<input type=\"submit\" value=\"CERCA\" style=\"border-radius: 25px; border: 2px solid #2f3640;\"></input><br><br />
							</div>";

		}else{
			$dataAttuale = date("Y-m-d");
			$msg=" <br><form action=\"Prenotazione.php\" method=\"POST\" >
							<div class=\"data\">
						  	<b style=\"font-size: 30px\">Seleziona il giorno</b><br />
								<input type=\"date\" name=\"data\" value=\"$dataAttuale\" min=\"$dataAttuale\" style=\"border-radius: 25px; border: 2px solid #2f3640;\"></input>
								<input type=\"submit\" value=\"CERCA\" style=\"border-radius: 25px; border: 2px solid #2f3640;\"></input><br><br />
							</div>";
		}

		echo $msg;




			///////////////trovo i film disponibili per la data selezionata//////////////////////
		$film=Array();
		$sql = "SELECT film.foto,film.codiceFilm from film join proiezione on film.codiceFilm=proiezione.codiceFilm where proiezione.DataProiezione=\"$data\"";
		$msg=null;
     $records=$conn->query($sql);
     if ( $records == TRUE) {
         //echo "<br>Query eseguita!";
     }else{
       die("Errore nella query: " . $conn->error);
     }
     if($records->num_rows ==0){
           //	echo "la query non ha prodotto risultato";
					 $msg.="<b style=\"text-align: center\">
						NESSUN FILM PRESENTE 
						</b>";
     }else{
			 $msg.="<b style=\"text-align: center\">
				 FILM PRESENTI
				</b>";
       while($tupla=$records->fetch_assoc()){
         $id=$tupla["codiceFilm"];
           $foto=$tupla["foto"];
           $film+=Array($id=>$foto);
       }
    }

    $msg.="<br><table>";
		$msg.="<tr style=\"text-align: center\">
						<th style=\"color: black;   text-shadow: 2px 2px orange; font-size: 30px; width: 50%;\"><b style=\"text-align: center\"> FILM</b> </th>
						<th style=\"color: black;  text-shadow: 2px 2px orange; font-size: 30px; font-size: 30px; width: 50%; text-align: center\"><b style=\"text-align: center\">
						ORARIO
						</b></th>
					 </tr>";
    foreach($film as $id=>$foto){
      	$msg.= "
					<tr class=\"body\">
						<td><img style=\"max-width: 500px;
						max-height: 300px;
						height: 300px;
						width: 500px;\" src=\"..\Immagini\\extra\\$foto\"></img></td>";
				///////////////////////////////trovo gli orari disponibili per ciascun film(id)///////////////////////////////////
				$sql = "SELECT proiezione.orarioProiezione,proiezione.idProiezione from proiezione join film on proiezione.codiceFilm=film.codiceFilm where proiezione.codiceFilm=\"$id\" order by proiezione.orarioProiezione ASC";
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
					 $msg.="<td>";
           while($tupla=$records->fetch_assoc()){
						 $idProiezione=$tupla["idProiezione"];
             $ora=$tupla["orarioProiezione"];
						 $msg.= "
													<a class=\"ora\" style=\"font-size: 30px; color: black; \" href=\"Prenotazione2.php?idProiezione=$idProiezione\">$ora</a><br /><br />";
           }
					 $msg.="

					 </td>";
        }
				$msg.="</tr>";
		  }

		$msg.="</table>";
    echo $msg;

?>

</body>
</html>
