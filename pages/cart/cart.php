<?php 
  
  if(!empty($_POST['product'])){    
    $userIdStmt = $db->prepare("SELECT user_id FROM users WHERE user_email = '{$_SESSION['user']}' ");
    $userIdStmt->execute();
    $userId = $userIdStmt->fetch();
    $userId = $userId[0];      

    // Checking if the lastest order is paid or not
    $orderPaidStmt = $db->prepare("SELECT paid FROM orders ORDER BY order_id DESC LIMIT 1");
    $orderPaidStmt->execute();
    $orderPaid = $orderPaidStmt->fetch();
  
    $orderPaid = $orderPaid[0];
    

    if($orderPaid == 'TRUE'){
      // Placing a new user with user_id
      // Om det inte finns en paid=False så skapa ny order. Annars använd hämta order-it:et från senaste ordern.
      $product = htmlspecialchars($_POST['product']);    
      $addUserOrder = $db->prepare("INSERT INTO orders (user_id) VALUES ($userId)");
      $addUserOrder->execute();    

      // Getting the latest order (users order) to display in cart
      $orderIdStmt = $db->prepare("SELECT order_id FROM orders WHERE user_id = {$userId} ORDER BY order_id DESC LIMIT 1");
      $orderIdStmt->execute();
      $orderId = $orderIdStmt->fetch();
      
      
      // Getting the order_id
      $orderId = $orderId[0];
      $productId = htmlspecialchars($_POST['product_id']);
      
      // Creating a productOrder using stmt$stmt3 details retrieved
      $productOrder = $db->prepare("INSERT INTO productsOrders (product_id, order_id) VALUES ({$productId}, {$orderId})");
      $productOrder->execute();


      $oldProductStockStmt = $db->prepare("SELECT product_stock FROM products WHERE product_id = {$productId}");
      $oldProductStockStmt->execute();
      $oldProductStock = $oldProductStockStmt->fetch();
      $oldProductStock = $oldProductStock[0];
      // Remove 1 in stock from every item in order
      $removeStock = $db->prepare("UPDATE products SET product_stock = $oldProductStock - 1 WHERE product_id = {$productId}");
      $removeStock->execute();
    } else {
      // Getting the latest order (users order) to display in cart
      $orderIdStmt = $db->prepare("SELECT order_id FROM orders ORDER BY order_id DESC LIMIT 1");
      $orderIdStmt->execute();
      $orderId = $orderIdStmt->fetch();
      
      // Getting the order_id
      $orderId = $orderId[0];
      $productId = htmlspecialchars($_POST['product_id']);

      $productOrder = $db->prepare("INSERT INTO productsOrders (product_id, order_id) VALUES ({$productId}, {$orderId})");
      $productOrder->execute();


      $oldProductStockStmt = $db->prepare("SELECT product_stock FROM products WHERE product_id = {$productId}");
      $oldProductStockStmt->execute();
      $oldProductStock = $oldProductStockStmt->fetch();
      $oldProductStock = $oldProductStock[0];
      // Remove 1 in stock from every item in order
      $removeStock = $db->prepare("UPDATE products SET product_stock = $oldProductStock - 1 WHERE product_id = {$productId}");
      $removeStock->execute();
    }

    
  }

  $orders = $db->prepare("SELECT * FROM users JOIN orders ON users.user_id = orders.user_id JOIN productsOrders ON orders.order_id = productsOrders.order_id JOIN products ON productsOrders.product_id = products.product_id WHERE user_email = '{$_SESSION['user']}' AND orders.paid = 'FALSE'");
  $orders->execute();

?>
<div class="content">
  <div class="products">
    <?php 
      while($order = $orders->fetch()){
        echo <<<PRODUCT
        <div class="product">
          <h2>{$order['product_name']}</h2>
          <h3>{$order['product_cost']} kr</h3>
        </div>
PRODUCT;
      }
    ?>
    <form class="checkoutForm" action="index.php?pageid=checkout" method="post" >
      <button>Betala biljetter</button>
    </form>
  </div>
</div>

<style>
  <?php 
    include('style.css')
  ?>
</style>
