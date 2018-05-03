<?php 

  // Connect to the database
  $db = new PDO("sqlite:Northspawn.db");

  $stmt = $db->prepare("PRAGMA foreign_keys = on");
  $stmt->execute();
  
  // Prepare
  // $stmt = $db->prepare("SELECT order_id, user_firstName, product_name FROM users JOIN orders ON users.user_id = orders.user_id JOIN productsOrders ON orders.order_id = productsOrders.order_id JOIN products ON productsOrders.product_id = products.product_id");
  $stmt = $db->prepare("SELECT orders.order_id, users.user_firstName, users.user_email, products.product_name FROM users JOIN orders ON users.user_id = orders.user_id JOIN productsOrders ON orders.order_id = productsOrders.order_id JOIN products ON productsOrders.product_id = products.product_id");
  
  // Execute
  $stmt->execute();
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard</title>
</head>
  <body>
  <h1>Orders</h1>
    <ul>
      <?php 
        while($orders = $stmt->fetch()) { 
          echo <<<ORDERS
          <div>
            <h3>{$orders['user_firstName']}</h3>
            <h3>{$orders['user_email']}</h3>
            <h3>{$orders['product_name']}</h3>
            
          </div> 
ORDERS;
        }
      ?>
    </ul>
    
  </body>
</html>
