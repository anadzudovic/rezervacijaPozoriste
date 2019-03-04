<html>
<?php
  session_start(); //starts the session
  if($_SESSION['user']){ //checks if user is logged in
  }
  else{
    header("location:index.php"); // redirects if user is not logged in
  }
  $user = $_SESSION['user']; //assigns user value

include "konekcija.php";
 $id= $_GET['id'];
 $brojMesta= $_GET['brojMesta'];
$sql="SELECT p.naziv, proj.datum, proj.pocetak, proj.id
				FROM projekcija proj
				INNER JOIN predstava p ON proj.predstavaid = p.id 
				WHERE proj.id = $id ";

$sql1="SELECT idKorisnik from korisnik where username='$user'";
$rezultat = $mysqli->query($sql);
$rezultat1 = $mysqli->query($sql1);
while($red1 = $rezultat1->fetch_object()){

 $korisnikid=$red1->idKorisnik;


}
while($red = $rezultat->fetch_object()){
$id= $red->id;
$naziv=$red->naziv;
$datum=$red->datum;
$pocetak=$red->pocetak;
$brojMesta=$red->brojMesta; 

$query="INSERT INTO rezervacija(projekcijaid,korisnikid)VALUES($id,$korisnikid)";

$mysqli->query($query);
}

header("location:rezervacije.php");


?>
</html>