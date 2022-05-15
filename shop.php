<?php   include("./inc/header.php"); ?>

<main class="shop-wrapper">

    <!-- Grid top section -->
    <section class="content-top">
        <ul class="breadcrumb">
            <li><a href="index.php">Home/</a></li>
            <li><a href="shop.php">Shop</a></li>
            <button onclick=openListProducts() name="list-product">List a Product</button>
        </ul>

        
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
            
            $sql = $conn->prepare('SELECT * FROM products');
            $sql->execute();
            $products = $sql->fetchAll();
            $rows = $sql->rowCount();
         
            foreach($products as $product) {
                $productId = $product['id'];
                $productName = $product['product_name'];
                $productDescription = $product['product_description'];
                $status = $product['status'];
                $img = $product['img'];
                $price = $product['price']; ?>
                 
                <div class="product-content"><?php 
                
                    if ($img != NULL) {
                            ?> <img src="data:image/jpeg;base64,<?php echo base64_encode($img); ?>" title="description"></img> <?php
                        } else {
                            ?> <img src="./img/alternative.jpg" title="description"></img> <?php
                        }
                    
                    if ($status == 'new') { ?>
                        <p class="product-status new-product"><?php echo ($status); ?></p> <?php
                    } else { ?>
                        <p class="product-status old-product"><?php echo ($status); ?></p> <?php
                    } ?>
                    
                    <p class="product-name"><?php echo ($productName); ?></p>
                    <p class="product-price"><?php echo ("$" . $price); ?></p> 

                    <form action="cart.php" method="post">
                        <input type="hidden" value="<?php echo $productId ?>" name="pid">
                        <input type="hidden" value="<?php echo $price ?>" name="pprice">
                        <input type="hidden" value="<?php echo $productName ?>" name="pname">
                        
                        <button class="add-to-cart-button" name="add-cart">Add to cart</button>
                    </form>  
                    
                </div> <!-- Individual product cards -->  <?php 
            } ?>
        </div>
    </section>
</main>

<!-- =========================== Insert into cart table ========================= -->

<?php
if(isset($_POST['list-product'])) { 

    $product_catergory = $_POST['pcat'];
    $product_name = $_POST['pname'];
    $product_description = $_POST['pdesc'];
    $product_condition = $_POST['pcond'];
    $status = $_POST['pstat'];
    $price = $_POST['ppri'];
    $seller_id = $_POST['psid'];
    $sellor_type = $_POST['psty'];
    $item_sale_status = $_POST['piss'];

    $imgName = $_FILES['pimg']['name'];
    $imgData = file_get_contents($_FILES['pimg']['tmp_name']);
    $imgType = $_FILES['pimg']['type'];


    $sql = "SELECT * FROM products WHERE seller_id=? AND product_name=?";
  
        //Prepare the SQL statement.
        $stmt = $conn->prepare($sql);
        
        //Bind our email value to the :email parameter.
        $stmt->bindValue(1, $seller_id, PDO::PARAM_STR);
        
        //Bind our password value to the :password parameter.
        $stmt->bindValue(2, $product_name, PDO::PARAM_STR);
       
        //Execute the statement.
        $stmt->execute();
 
        //Fetch the row / result.
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row == false) {

                $sql = "INSERT INTO products (product_catergory, product_name, product_description, product_condition, status, price, img, seller_id, sellor_type, item_sale_status)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                $stmt = $conn->prepare($sql);

                $result = $stmt->execute([$product_catergory, $product_name, $product_description, $product_condition, $status, $price, $imgData, $seller_id, $sellor_type, $item_sale_status]);
        } 
    }
?>
                  
<section id="list-products">
    <div class="registration-wrapper">  
        
        <!-- User registration -->
        <div id="users" class="tabcontent user">
            <div class="form-container">
                <div class="form-heading">
                    <h2 class="float-r" onclick=closeListProducts()>Close</h2>
                    <h2>List Product</h2>
                </div>

                <form action="shop.php" method="POST" enctype="multipart/form-data">

                    <div class="row">
                        <div class="label-column">
                        <label for="pcat">Product Catergory</label>
                        </div>
                        <div class="input-column">
                        <input type="text" value="" name="pcat" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="label-column">
                        <label for="pcat">Product Name</label>
                        </div>
                        <div class="input-column">
                        <input type="text" value="" name="pname" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="label-column">
                        <label for="pcat">Product Description</label>
                        </div>
                        <div class="input-column">
                        <input type="text" value="" name="pdesc" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="label-column">
                        <label for="pcat">Product Condition</label>
                        </div>
                        <div class="input-column">
                        <input type="text" value="" name="pcond" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="label-column">
                        <label for="pcat">Status</label>
                        </div>
                        <div class="input-column">
                        <input type="text" value="" name="pstat" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="label-column">
                        <label for="pcat">Price</label>
                        </div>
                        <div class="input-column">
                        <input type="text" value="" name="ppri" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="label-column">
                        <label for="pcat">Sellor Type</label>
                        </div>
                        <div class="input-column">
                        <input type="text" value="" name="psty" required>
                        </div>
                    </div> <?php

                    if(isset($_SESSION['u_id'])) { ?>
                        <input type="hidden" value="<?php echo $_SESSION['u_id'] ?>" name="psid"> <?php
                    } else if(isset($_SESSION['s_id'])) {?>
                        <input type="hidden" value="<?php echo $_SESSION['s_id'] ?>" name="psid"> <?php
                        $buyerId = $_SESSION['s_id'];
                    } else  
                    ?>
                    
                    <div class="row">
                        <div class="label-column">
                        <label for="pcat">Items Sale Status</label>
                        </div>
                        <div class="input-column">
                        <input type="text" value="" name="piss" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="label-column">
                        <label for="pcat">Image</label>
                        </div>
                        <div class="input-column">
                        <input type="file" value="" name="pimg">
                        </div>
                    </div>

                    <div class="row">
                        <button name="list-product">Add Product</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>

</section>
<?php   include("./inc/footer.php");  ?>