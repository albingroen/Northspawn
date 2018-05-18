<?php ?>

<div class="content">
  <form action="index.php#news" method="POST">
    <input type="text" name="title" placeholder="Titel">
    <textarea name="text" placeholder="Text"></textarea>
    <input type="text" name="author" value=<?php echo $displayUser; ?> placeholder="Författare" >
    <button>Lägg till nyhet</button>
  </form>
</div>

<style>
  <?php include('style.css'); ?>
</style>
