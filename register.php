<?php 

  $firstName = '';
  $lastName = '';
  $email = '';

  if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];  
  }

  $db = new PDO('sqlite:Northspawn');
  $users = $db->prepare("SELECT * FROM users");
  echo $users;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="styles/register/style.css">
  
</head>
<body>
  <header>
    <img class="logo" src="./imgs/Northspawn_logo_vit.png" alt="">
    <h1>Registerera till Northspawn</h1>
  </header>
  <div class="content">
    <form method="POST">
      <input autocomplete="new" type="text" name="firstName" placeholder="Förnamn" >
      <input autocomplete="new" type="text" name="lastName" placeholder="Efternamn" >
      <input autocomplete="new" type="text" name="email" placeholder="Epost-address" >
      <button>Registrera</button>
    </form>
    
    <h2><?php echo $firstName ?></h2>

  </div>
  <?php require('incs/footer/footer.php') ?>
</body>
</html>
