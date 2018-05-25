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
    $title = "Northspawn - Kundvagn";    
    $header = "350";
  } elseif ($_GET['pageid'] === 'orders') {
    $title = "Northspawn - Ordrar";    
    $header = "250";
  } elseif ($_GET['pageid'] === 'products') {
    $title = "Northspawn - Biljetter";    
    $header = "250";
  } elseif ($_GET['pageid'] === 'checkout') {
    $title = "Northspawn - Köp genomfört";    
    $header = "300";
  } elseif ($_GET['pageid'] === 'addNews') {
    $title = "Northspawn - Lägg till nyhet";    
    $header = "300";
  } elseif ($_GET['pageid'] === 'profile') {
    $title = "Northspawn - Din profil";    
    $header = "300";
  }
?>

<!DOCTYPE html>
<html lang="sv">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/solid.css" integrity="sha384-VxweGom9fDoUf7YfLTHgO0r70LVNHP5+Oi8dcR4hbEjS8UnpRtrwTx7LpHq/MWLI" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/fontawesome.css" integrity="sha384-rnr8fdrJ6oj4zli02To2U/e6t1qG8dvJ8yNZZPsKHcU7wFK3MGilejY5R/cUc5kf" crossorigin="anonymous"> 
  <title><?php echo $title; ?></title>
</head>
<body>
<nav>
  <ul>
    <div class="left">
      <a href="index.php">
        <img class="logo" src="./imgs/logo_jointhegame_vit.png" alt="Logotyp">
      </a>
    </div>
    <div class="right" >
      <li><a href="index.php">Start</a></li>      
      <li><a href="index.php?pageid=products">Biljetter</a></li>
    <?php 
     
      // Displaying logout button + user's name if logged in, using the displayUser variable declared in landing.php
      if(!empty($_SESSION['user'])){        
        echo <<<MESSAGE
        <li><a href="index.php?pageid=cart">Kundvagn</a></li>
        <li><a href="index.php?pageid=landing&logout=true">Logga ut</a></li>
        <li class="message" ><a href="index.php?pageid=profile">Välkommen {$displayUser}</a></li>        
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
                <li><a href="index.php?pageid=addNews">Lägg till nyhet</a></li>
                <li><a href="index.php?pageid=feedback">Se feedback</a></li>
              </ul>
            </div>
EXTRA;
          } else {
            echo "<a href=index.php?pageid=profile><div class=thumbnail></div></a>";
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
          <a href="index.php?pageid=register"><button >Skapa konto</button></a>
          <a href="#about"><button>Läs mer</button></a>
        </div>
BUTTONS;
      } 
    } else {
      echo <<<BUTTONS
      <div class="button-wrapper">
        <a href="index.php?pageid=register"><button >Skapa konto</button></a>
        <a href="#about"><button>Läs mer</button></a>
      </div>
BUTTONS;
    }
  
  ?>
</div>

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

<style>
  <?php require('header.css') ?>
</style>

