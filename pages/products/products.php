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
                <form method="post" action="index.php?pageid=cart" >    
                <h2>{$product['product_name']}</h2>
                <h3>{$product['product_cost']}kr/biljett</h3>        
                    <input type="hidden" name="product" value={$product['product_name']}>
                    <input type="hidden" name="product_id" value={$product['product_id']}>
                    <input type="hidden" name="product_cost" value={$product['product_cost']}>
                    <button></button>                    
                </form>              
                <i class="fas fa-arrow-right"></i>  
            </div>
PRODUCT;
        }
    ?>    
    </div>
</div>

<style>
<?php include('style.css') ?>
</style>

