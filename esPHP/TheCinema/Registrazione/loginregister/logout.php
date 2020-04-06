<?php
	session_start();
	$ip=$_SERVER['SERVER_NAME'];  //server per vedere sei sei localhost o hai un ip
	$porta=$_SERVER['SERVER_PORT'];   //porta del serve, perchè c'è chi ha 80, chi 8080 etc...

	//ripristino tutte le variabili di sessione
	 $_SESSION["log"]=null;
	 	$_SESSION["regsterFall"] = null;
			$_SESSION["etaInsuf"]=null;
			$_SESSION["passDiverse"]=null;
			$_SESSION["emailDiverse"]=null;
			$_SESSION["user"] = null;
	header("Location: http://" .$ip .":" .$porta ."/esPHP/TheCinema/Home.php");


?>
