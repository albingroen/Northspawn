<?php 
  $err = null;
  if(!empty($_GET['err'])){
    $err = 'Lösenordet eller användarnamnet stämmer inte';
  } else {
    echo null;
  }
?>

<div class="content">  
  <form action="index.php"" method="POST">  
    <input autocomplete="new-email" type="text" name="email" placeholder="Epost-address" required >
    <input autocomplete="new-password" type="password" name="password" placeholder="Lösenord" required >
    <input type="hidden" name="loginCheck" value="true" >
    <button>Logga in</button>    
  </form>
  <h4>
  <?php      
    echo $err;    
  ?>
  </h4>
</div>

<style>
  <?php 
    include("style.css");
  ?>
</style>
