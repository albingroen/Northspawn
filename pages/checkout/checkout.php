<?php 

  $userIdStmt = $db->prepare("SELECT user_id FROM users WHERE user_email = '{$_SESSION['user']}' ");
  $userIdStmt->execute();
  $userId = $userIdStmt->fetch();
  $userId = $userId[0];  

  $paidTrue = $db->prepare("UPDATE orders SET paid = 'TRUE' WHERE user_id = '{$userId}'");
  $paidTrue->execute();


?>

<h1>Ditt köp har gått igenom</h1>
