<?php   include("./inc/header.php");  ?>


<main class="shop-wrapper">

    <!-- Grid top section -->
    <section class="content-top">
        <ul class="breadcrumb">
            <li><a href="index.php">Home/</a></li>
            <li><a href="shop.php">Shop</a></li>
        </ul>
    </section>

    <!-- Grid left section -->
    <section class="content-left">

        <div class="content-filter">
            <h4>Categories</h4>
        </div>

        <div class="content-filter">
            <h4>Price</h4>
        </div>

        <div class="content-filter">
            <h4>On sale</h4>
        </div>
    </section>

    <!-- Grid top right section -->
    <section class="content-right-top">
        <h1>Charity Shop</h1>
    </section>


    <!-- Grid bottom right section -->
    <section class="content-right-bottom">
        <div class="product-card">
                        <?php 
                            // Create query using search input
                            $search = $_POST['search'];
                            $sql = $conn->prepare('SELECT * FROM products');
                            $sql->bindValue(':keyword' , '%' . $search . '%', PDO::PARAM_STR);
                            $sql->execute();
                            $products = $sql->fetchAll();
                            $rows = $sql->rowCount();

                            
                            foreach($products as $product) {
                                $id = $product['id'];
                                $productName = $product['product_name'];
                                $productDescription = $product['product_description'];
                                $status = $product['status'];
                                $img = $product['img'];
                                $price = $product['price'];
                        ?>
                                
                                
                                <div class="product-content">
                                    <img src="data:image/jpeg;base64,<?php echo base64_encode($img); ?>" title="description"></img>
                            <?php  if ($status == 'new') { ?>
                                    <p class="product-status new-product"><?php echo ($status); ?></p> <?php
                            } else { ?>
                                <p class="product-status old-product"><?php echo ($status); ?></p> <?php
                            } ?>
                                    
                                    <p class="product-name"><?php echo ($productName); ?></p>
                                    <p class="product-price"><?php echo ("$" . $price); ?></p>   
                                    <button>Add to cart</button>
                                </div> <!-- Individual product cards -->        
                        <?php } ?>
        </div>
    </section>
</main>



<?php   include("./inc/footer.php");  ?>