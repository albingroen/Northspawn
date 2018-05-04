<?php

  $db = new PDO("sqlite:Northspawn.db");

  $firstName = null;
  $lastName = null;
  $email = null;
  $password = null;
  // $password = null;

  if(isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["email"]) && isset($_POST["password"])){
    $firstName = htmlspecialchars($_POST["firstName"]);
    $lastName = htmlspecialchars($_POST["lastName"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
    

    $stmt = $db->prepare("INSERT INTO users (user_firstName, user_lastName, user_email, user_password) VALUES ('{$firstName}', '{$lastName}', '{$email}', '{$password}')");
    $stmt->execute();
  }

?>

<div class="content">
  <form method="POST">
    <input type="text" name="firstName" placeholder="Förnamn" >
    <input type="text" name="lastName" placeholder="Efternamn" >
    <input autocomplete="new-email" type="text" name="email" placeholder="Epost-address" >
    <input autocomplete="new-password" type="password" name="password" placeholder="Lösenord" >
    <!-- <input type="text" name="order" placeholder="Biljett"> -->
    <br>
    <!-- <select name="product" >
      <option value="1" >Basic</option>
      <option value="2" >Premium</option>
      <option value="3" >VIP</option>
    </select> -->
    <button>Registrera</button>
  </form>
</div>
<style>
  <?php include('styles/register/style.css') ?>
</style>

