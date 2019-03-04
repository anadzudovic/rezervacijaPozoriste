<?php
    session_start();
    if($_SESSION['user']){
    }
    else{
        header("location:index.php");
    }
    if($_SERVER['REQUEST_METHOD'] = "POST") //Added an if to keep the page secured
    {
        $details = mysql_real_escape_string($_POST['details']);
        $time = strftime("%X");//time
        $date = strftime("%B %d, %Y");//date
        $decision ="no";
       include "konekcija.php";
        foreach($_POST['public'] as $each_check) //gets the data from the checkbox
        {
            if($each_check !=null ){ //checks if the checkbox is checked
                $decision = "yes"; //sets teh value
            }
        }
        
        mysql_query("INSERT INTO list (details, date_posted, time_posted, public) VALUES ('$details','$date','$time','$decision')"); //SQL query
        header("location: home.php");
    }
    else
    {
        header("location:home.php"); //redirects back to hom
    }
?>