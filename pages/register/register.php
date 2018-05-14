<div class="content">
  <form action="index.php?pageid=login" method="POST">
    <input type="text" name="firstName" placeholder="Förnamn" min="2" max="268"  required >
    <input type="text" name="lastName" placeholder="Efternamn" min="2" max="268"  required >
    <input autocomplete="new-email" type="email" name="email" placeholder="Epost-address" min="10" max="268"  required >
    <input autocomplete="new-password" type="password" name="password" placeholder="Lösenord" min="5" max="268"  required >    
    <input autocomplete="new-password" type="password" name="confirm-password" placeholder="Bekräfta lösenord" min="5" max="268"  required >    
    <br>
   
    <button>Registrera</button>
  </form>
</div>
<style>
  <?php include('style.css') ?>
</style>

