<?php   
  $feedbacks = $db->prepare("SELECT * FROM feedback");
  $feedbacks->execute();

  $title = "Northspawn - feedback"; 
?>
<ul>
<?php 
  if(!empty($_SESSION['user'])){
    if($_SESSION['admin'] === 'TRUE'){
      while($feedback = $feedbacks->fetch()){
        echo "<li>{$feedback['text']}<br>{$feedback['author']}</li><br>";
      }
    } else {
      echo "Du har inte tillgång till denna sida. Du måste vara <strong>administratör</strong>.";
    }      
  } else {
    echo "Du måste <a href=index.php?pageid=login>logga in</a> och vara <strong>administratör</strong> för att kunna se denna sida";
  }
?>
</ul>

