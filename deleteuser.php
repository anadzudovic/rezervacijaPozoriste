<?php
session_start(); //starts the session
  if($_SESSION['user']){ //checks if user is logged in
  }
  else{
    header("location:index.php"); // redirects if user is not logged in
  }
  $user = $_SESSION['user']; //assigns user value

include "konekcija.php";
               $sql="UPDATE korisnik SET imeiprezime='dfsgh', username='dgdfg',password='gdfg'WHERE username='$user'";
                if (!$q=$mysqli->query($sql)){
                    die ("Nastala je greška pri izvođenju upita<br/>" . $mysqli->error);
                }
                else{

                   Print '<script>alert("Uspešno ste izbrisali profil!");</script>';
                   include "logout.php";
                }
                
            

          
?>