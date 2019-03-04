 <?php  

 include "konekcija.php";  
 $output = '';  
 if(isset($_POST["datum"]))  
 {  
      if($_POST["datum"] != '')  
      {  
           $sql = "SELECT * FROM projekcija WHERE datum = '".$_POST["datum"]."'";  
           $result = mysqli_query($mysqli, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
          $output .='<br>';
           $output .= ''.$row["projekcijaid"].'';  
          $output .='<br>';
      }  
      echo $output; 
          
          
      }  

     
 }  
 ?>  
