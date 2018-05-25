<?php
  session_start(); // Starting session

  // Connecting to the database for Northspawn project
  $db = new PDO("sqlite:Northspawn.db"); 

  // Destroying the session once the user clicks on logout 
  if(!empty($_GET['logout'])){
    session_unset();
    session_destroy();
  }

  // Logging in a user
  $email = null;
  $password = null;

  if(!empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST['loginCheck']) ){
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
    $stmtAdmin = $db->prepare("SELECT admin FROM users WHERE user_email = '{$_SESSION['user']}'");
    $stmtAdmin->execute();
    $admin = $stmtAdmin->fetch();    
    $_SESSION['admin'] = $admin[0];    
    } else {      
      header("Location: index.php?pageid=login&err=LOGINFAILED");
      exit();      
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

  // If there is no pageid it's going to route to index.php?pageid=landing in the background
	if(empty($_GET['pageid']))
	{
    $pageid = "landing";
	}
	else
	{
    $pageid = htmlspecialchars($_GET['pageid']);	
  }
  
  if(!empty($_POST['accept'])){
    $_SESSION['cookies'] = TRUE;
  } else {
    $_SESSION['cookies'] = FALSE;
  }

  
  $firstName = null;
  $lastName = null;

  // Adding user to database
  if(isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm-password"])){
    $firstName = htmlspecialchars($_POST["firstName"]);
    $lastName = htmlspecialchars($_POST["lastName"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
    $confirmedPasword = htmlspecialchars($_POST['confirm-password']);

    // If password and confirm password are the same, create account
    if(htmlspecialchars($_POST['password']) === $confirmedPasword){
      $stmt = $db->prepare("INSERT INTO users (user_firstName, user_lastName, user_email, user_password) VALUES ('{$firstName}', '{$lastName}', '{$email}', '{$password}')");
      $stmt->execute();
    } else {
      header("Location: index.php?pageid=register&firstName={$firstName}&lastName={$lastName}&email={$email}&err=passNotMatch");
    }

    // // Send a email after registration to user    
    // $msg = "First line of text\nSecond line of text";
    // $msg = wordwrap($msg,70);    
    // $subject = "Välkommen till Northspawn.se!";
    // mail("albin.groen@gmail.com", $subject, $msg); // usign $email from register to send to
  }

  // Adding feedback to database
  if(!empty($_POST['feedback'])){
    if(!empty($_SESSION['user'])){
      $feedback = htmlspecialchars($_POST['feedback']);
      $stmtFeedback = $db->prepare("INSERT INTO feedback (text, author) VALUES ('{$feedback}', '{$_SESSION['user']}')");
      $stmtFeedback->execute();
      header("Location: index.php");
      exit();
    } else {      
      $feedback = htmlspecialchars($_POST['feedback']);
      $stmtFeedback = $db->prepare("INSERT INTO feedback (text, author) VALUES ('{$feedback}', 'Anonym')");
      $stmtFeedback->execute();            
    }
  }

	// Building page depending on GET parameters to index.php
  require("incs/header/header.php");	

  ?>

  <style>
    <?php include('main.css') ?>
  </style>

  <?php 

  require("pages/{$pageid}/{$pageid}.php");

  require("incs/feedBackModal/feedBackModal.php");	

  require("incs/footer/footer.php");	   
  
  ?>

  
