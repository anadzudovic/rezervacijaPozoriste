<html>
<head>
    <link href='https://fonts.googleapis.com/css?family=Merienda' rel='stylesheet'>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link href="stilovi3.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="pronadji.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<body>
<?php
if (!isset ($_GET["datum"])){
echo "Parametar datum nije prosleđen!";
} else {
$pomocna=$_GET["datum"];

include "konekcija.php";

$sql="SELECT p.naziv, proj.datum, proj.pocetak, proj.brojMesta,p.cena, proj.id from projekcija proj inner join predstava p on proj.predstavaid=p.id WHERE proj.datum='".$pomocna."'";

$rezultat = $mysqli->query($sql);
//ispis naziva kolona u tabeli
echo " <table id='rezervacije'>
                     <tr>
                        <th><b>Naziv predstave</b></th>
                        <th><b>Datum projekcije</b></th>
                        <th><b>Početak predstave</b></th>
                       
                        <th><b>Cena karte </b></th>
                     
                        <th><b>Rezerviši</b></th>

                    </tr>";
//ispis podataka o projekciji
while($red = $rezultat->fetch_object()){
 echo "<tr>";
 echo "<td>" . $red->naziv . "</td>";
 echo "<td>" . $red->datum . "</td>";
 echo "<td>" . $red->pocetak . "</td>";
 echo "<td>" . $red->brojMesta . "</td>";
 echo "<td>" . $red->cena . "</td>";
 ?>
 <td> <a href="process.php?id=<?php echo $red->id; ?> "> <button name="cart" style="align-self: center;"> Rezerviši</button></a></td>
<?php
 echo "</tr>" ;
 }
echo "</table>";

$mysqli->close();
}
?>

</body></html>