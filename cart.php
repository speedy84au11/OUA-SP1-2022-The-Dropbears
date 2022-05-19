<?php   include("./inc/header.php");  ?>

<!-- =========================== Insert into cart table ========================= -->

<?php
 
if(isset($_POST['add-cart'])) {  

    $productId = $_POST['pid'];
    $price = $_POST['pprice'];
    $name = $_POST['pname'];
    $img = $_POST['pimg'];

    if(isset($_SESSION['u_id'])) {
        $buyerId = $_SESSION['u_id'];

        $sql = "SELECT * FROM cart WHERE product_id= '$productId' AND buyer_id= '$buyerId'";

    //Prepare the SQL statement.
    $stmt = $conn->prepare($sql);

    //Bind our email value to the :email parameter.
    $stmt->bindValue(':id', $cartId);
    $stmt->bindValue(':buyer_id', $buyerId);

    //Execute the statement.
    $stmt->execute();

    //Fetch the row / result.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
        if($row == false) {

            $psql = "SELECT * FROM products WHERE id= '$productId'";
            $pstmt = $conn->prepare($psql);
            $pstmt->bindValue(':id', $productId);
            $pstmt->execute();
            $prow = $pstmt->fetch(PDO::FETCH_ASSOC);
            
            try {
                $statement = $conn->prepare('INSERT INTO cart (product_id, buyer_id, price, product_name, img)
                VALUES (:product_id, :buyer_id, :price, :product_name, :img)');
    
            $statement->execute([
                'buyer_id' => $buyerId,
                'product_id' => $prow['id'],
                'price' => $prow['price'],
                'product_name' => $prow['product_name'],
                'img' => $prow['img'],
            ]);
            } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
            }
        }
    } else if(isset($_SESSION['s_id'])) {
        $buyerId = $_SESSION['s_id'];

        $sql = "SELECT * FROM cart WHERE product_id= '$productId' AND buyer_id= '$buyerId'";

    //Prepare the SQL statement.
    $stmt = $conn->prepare($sql);

    //Bind our email value to the :email parameter.
    $stmt->bindValue(':id', $cartId);
    $stmt->bindValue(':buyer_id', $buyerId);

    //Execute the statement.
    $stmt->execute();

    //Fetch the row / result.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
        if($row == false) {

            $psql = "SELECT * FROM products WHERE id= '$productId'";
            $pstmt = $conn->prepare($psql);
            $pstmt->bindValue(':id', $productId);
            $pstmt->execute();
            $prow = $pstmt->fetch(PDO::FETCH_ASSOC);
            
            try {
                $statement = $conn->prepare('INSERT INTO cart (product_id, buyer_id, price, product_name, img)
                VALUES (:product_id, :buyer_id, :price, :product_name, :img)');
    
            $statement->execute([
                'buyer_id' => $buyerId,
                'product_id' => $prow['id'],
                'price' => $prow['price'],
                'product_name' => $prow['product_name'],
                'img' => $prow['img'],
            ]);
            } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
            }
        }
    } else { ?>
        <div class="cart-error">
            <h1>Must be signed in to add to cart</h1>
        </div> <?php   
    }
}    
?>

 <!-- =========================== Retrieve data from cart table ========================= -->
 <?php 
    $sql = $conn->prepare('SELECT * FROM cart');
    $sql->execute();
    $carts = $sql->fetchAll();
?>  
    <div id="cart-wrapper">
        <div class="cart-content"> <?php

            if(isset($_POST['delete-cart'])) {
                $cid = $_POST['cid'];
                
                $sql ="DELETE FROM cart WHERE id=$cid";
                $conn->exec($sql);
                echo "<meta http-equiv='refresh' content='0'>";
            } 

            $total ="0.00";
  
            foreach($carts as $cart) {
                    $cartPrice = $cart['price'];
                    $cartName = $cart['product_name'];
                    $cartImg = $cart['img'];
                    $cartId = $cart['id'];


                if ( $cart['buyer_id'] == $_SESSION['u_id']) { ?>
                    <div class="cart-item">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($cartImg); ?>" title="No Image"></img>
                        <div class="cart-text">
                            <p class="cart-name"><?php echo ($cartName); ?></p> 
                            <p class="cart-price"><?php echo "$" . ($cartPrice); ?></p>

                            <form action="cart.php" method="POST">
                                <input type="hidden" value="<?php echo $cartId ?>" name="cid">
                                <button name="delete-cart" class="remove-cart">Remove from cart</button>
                            </form>
                            <?php $total = $total + $cartPrice; ?>
                            
                        </div>
                        
                    </div> <?php  
                }   else if ( $cart['buyer_id'] == $_SESSION['s_id']) { ?>
                    <div class="cart-item">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($cartImg); ?>" title="No Image"></img>
                        <div class="cart-text">
                            <p class="cart-name"><?php echo ($cartName); ?></p> 
                            <p class="cart-price"><?php echo "$" . ($cartPrice); ?></p>

                            <form action="cart.php" method="POST">
                                <input type="hidden" value="<?php echo $cartId ?>" name="cid">
                                <button name="delete-cart" class="remove-cart">Remove from cart</button>
                            </form>
                            <?php $total = $total + $cartPrice; ?> 
                        </div>
                    </div> <?php 
                }   
            }?>
        </div>
    </div>

    <div class="cart-total">
        <p class="cart-price"><?php echo "TOTAL PRICE: $" . ($total); ?></p>
    </div>
    
    <div class="cart-total">
        <a class="remove-cart1" href="shop.php">Continue Shopping</a> 
        <a class="remove-cart1" href="checkout.php">Checkout</a> 
    </div> 
  
<?php include("./inc/footer.php");  ?>