<html>
 <head>
    <link href='https://fonts.googleapis.com/css?family=Merienda' rel='stylesheet'>
    
    <link href="stilovi3.css" rel="stylesheet" type="text/css"/>
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
                        
                       <li>  <a href="rezervacije.php">REZERVIŠITE KARTE</a> </li>
					   <li>  <a href="sverezervacije.php">VAŠE REZERVACIJE</a> </li>
                       <li class = "current"><a href="profil.php"> VAŠ PROFIL</a></li>
                         <li><a href="logout.php">IZLOGUJ SE</a></li>
                       
                       

                    </ul>
                </nav>
				</div>
				</div>
				</header>
             <?php   
                include "konekcija.php";
                $sql="SELECT *FROM korisnik WHERE username='$user'";
				
			
                if (!$q=$mysqli->query($sql)){
                    die ("Nastala je greška pri izvođenju upita<br/>" . $mysqli->error);
                }
               
                 else { ?>

                
                   <?php while ($red=mysqli_fetch_object($q)){
                    ?>
					<section id = "showcase">
          <div class = "container">
            <br> <br> <br> <br> <br> <br>
            <h2> Informacije o profilu: </h2>
            <form class="form2">
          <p> Ime i prezime: <?php echo $red->imeiprezime; ?></p>
					<p> Email adresa: <?php echo $red->email; ?></p>
					<p> Username: <?php echo $red->username; ?></p>
					<p> Password: <?php echo $red->password; ?></p>
          </form>
          <button id="myButton1"  data-toggle="modal" data-target="#myModal" >Izmeni profil</button>
          <button id="myButton" >Obriši profil</button>

        <script type="text/javascript">
        document.getElementById("myButton").onclick = function () {
        location.href = "deleteuser.php";
    };
       </script>
          </form>
			</div>
      <br><br><br>
				 <h2>Prethodne rezervacije:</h2>
				
  
     <div  class="modal" id="myModal" > 
      <div class="modal-dialog modal-dialog-centered" role="document"> 
    
           <div class="modal-content"> 
           
               <div class="modal-body"> 
                <p>Napomena: Nije moguće promeniti username.</p> 

                     <form action="profil.php" method="post">  
                          <label>Unesite novo  ime i prezime</label>  
                          <input type="text" name="imeiprezime" id="imeiprezime" value=" <?php echo $red->imeiprezime;?>"  />  
                          <br /> 
                          <label>Unesite novi email</label>  
                          <input type="text" name="email" value="<?php echo $red->email; ?>" required="required" reqired pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"       /> 
                          
                          <br />   
                          <label>Unesite novi password</label>  
                          <input type="password" name="password" value="<?php echo $red->password; ?>"  required="required"     /> 

                          <br />  

                        
                          
                          <input type="submit"  value="Promeni" class="btn btn-success" /> 
                          <button type="button" class="btn btn-default" data-dismiss="modal">Odustani</button> 
                     </form>  
                </div>  
                
           </div>  
      </div>  
 </div>  

                <?php
                } }
          
               

               if($_SERVER["REQUEST_METHOD"] == "POST"){
               
  
               $password = mysqli_real_escape_string($mysqli,$_POST['password']);
               $imeiprezime= mysqli_real_escape_string($mysqli,$_POST['imeiprezime']);
               $email= mysqli_real_escape_string($mysqli,$_POST['email']);
             $result= mysqli_query($mysqli,"UPDATE korisnik SET imeiprezime='$imeiprezime',email ='$email',password='$password' WHERE username= '$user'");

             if($result){  Print '<script>alert("Uspesno promenjeni podaci!");</script>';
              header("location:profil.php");
            
             

           }
               }
               ?>
			  <?php   
    
        $sql2="SELECT p.naziv, proj.datum, proj.pocetak, r.broj_karata 
				FROM rezervacija r INNER JOIN korisnik k ON r.korisnikid = k.idKorisnik
				INNER JOIN projekcija proj ON r.projekcijaid = proj.id 
				INNER JOIN predstava p ON proj.predstavaid = p.id 
				WHERE  r.broj_karata>0 and k.username = '$user' ";
                if (!$q=$mysqli->query($sql2)){
                    die ("Nastala je greška pri izvođenju upita<br/>" . $mysqli->error);
                }
                if ($q->num_rows==0){
                    echo "Nema prethodnih rezervacija";
                } 
                 else {   ?>
                <div style="overflow-x:auto;">
                <table id="rezervacije">
                     <tr>
                        <th><b>Naziv predstave</b></th>
                        <th><b>Datum projekcije</b></th>
                        <th><b>Početak predstave</b></th>
				        <th><b>Broj rezervisanih karata</b></th>

                    </tr>
                    <?php   
                    while ($red=$q->fetch_object()){
                    ?>
                    <tr>
    
                        <td><?php echo $red->naziv; ?></td> 
                        <td><?php echo $red->datum; ?></td>
                        <td><?php echo $red->pocetak; ?></td>
                        <td><?php echo $red->broj_karata; ?></td>
                    </tr>
    
                    <?php
                     }
                    ?>
                </table>
                   </div>
                  </section>
                <?php
                } 
          
               ?>

        </body>



</html>