<?php 
  // Getting all orders from database    
  $stmtFindOrders = $db->prepare("SELECT * FROM users JOIN orders ON users.user_id = orders.user_id JOIN productsOrders ON orders.order_id = productsOrders.order_id JOIN products ON productsOrders.product_id = products.product_id");
  $stmtFindOrders->execute();
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
      <?php 
        if(!empty($_SESSION['user'])){
          if($_SESSION['admin'] === 'TRUE'){
            while($orders = $stmtFindOrders->fetch()) { 
              echo <<<ORDERS
              <div>            
                <h3>{$orders['user_email']}</h3>
                <h3>{$orders['product_name']}</h3>            
              </div> 
ORDERS;
            }
          } else {
            echo "Du har inte tillgång till denna sida. Du måste vara <strong>administratör</strong>.";
          }      
        } else {
          echo "Du måste <a href=index.php?pageid=login>logga in</a> och vara <strong>administratör</strong> för att kunna se denna sida";
        }
      ?>    
  </body>
</html>
