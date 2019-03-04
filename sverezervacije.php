<html
 <head>
    <link href='https://fonts.googleapis.com/css?family=Merienda' rel='stylesheet'>
    
    <link href="stilovi5.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script type="text/javascript" src="jquery-1.10.2.js"></script>
	<script type="text/javascript">
     $(document).ready(function () {
     $(".obrisi_link").click(function(){
     var vrednost = ($(this).attr("id")).substring(7);
     var red_tabele = $(this);
     $.get("obrisi.php", { id: vrednost },
     function(data){
     if (data == 1){
     $(red_tabele).parent().parent().remove();
}
});
});
});
</script>
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
                       <li class> <a href="rezervacije.php">REZERVIŠITE KARTE</a> </li>
					    <li class = "current">  <a href="sverezervacije.php">VAŠE REZERVACIJE</a> </li>
                       <li><a href="profil.php"> VAŠ PROFIL</a></li>
                         <li><a href="logout.php">IZLOGUJ SE</a></li>
                       
                       

                    </ul>
                </nav>
				</div>
				</div>
				</header>
				 <section id = "showcase">
                 <div class = "container">
				 <br><br><br><br><br>
				 <table id="rezervacije">
				  <tr>
                        <th><b>Naziv predstave</b></th>
                        <th><b>Datum projekcije</b></th>
                        <th><b>Početak predstave</b></th>
						<th><b>Cena karte</b></th>
					    <th><b>Broj rezervisanih karata</b></th>
						<th><b> Obriši rezervaciju </b></th>

                    </tr>
				   <?php
include "konekcija.php";
$query="SELECT p.naziv, proj.datum, proj.pocetak, r.broj_karata,proj.brojMesta,p.cena,r.id
				FROM rezervacija r INNER JOIN korisnik k ON r.korisnikid = k.idKorisnik 
				INNER JOIN projekcija proj ON r.projekcijaid = proj.id 
				INNER JOIN predstava p ON proj.predstavaid = p.id 
				WHERE proj.datum> sysdate()and r.broj_karata>0 and k.username = '$user'";
 $rezultat = $mysqli->query($query);
 while($red = $rezultat->fetch_object()){
 $id= $red->id;
 echo "<tr>";
  echo "<td>" . $red->id . "</td>";
 echo "<td>" . $red->naziv . "</td>";
 echo "<td>" . $red->datum . "</td>";
 echo "<td>" . $red->pocetak . "</td>";
 echo "<td>" . $red->cena . "</td>";

 echo "<td>" . $red->broj_karata . "</td>"; ?>
 <td><a href="#" class="obrisi_link" id="obrisi_<?php echo $red->id;?>">Obriši rezervaciju</a></td>
 <?php
echo "</tr>" ;
 }
 echo"</div>";
echo "</table>";

$mysqli->close();

?>
</div>
</section>
</body>
</html>