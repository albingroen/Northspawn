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
    <h1>Logga in - Northspawn</h1>
  </header>
  <div class="content">
    <form action="landing.php" method="POST">  
      <input autocomplete="new-email" type="text" name="email" placeholder="Epost-address" >
      <input autocomplete="new-password" type="password" name="password" placeholder="Lösenord" >
      <button>Logga in</button>
    </form>
  </div>
  <?php require('incs/footer/footer.php') ?>
</body>
</html>
