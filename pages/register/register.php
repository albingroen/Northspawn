<?php 
  $err = null;
  if(!empty($_GET['firstName']) && !empty($_GET['lastName']) && !empty($_GET['email']) && !empty($_GET['err'])){
    $firstName = htmlspecialchars($_GET['firstName']);
    $lastName = htmlspecialchars($_GET['lastName']);
    $email = htmlspecialchars($_GET['email']);
    $err = "Lösenorden matchar inte";
  } else {
    $err = null;
  }

?>

<div class="content">
  <form action="index.php?pageid=login" method="POST">
    <?php 
    if(!empty($_GET['firstName']) && !empty($_GET['lastName']) && !empty($_GET['email']) && !empty($_GET['err'])){
      echo <<<SAVEDNAMEANDEMAIL
      <input value={$firstName} type="text" name="firstName" placeholder="Förnamn" min="2" max="268"  required >
      <input value="{$lastName}" type="text" name="lastName" placeholder="Efternamn" min="2" max="268"  required >
      <input value="{$email}" autocomplete="new-email" type="email" name="email" placeholder="Epost-address" min="10" max="268"  required >
SAVEDNAMEANDEMAIL;
    } else {
      echo <<<NAMEANDEMAIL
      <input type="text" name="firstName" placeholder="Förnamn" min="2" max="268"  required >
      <input type="text" name="lastName" placeholder="Efternamn" min="2" max="268"  required >
      <input autocomplete="new-email" type="email" name="email" placeholder="Epost-address" min="10" max="268"  required >
NAMEANDEMAIL;
    }
    ?>
    <input autocomplete="new-password" type="password" name="password" placeholder="Lösenord" min="5" max="268"  required >    
    <input autocomplete="new-password" type="password" name="confirm-password" placeholder="Bekräfta lösenord" min="5" max="268"  required >    
    <br>
    <button>Registrera</button>
  </form>
  <h4>
  <?php      
    echo $err;    
  ?>
  </h4>
</div>
<style>
  <?php include("style.css"); ?>
</style>

