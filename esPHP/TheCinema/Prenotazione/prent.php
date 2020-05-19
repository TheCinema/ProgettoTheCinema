<?php
  session_start();
  ?>

<!DOCTYPE html>
<html >

<head>


    <link rel="stylesheet" href="style/styles.css">
    <title>The Cinema</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<style>




@import url('https://fonts.googleapis.com/css?family=Work+Sans:400,600');
                          body {
                            margin:auto;
                            background: rgb(253,187,45);
                            background: linear-gradient(0deg, rgba(253,187,45,1) 0%, rgba(34,193,195,1) 100%);
                            font-family: 'Roboto', sans-serif;
                            font-weight: 800;
                            position: relative;

                          }


                          form{
                          position: absolute;
                          top: 55%;
                          left: 70%;
                          transform: translate(-50%, -50%);
                          }



                          .button2 {
                            border: none;
                          color: white;
                          padding: 15px 32px;
                          text-align: center;
                          text-decoration: none;
                          display: inline-block;
                          font-size: 16px;
                            background-color: #008CBA; /* Blue */
                          position: absolute;
                            top: 105%;
                            left: 50%;
                            transform: translate(-50%, -50%);
                          }
                            .container {
                              font-family: 'Roboto', sans-serif;
                              width: 1300px;
                              margin: 30px ;
                          }
                          .progressbar {font-family: 'Roboto', sans-serif;
                            counter-reset: step;

                          }
                          .progressbar li {
                            font-family: 'Roboto', sans-serif;
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
                            font-family: 'Roboto', sans-serif;
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
                            font-family: 'Roboto', sans-serif;
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
                            font-family: 'Roboto', sans-serif;
                            content: none;
                          }
                          .progressbar li.active {
                            font-family: 'Roboto', sans-serif;
                            color: black;

                          }
                          .progressbar li.active:before {
                            font-family: 'Roboto', sans-serif;
                            border-color: black;
                          }
                          .progressbar li.active + li:after {
                            font-family: 'Roboto', sans-serif;
                            background-color: black;
                          }

                          .footer{
            background: red;
            color: black;
            height:30px;
            width: 1900px;

            position: absolute;
              top: 101%;
              left: 51%;
              transform: translate(-50%, -50%);
          }





</style>
</head>


<header>
<body>
<?php
$_SESSION["regsterFall"] = null;
$_SESSION["logFallito"]=null;
$_SESSION["etaInsuf"]=null;
$_SESSION["emailDiverse"]=null;
$_SESSION["passDiverse"]=null;
    //non sono admin
    ?>
</body>
<body>
  <div class="container">
       <ul class="progressbar">
           <li class="active">Scegli il film</li>
           <li>Seleziona i posti</li>
           <li>Ricapitolo</li>
           <li>Pagamento</li>
   </ul>
 </div>
  <br>  <br><div class="schedule-section">
        <br><br><br><br><br>
        <div class="schedule-table">
            <table>
                <tr>
                    <th>SHOW</th>
                    <th>DETTAGLI</th>
                </tr>
                <tr class="fade-scroll">
                    <td align=center valign=top>
                        <h2>Captain Marvel</h2>
                        <i class="far fa-clock"></i> 125m <i class="fas fa-desktop"></i> IMAX
                        <img  width="250px" height="300px" src="https://m.media-amazon.com/images/M/MV5BMTE0YWFmOTMtYTU2ZS00ZTIxLWE3OTEtYTNiYzBkZjViZThiXkEyXkFqcGdeQXVyODMzMzQ4OTI@._V1_.jpg">
                    </td>
                    <td>
                        <p> film di merda diretto dalla merda </p>
                          <form >
                            <input type="submit" value="acquista"></input>
                          </form>
                    </td>
                </tr>
                <tr class="fade-scroll">
                    <td  align=center valign=top >
                        <h2>Captain Marvel</h2>
                        <i class="far fa-clock"></i> 125m <i class="fas fa-desktop"></i> IMAX
                          <img   width="250px" height="300px" src="https://m.media-amazon.com/images/M/MV5BMTE0YWFmOTMtYTU2ZS00ZTIxLWE3OTEtYTNiYzBkZjViZThiXkEyXkFqcGdeQXVyODMzMzQ4OTI@._V1_.jpg">
                    </td>
                    <td>
                        <p> film di merda diretto dalla merda </p>
                    </td>
                </tr>
                <tr class="fade-scroll">
                    <td align=center valign=top>
                        <h2>Captain Marvel</h2>
                        <i class="far fa-clock"></i> 125m <i class="fas fa-desktop"></i> IMAX
                          <img  width="250px" height="300px" src="https://m.media-amazon.com/images/M/MV5BMTE0YWFmOTMtYTU2ZS00ZTIxLWE3OTEtYTNiYzBkZjViZThiXkEyXkFqcGdeQXVyODMzMzQ4OTI@._V1_.jpg">
                    </td>
                    <td>
                        <p> film di merda diretto dalla merda </p>
                    </td>
                </tr>
            </table>
        </div>


    </div>

        <div class="footer">
          <small>Copyright &copy; TheCinema 2020</small>
          <small>Contatti: TheCinema@gmail.com</small>
       </div>



    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/owl.carousel.min.js "></script>
    <script src="scripts/script.js "></script>
</body>

</html>
