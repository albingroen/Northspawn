<div class="content">
<a href="index.php" class="back">Tillbaks</a>
  <img class="logo" src="./imgs/Northspawn_logo_vit.png" alt="">
  <h2>Logga in på Northspawn</h2>
  <form action="index.php"" method="POST">  
    <input autocomplete="new-email" type="text" name="email" placeholder="Epost-address" >
    <input autocomplete="new-password" type="password" name="password" placeholder="Lösenord" >
    <input type="hidden" name="loginCheck" value="true" >
    <button>Logga in</button>
  </form>
</div>

<style>
  <?php include('styles/login/style.css') ?>
</style>
