<?php 
  
  if(!empty($_POST['product'])){    
    $userIdStmt = $db->prepare("SELECT user_id FROM users WHERE user_email = '{$_SESSION['user']}' ");
    $userIdStmt->execute();
    $userId = $userIdStmt->fetch();
    $userId = $userId[0];  

    // Placing a new user with user_id
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
?>
<h2>Ditt köp har gått igenom</h2>
<ul>
  
</ul>
