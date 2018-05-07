<div class="content">
<a href="index.php" class="back">Tillbaks</a>
<img class="logo" src="./imgs/Northspawn_logo_vit.png" alt="">
<h2>Registrera hos Northspawn</h2>
  <form action="index.php?pageid=login" method="POST">
    <input type="text" name="firstName" placeholder="Förnamn" >
    <input type="text" name="lastName" placeholder="Efternamn" >
    <input autocomplete="new-email" type="text" name="email" placeholder="Epost-address" >
    <input autocomplete="new-password" type="password" name="password" placeholder="Lösenord" >    
    <br>
   
    <button>Registrera</button>
  </form>
</div>
<style>
  <?php include('styles/register/style.css') ?>
</style>

