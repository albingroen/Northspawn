<?php 
  
    $userOrders = $db->prepare("SELECT * FROM users JOIN orders ON users.user_id = orders.user_id JOIN productsOrders ON orders.order_id = productsOrders.order_id JOIN products ON productsOrders.product_id = products.product_id WHERE users.user_email = '{$_SESSION['user']}'");
    $userOrders->execute();

?>

<?php 
  if(!empty($user)){
    echo "<div class=order-wrapper>";
    echo "<div class=order>";
    while($order = $userOrders->fetch()){
      if($order['paid'] == 'TRUE'){
        echo <<<ORDERS
        <div class="orderItem">        
          <h2>{$order['product_name']}</h2>
          <p>{$order['product_desc']}</p>
        </div>  
ORDERS;
      }
    }
    echo "</div>";
    echo "</div>";
  } else {
    echo 'Du måste logga in';
  }
?>    

<style>
  <?php include('style.css') ?>
</style>
