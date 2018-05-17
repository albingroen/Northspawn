<?php 

  // Changing title of website depending on where you are
  if(!isset($_GET['pageid'])){
    $title = "Lan. E-sport. Gaming. Hackathon. Expo. Välkommen till Northspawn";  
    $header = "700";
  } elseif ($_GET['pageid'] === 'landing') {
    $title = "Lan. E-sport. Gaming. Hackathon. Expo. Välkommen till Northspawn";  
    $header = "700";
  } elseif ($_GET['pageid'] === 'login') {
    $title = "Logga in på Northspawn";
    $header = "350";
  } elseif ($_GET['pageid'] === 'register') {
    $title = "Registrera hos Northspawn";
    $header = "350";
  }  elseif ($_GET['pageid'] === 'feedback') {
    $title = "Northspawn - feedback";
    $header = "350";
  } elseif ($_GET['pageid'] === 'products') {
    $title = "Välj en produkt i shopen";    
    $header = "350";
  } elseif ($_GET['pageid'] === 'cart') {
    $title = "Kundvagn";    
    $header = "350";
  } elseif ($_GET['pageid'] === 'orders') {
    $title = "Ordrar";    
    $header = "250";
  } elseif ($_GET['pageid'] === 'products') {
    $title = "Northspawn - Biljetter";    
    $header = "250";
  } elseif ($_GET['pageid'] === 'checkout') {
    $title = "Northspawn - Köp genomfört";    
    $header = "300";
  }

?>

<!DOCTYPE html>
<html lang="sv">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $title; ?></title>
</head>
<body>
<nav>
  <ul>
    <div class="left">
      <img class="logo" src="./imgs/logo_jointhegame_vit.png" alt="Logotyp">
    </div>
    <div class="right" >
      <li><a href="index.php">Start</a></li>      
      <li><a href="index.php?pageid=products">Biljetter</a></li>
    <?php 
     
      // Displaying logout button + user's name if logged in, using the displayUser variable declared in landing.php
      if(!empty($_SESSION['user'])){        
        echo <<<MESSAGE
        <li><a href="index.php?pageid=landing&logout=true">Logga ut</a></li>
        <li class="message" ><a href="">Välkommen {$displayUser}</a></li>        
MESSAGE;
      
        // Checking if user is a administrator and then displaying extra content
        if(!empty($_SESSION['admin'])){
          if($_SESSION['admin'] === 'TRUE'){
            echo <<<EXTRA
            <li><i id="menuBtn" class="fas fa-caret-square-down"></i></li>
            <li><i id="closeBtn" class="fas fa-minus-square"></i></li>
            <div id="menu">
              <ul>
                <li><a href=index.php?pageid=orders>Se ordrar</a></li>
                <li><a href="index.php?pageid=register">Lägg till nyhet</a></li>
                <li><a href="index.php?pageid=feedback">Se feedback</a></li>
              </ul>
            </div>
EXTRA;
          } else {
            echo "<div class=thumbnail></div>";
          }
        }
      } else {
        // Displaying login and register when no user is signed in
        echo <<<CONTENT
        <li><a href=index.php?pageid=login>Logga in</a></li>
        <li><a href="index.php?pageid=register">Registrera</a></li>
CONTENT;
      }
    ?>
    </div>
  </ul>
</nav>
<div class="header" style="min-height: <?php echo $header; ?>px" >
  <h1><?php echo $title; ?></h1>
  <?php 
    // Adding the buttons only on landing-page
    if(!empty($_GET['pageid'])){
      if($_GET['pageid'] === 'landing'){
        echo <<<BUTTONS
        <div class="button-wrapper">
          <a href="index.php?pageid=register"><button>Skapa konto</button></a>
          <button>Läs mer</button>
        </div>
BUTTONS;
      } 
    } else {
      echo <<<BUTTONS
      <div class="button-wrapper">
        <a href="index.php?pageid=register"><button>Skapa konto</button></a>
        <button>Läs mer</button>
      </div>
BUTTONS;
    }
  
  ?>
</div>
<style>
  <?php include('header.css') ?>
</style>

<script>
  // Making opening and closing extra features possible
  function openMenu(){
    document.getElementById("menu").style.display = "block"; 
    document.getElementById("closeBtn").style.display = "block"; 
    document.getElementById("menuBtn").style.display = "none"; 
    setTimeout(() => {
      document.getElementById("menu").style.opacity = 1;       
    }, 100);
  }
  document.getElementById("menuBtn").addEventListener("click", openMenu);

  function closeMenu(){
    document.getElementById("menu").style.opacity = 0;    
    document.getElementById("closeBtn").style.display = "none"; 
    document.getElementById("menuBtn").style.display = "block"; 
    setTimeout(() => {
      document.getElementById("menu").style.display = "none"; 
    }, 100);
  }
  document.getElementById("closeBtn").addEventListener("click", closeMenu);
</script>
