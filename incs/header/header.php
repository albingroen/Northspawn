<?php 

  // Changing title of website depending on where you are
  if(!isset($_GET['pageid'])){
    $title = "Lan. E-sport. Gaming. Hackathon. Expo. Välkommen till Northspawn";  
  } elseif ($_GET['pageid'] === 'landing') {
    $title = "Lan. E-sport. Gaming. Hackathon. Expo. Välkommen till Northspawn";  
  } elseif ($_GET['pageid'] === 'login') {
    $title = "Logga in på Northspawn";
  } elseif ($_GET['pageid'] === 'register') {
    $title = "Registrera hos Northspawn";
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
      <img class="logo" src="./imgs/Northspawn_logo_vit.png" alt="Logotyp">
    </div>
    <div class="right" >
      <li><a href="index.php">Start</a></li>
      <li><a href="#">Om eventet</a></li>
      
    <?php 
      // Displaying logout button + user's name if logged in, using the displayUser variable declared in landing.php
      if(!empty($user_email)){        
        echo <<<MESSAGE
        <li><a href="index.php?pageid=landing&logout=true">Logga ut</a></li>
        <li class="message" ><a href="">Välkommen {$displayUser}</a></li>
        <div class="thumbnail"></div>
MESSAGE;
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
<div class="header">
  <div class="info">
    <h3 class="date" >november 1 - 4</h3>
  </div>
  <h1><?php echo $title; ?></h1>
  <div class="button-wrapper">
    <a href="index.php?pageid=register"><button>Skapa konto</button></a>
    <button>Läs mer</button>
  </div>
</div>
<style>
  <?php include('header.css') ?>
</style>

