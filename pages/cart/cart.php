<?php 
  
  if(!empty($_POST['product'])){    
    $userIdStmt = $db->prepare("SELECT user_id FROM users WHERE user_email = '{$_SESSION['user']}' ");
    $userIdStmt->execute();
    $userId = $userIdStmt->fetch();
    $userId = $userId[0];  

    // Placing a new user with user_id
    // Om det inte finns en paid=False så skapa ny order. Annars använd hämta order-it:et från senaste ordern.
    $product = htmlspecialchars($_POST['product']);    
    $addUserOrder = $db->prepare("INSERT INTO orders (user_id) VALUES ($userId)");
    $addUserOrder->execute();    

    // Getting the latest order (users order) to display in cart
    $orderIdStmt = $db->prepare("SELECT order_id FROM orders ORDER BY order_id DESC LIMIT 1");
    $orderIdStmt->execute();
    $orderId = $orderIdStmt->fetch();    
    
    // Getting the order_id
    $orderId = $orderId[0];
    $productId = htmlspecialchars($_POST['product_id']);
    
    // Creating a productOrder using stmt$stmt3 details retrieved
    $productOrder = $db->prepare("INSERT INTO productsOrders (product_id, order_id) VALUES ({$productId}, {$orderId})");
    $productOrder->execute();
  }

  $orders = $db->prepare("SELECT * FROM users JOIN orders ON users.user_id = orders.user_id JOIN productsOrders ON orders.order_id = productsOrders.order_id JOIN products ON productsOrders.product_id = products.product_id WHERE user_email = '{$_SESSION['user']}' AND orders.paid = 'FALSE'");
  $orders->execute();

?>
<h2>Kundvagn</h2>
<ul>
  <?php 
    while($order = $orders->fetch()){
      echo "<li>{$order['product_name']}</li>";
    }
  ?>
  <form action="index.php?pageid=checkout" method="post" >
    <button>Köp</button>
  </form>
</ul>
