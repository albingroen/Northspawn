


  

<nav>
  <ul>
    <li><a href="#">Start</a></li>
    <li><a href="register.php">Registrera</a></li>
    <li><a href="#">Logga in</a></li>
    <li><a id="button" href="#">Om eventet</a></li>
  </ul>
</nav>
<div class="header">
  <div class="info">
    <img class="logo" src="./imgs/Northspawn_logo_vit.png" alt="">
    
    <h3 class="date" >november 1 - 4</h3>
    
  </div>
  <!-- <h1 class="title" >E-sport tävlingar. Lan event. Cosplay. Hackathons.</h1> -->
  <h1 id="title" >HACKATHON</h1>
  <h1 id="title2" >HACKATHON</h1>
  <h1 id="title3" >HACKATHON</h1>
  <!-- <?php 

    for($i = 0; $i<3; $i++) {
      echo <<<TITLE
      <h1>Hackathon</h1>
TITLE;
    }
  ?> -->
  <h2>4 dagar fullspäckade med elektronik</h2>
  <div class="button-wrapper">
    <a href="register.php">
      <button>Skapa konto</button>
    </a>
    <a href="register.php">
      <button>Läs mer</button>
    </a>
  </div>
</div>
<style>
  <?php include('header.css') ?>
</style>
<script type='text/javascript'>  
  window.onload = function() {
  
    
    setTimeout(() => {
      document.getElementById("title").innerHTML = "hackathon";
      document.getElementById("title2").innerHTML = "hackathon";
      document.getElementById("title3").innerHTML = "hackathon"; 
    }, 0);

    setTimeout(() => {
      document.getElementById("title").innerHTML = "gaming";
      document.getElementById("title2").innerHTML = "gaming";
      document.getElementById("title3").innerHTML = "gaming"; 
    }, 3000);

    setTimeout(() => {
      document.getElementById("title").innerHTML = "expo";
      document.getElementById("title2").innerHTML = "expo";
      document.getElementById("title3").innerHTML = "expo";
    }, 6000);

    setTimeout(() => {
      document.getElementById("title").innerHTML = "esport";
      document.getElementById("title2").innerHTML = "esport";
      document.getElementById("title3").innerHTML = "esport";
    }, 9000);
      
    
    

  }
</script>


