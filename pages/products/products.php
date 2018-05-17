<?php 
    $stmtProducts = $db->prepare("SELECT * FROM products");
    $stmtProducts->execute();    
?>

<div class="content">
    <div class="products">
    <?php 
        while($product = $stmtProducts->fetch()){
            echo <<<PRODUCT
            <div class="product" >
                <h3>{$product['product_name']}</h3>
                <h4>{$product['product_cost']}</h4>
                <form method="post" action="index.php?pageid=cart" >    
                    <input type="hidden" name="product" value={$product['product_name']}>
                    <input type="hidden" name="product_id" value={$product['product_id']}>
                    <input type="hidden" name="product_cost" value={$product['product_cost']}>
                    <button>Köp nu</button>
                </form>
            </div>
PRODUCT;
        }
    ?>    
    </div>
</div>

<style>
<?php include('style.css') ?>
</style>

