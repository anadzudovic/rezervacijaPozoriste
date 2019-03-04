<html>
  <head>
    <link href='https://fonts.googleapis.com/css?family=Merienda' rel='stylesheet'>
    <link href="stilovi3.css" rel="stylesheet" type="text/css"/>
     <link href="stilovi2.css" rel="stylesheet" type="text/css"/>
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
                        <li><a href = "home.php">PREDSTAVE</a></li>
                        
                       <li>  <a href="login.php">REZERVIŠITE KARTE</a> </li>
					   <li>  <a href="sverezervacije.php">VAŠE REZERVACIJE</a> </li>
                       <li class><a href="profil.php"> VAŠ PROFIL</a></li>
                         <li><a href="logout.php">IZLOGUJ SE</a></li>
                       
                       

                    </ul>
                </nav>

            </div>

        </header>
   <section id = "showcase">
            <div class = "container">
   
   <?php 
   
    include "konekcija.php";
                $sql="SELECT * FROM predstava WHERE id=3";
                if (!$q=$mysqli->query($sql)){
                    die ("Nastala je greška pri izvođenju upita<br/>" . $mysqli->error);
                }
                if ($q->num_rows==0){
                    echo "Nema predstava";
                } 
                 else { ?>

                
                   <?php while ($red=mysqli_fetch_object($q)){
                    ?>
                   
                 
               
                  
                   
              <div id="slides"  style="float: left; margin-top: 110px; width: 60%; margin-right:2%; margin-bottom: 0.5em; border-radius: 10px;">  
      
     <img src="slike/kraljlavova1.jpg" style="height: 100% ">
      <img src ="slike/kraljlavova2.jpg"  style="height: 100%">
      
      <img src="slike/kraljlavova3.jpg"  style="height: 100% ">
      <img src="slike/kraljlavova4.jpg"  style="height: 100%">
     
     
    </div>
  <div style="margin-top: 110px float:right;">
                    <h1> <?php echo $red->naziv; ?></h1>
                     <p> <?php echo $red->opis; ?></p>
                    <p>Trajanje: <?php echo $red->trajanje; ?></p>
                    <p>Cena karte: <?php echo $red->cena; ?></p>

                
  </div>


  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  
  <script src="jquery.slides.min.js"></script>
   <script>
    $(function() {
      $('#slides').slidesjs({
        
        navigation: false
      });
    });
  </script>
             
                
               
                <?php
                } }
          
               ?>
             
    
    </div>
  </section>
  </body>
</html>