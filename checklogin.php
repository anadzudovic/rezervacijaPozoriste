<?php
  session_start();  
 include "konekcija.php";
  $username = mysqli_real_escape_string($mysqli,$_POST['username']);
  $password = mysqli_real_escape_string($mysqli,$_POST['password']); 
  
  $result = $mysqli->query("SELECT * from korisnik WHERE username='$username'");
  
  $table_users = "";
  $table_password = "";
  if(mysqli_num_rows($result)) 
  {
    echo "string";
    while($row = mysqli_fetch_assoc($result)) 
    {      
      $table_users = $row['username']; 
      $table_password = $row['password']; 
    }
    if(($username == $table_users) && ($password == $table_password)) 
    {
        if($password == $table_password)
        {
          $_SESSION['user'] = $username; //set the username in a session. This serves as a global variable
          header("location: home.php");// redirects the user to the authenticated home page
        }
        
    }
    else
    {
      Print '<script>alert("Incorrect Password!");</script>'; //Prompts the user
      Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
    }
  }
  else
  {
    Print '<script>alert("Incorrect Username!");</script>'; //Prompts the user
    Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
  }
?>