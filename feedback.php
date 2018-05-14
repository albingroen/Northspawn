<?php   
  $feedbacks = $db->prepare("SELECT * FROM feedback");
  $feedbacks->execute();

  $title = "Northspawn - feedback"; 
?>
<ul>
<?php 
  if(!empty($_SESSION['user'])){
    if($_SESSION['admin'] === 'TRUE'){
      echo "<div class=orders-wrapper>";
      echo "<div class=orders>";
      while($feedback = $feedbacks->fetch()){
        echo <<<ORDERS
        <div class="order">
          <h2>{$feedback['text']}</h2>
          <h3>{$feedback['author']}</h3>
        </div>
ORDERS;
      }
      echo "</div>";
      echo "</div>";
    } else {
      echo "Du har inte tillgång till denna sida. Du måste vara <strong>administratör</strong>.";
    }      
  } else {
    echo "Du måste <a href=index.php?pageid=login>logga in</a> och vara <strong>administratör</strong> för att kunna se denna sida";
  }
?>
</ul>

<style>
  <?php include('./styles/feedback/style.css') ?>
</style>
