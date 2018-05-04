<?php 
  session_start(); // Starting session

  // Connecting to the database for Northspawn project
  $db = new PDO("sqlite:Northspawn.db"); 

  // Destroying the session once the user clicks on logout 
  if(!empty($_GET['logout'])){
    session_unset();
    session_destroy();
  }

  $email = null;
  $password = null;
  
  if(!empty($_POST["email"]) && !empty($_POST["password"])){
    // Declaring the post paramters for input by user on login
    $email = htmlspecialchars($_POST["email"]);  
    $password = htmlspecialchars($_POST["password"]);

    // Findig the password for the account where the email matches the one written by the user
    $stmtDbPass = $db->prepare("SELECT user_password FROM users WHERE user_email = '{$email}'");
    $stmtDbPass->execute();
    $passwordDb = $stmtDbPass->fetch();

    // Checking if the input details matches with the databse details for that email,
    // and then storing the email in the session
    if(password_verify($password, $passwordDb[0])){      
      $_SESSION['user'] = $email;
    } else {
      echo 'Username or password incorrect';
    }
  }

  // Getting the name for that emails specific user, and declare it to a displayUser variable
  if(!empty($_SESSION['user'])){
    $user_email = $_SESSION['user'];
    $stmt = $db->prepare("SELECT user_firstName FROM users WHERE user_email = '{$user_email}'");
    $stmt->execute();
    $user = $stmt->fetch();
    $displayUser = $user[0];
  } else {
    $user_email = null;
    $displayUser = null;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="styles/landing/style.css">
</head>
<body>
  <?php require('incs/header/header.php') ?>
  <div class="content">
    <div class="cookies">      
      <p>Vi använder cookies för att göra din upplevelse bättre. Veganska cookies för en bättre miljö såklart.</p>
      <input type="submit" value="Jag förstår">      
    </div>
    <section>
      <div class="left" id="left1">
        <h2>Lan event</h2>
        <p>Med sina 1000 platser kommer NorthSpawns LAN att vara kärnan under eventet. På LANet samlas spelarna som tycker det är roligare att spela tillsammans. Ta med datorn och spela ditt favoritspel i en häftig miljö där du kan träffa nya och gamla vänner med gaming som gemensamt intresse.  LANet pågår dygnet runt under eventets alla dagar, men deltagare kan när som helst ta sovpauser i eventets bevakade sovsal. Även mat och snacks finns tillgängligt dygnet runt och kan köpas med matkuponger, Swish eller kontanter.</p>
      </div>
      <div  class="right" id="right1"></div>
    </section>
    <section class="section2" >
      <div class="left" id="left2">
        <h2>E-sport</h2>
        <p>NorthSpawn skapas framför allt för spelarna och därför har e-sport en solklar plats i eventet med 3 huvudturneringar som alla kan delta i. Vi vill erbjuda regionens gamers tävlingar i deras närhet, där alla har en chans att vinna. </p>
      </div>
      <div class="right" id="right2"></div>
    </section>
    <section class="section3">
      <div class="left" id="left3">
        <h2>Hackathon</h2>
        <p>Vill du lära dig programmering? Skapa en ny APP? Eller kanske bygga din egen speldator? På NorthSpawn kommer det att finnas aktiviteter för alla! Utmana dig själv och prova att göra något nytt, eller gör något du är duktig på! Under eventet kommer det att finnas hackathons och workshops som utmanar hjärnan och ger möjligheter att både lära sig nya saker, men också att hjälpa företag att lösa verkliga problemställningar. </p>
      </div>
      <div class="right" id="right3"></div>
    </section>
  </div>
  <?php require('incs/footer/footer.php') ?>
</body>
</html>
