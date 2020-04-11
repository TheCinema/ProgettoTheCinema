<html>
  <body>



      <?php
        session_start();
        $ip = $_SERVER['SERVER_NAME'];  //server per vedere sei sei localhost o hai un ip
        $porta = $_SERVER['SERVER_PORT'];   //porta del serve, perchè c'è chi ha 80, chi 8080 etc...

          if(isset($_SESSION["usrLogin"])){
              $username=$_SESSION["usrLogin"];
              echo "procediamo";
              include "connessione.php";
              $film=Array();
                $sql="DELETE FROM utente where utente.username=\"$username\"";
                      $records=$conn->query($sql);
                      if ( $records == TRUE) {
                          //echo "<br>Query eseguita!";
                          $_SESSION["usrLogin"]=null;
                          $_SESSION["mailLogin"]=null;
                          $_SESSION["dataLogin"]=null;
                          header("location: http://" .$ip .":" .$porta ."/esPHP/TheCinema/Registrazione/loginregister/logout.php");
                          die("");
                      } else {
                        die("Errore nella query: " . $conn->error);
                      }
          }else{
            header("location: http://" .$ip .":" .$porta ."/esPHP/TheCinema/Home.php");
          }


        ?>

  </body>
</html>
