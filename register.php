<html>
  <head>
    <title>Registracija</title>
    <link href='https://fonts.googleapis.com/css?family=Merienda' rel='stylesheet'>
    <link href="stilovi3.css" rel="stylesheet" type="text/css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

    <meta charset="UTF-8">
  </head>
  <body>
    <header>
    <h2>Registracija</h2>
  </header>
     <section id ="showcase">

 <div class="container">
   <img src = "slike/deca2.jpg" style="float: right; margin-top:80px; width: 50%; height:70%; margin-right: 1%; margin-bottom: 0.5cm; margin-left: 15px ; border-radius: 25px;">
   <br><br>
  <div class="form1"> 
    
    <form action="register.php" method="post">
      <br><br>
      Unesite ime i prezime: <input type="text" name="name" required="required"/> <br/> <br>
      Unesite email adresu: <input type="text" name="email" required="required" reqired pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"> <br/> <br>
      Unesite Username: <input type="text" name="username" required="required"/> <br/> <br>
      Unesite Password: <input type="password" name="password" required="required" /> <br/><br><br>
      <input type="submit" value="Register"/><br> <br>
       <input type="reset" value="Reset"/>
       <br><br><br>
      <a href="index.php">*KLIKNITE OVDE DA SE VRATITE NA POCETNU STRANU</a><br/><br/>
    </form>
   </div>
  </div>
</section>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
  session_start(); 
include "konekcija.php";
  $username = mysqli_real_escape_string($mysqli,$_POST['username']);
  $password = mysqli_real_escape_string($mysqli,$_POST['password']);
  $imeiprezime= mysqli_real_escape_string($mysqli,$_POST['name']);
  $email= mysqli_real_escape_string($mysqli,$_POST['email']);
    $bool = true;

  $query = mysqli_query($mysqli,"Select * from korisnik"); //Query the users table
  while($row = mysqli_fetch_array($mysqli,$query)) //display all rows from query
  {
    $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
    if($username == $table_users) // checks if there are any matching fields
    {
      $bool = false; // sets bool to false
      Print '<script>alert("Username has been taken!");</script>'; //Prompts the user
      Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
    }
  }
  if($bool) // checks if bool is true
  {
    mysqli_query($mysqli,"INSERT INTO korisnik (imeiprezime,email,username, password) VALUES ('$imeiprezime','email','$username','$password')"); //Inserts the value to table users
    Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
   $_SESSION['user'] = $username; //set the username in a session. This serves as a global variable
          header("location: home.php");// redirects the user to the authenticated home page
  }
}
?>
 </body>
</html>