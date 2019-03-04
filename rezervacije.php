<html>
 <head>
    <link href='https://fonts.googleapis.com/css?family=Merienda' rel='stylesheet'>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link href="stilovi5.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="pronadji.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
  

    <meta charset="UTF-8">
    <title>Predstave</title>
  </head>

<?php
  session_start(); //starts the session
  if($_SESSION['user']){ //checks if user is logged in
  }
  else{
    header("location:index.php"); // redirects if user is not logged in
  }
  $user = $_SESSION['user']; //assigns user value
  ?>
  <body>
  
     <header>
            <div class = "container">
                
                <div id = "brand"> 
                    <h1><span class = "highlight">DEČIJE POZORIŠTANCE</span> MEDA</h1>
                    </div>

                <nav> 
                    <ul>
                        <li ><a href = "home.php">PREDSTAVE</a></li>
                        <li class = "current">  <a href="rezervacije.php">REZERVIŠITE KARTE</a> </li>
					              <li>  <a href="sverezervacije.php">VAŠE REZERVACIJE</a> </li>
                         <li><a href="profil.php"> VAŠ PROFIL</a></li>
                         <li><a href="logout.php">IZLOGUJ SE</a></li>
                       
                       

                    </ul>
                </nav>
				</div>
				</div>
				</header>
        <section id = "showcase">
          <div class = "container">
        <?php
        include "konekcija.php";
       $sql="SELECT DISTINCT datum FROM projekcija WHERE datum> SYSDATE()";
       $rezultat = $mysqli->query($sql);
        ?>

        <form> 
        <h3>Izaberite datum projekcije:</h3>
        <select name="projekcije" onchange="PrikaziDetalje(this.value)" class="custom-select" style="width:200px; height:35px;" >
          <option value=""></option>
          <?php
           while($red = $rezultat->fetch_object()){
          ?>
           <option value="<?php echo $red->datum;?>"><?php echo $red->datum;?></option>
          <?php
                }
                 ?>

        </select></form>
      <p><div id="popuni"><b>Podaci o projekcijama na odabrani datum će se prikazati ovde</b></div></p>
           </div>
           </section>   

        </body>




</html>