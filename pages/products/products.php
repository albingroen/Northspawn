<?php 
    $stmtProducts = $db->prepare("SELECT * FROM products");
    $stmtProducts->execute();    
?>

<form method="post" action="index.php?pageid=checkout" >    
    <?php 
        while($product = $stmtProducts->fetch()){
            echo <<<PRODUCT
            <h3>{$product['product_name']}</h3>
            <h4>{$product['product_cost']}</h4>
            <input type="hidden" name="product" value={$product['product_name']}>
            <input type="hidden" name="product_id" value={$product['product_id']}>
            <button>Köp nu</button>
PRODUCT;
        }
    ?>    
</form>

