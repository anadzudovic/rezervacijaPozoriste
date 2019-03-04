<html>
    <head>
        <link href='https://fonts.googleapis.com/css?family=Merienda' rel='stylesheet'>
        <link href="stilovi3.css" rel="stylesheet" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

        <meta charset="UTF-8">
        <title>Pozoristance</title>
    </head>
    <body>
        <header>
            <div class = "container">
                
                <div id = "brand"> 
                    <h1><span class = "highlight">DEČIJE POZORIŠTANCE</span> MEDA</h1>
                    </div>

                <nav> 
                    <ul>
                        <li class = "current"><a href = "index.php">POČETNA</a></li>
                       <li>  <a href="login.php">PRIJAVI SE</a> </li>
                         <li><a href="register.php">REGISTRUJ SE</a></li>
                       
                       

                    </ul>
                </nav>

            </div>

        </header>
        
        <section id = "showcase">
            <div class = "container">
                <h1>Dobrodošli u pozorištance! </h1>
                <p>Prijavite se ili ulogujte na sajt da bi rezervisali karte za predstave</p>
                <p> Za sve predstave kupuju se porodične karte </p>
                
                <div class="slideshow-container">


<div class="mySlides fade">
  
  <img src = "slike/dedamraz1.jpg" style="float: center; width: 100%; height: 500px; margin-left: 20%;  margin-bottom: 0.5em;">
  
</div>

<div class="mySlides fade">
  
  <img src = "slike/dedamraz4.jpg" style="float: center; width: 100%; height: 500px; margin-left:20%; margin-bottom: 0.5em;">
 
</div>
<div class="mySlides fade">
  
  <img src = "slike/kraljlavova1.jpg" style="float: center; width: 100%; height: 500px; margin-left:20%; margin-bottom: 0.5em;">
 
</div>
<div class="mySlides fade">
  
  <img src = "slike/kraljlavova3.jpg" style="float: center; width: 100%; height: 500px; margin-left:20%; margin-bottom: 0.5em;">
 
</div>
<div class="mySlides fade">
  
  <img src = "slike/aladin2.jpg" style="float: center; width: 100%; height: 500px; margin-left:20%; margin-bottom: 0.5em;">
 
</div>
<div class="mySlides fade">
  
  <img src = "slike/aladin3.jpg" style="float: center; width: 100%; height: 500px; margin-left:20%; margin-bottom: 0.5em;">
 
</div>
<div class="mySlides fade">
  
  <img src = "slike/pepeljuga1.jpg" style="float: center; width: 100%; height: 500px; margin-left:20%; margin-bottom: 0.5em;">
 
</div>
<div class="mySlides fade">
  
  <img src = "slike/pepeljuga4.jpg" style="float: center; width: 100%; height: 500px; margin-left:20%; margin-bottom: 0.5em;">
 
</div>
<div class="mySlides fade">
  
  <img src = "slike/lepotica3.jpg" style="float: center; width: 100%; height: 500px; margin-left:20%; margin-bottom: 0.5em;">
 
</div>
<div class="mySlides fade">
  
  <img src = "slike/lepotica1.jpg" style="float: center; width: 100%; height: 500px; margin-left:20%; margin-bottom: 0.5em;">
 
</div>
<div class="mySlides fade">
  
  <img src = "slike/petarpan2.jpg" style="float: center; width: 100%; height: 500px; margin-left:20%; margin-bottom: 0.5em;">
 
</div>
<div class="mySlides fade">
  
  <img src = "slike/petarpan3.jpg" style="float: center; width: 100%; height: 500px; margin-left:20%; margin-bottom: 0.5em;">
 
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>

            </div>
        </section>



        <footer>
            <p> Copyright POZORISTANCE &copy; 2018</p>

        </footer>       
    </body>
    <br/>
   
 
</html>
