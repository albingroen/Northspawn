<?php 
  // Getting all orders from database    
  $stmtFindOrders = $db->prepare("SELECT * FROM users JOIN orders ON users.user_id = orders.user_id JOIN productsOrders ON orders.order_id = productsOrders.order_id JOIN products ON productsOrders.product_id = products.product_id");
  $stmtFindOrders->execute();
?>
<?php 
  if(!empty($_SESSION['user'])){
    if($_SESSION['admin'] === 'TRUE'){
      echo "<div class=order-wrapper>";
      echo "<div class=order>";
      while($order = $stmtFindOrders->fetch()){
        echo <<<ORDERS
        <div class="orderItem">
          <h2>{$order['user_email']}</h2>
          <h3>{$order['product_name']}</h3>
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
  

<style>
  <?php include('style.css'); ?>
</style>
