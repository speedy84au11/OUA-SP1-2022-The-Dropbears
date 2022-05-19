<?php   include("./inc/header.php");  ?>

<?php 
    $sql = $conn->prepare('SELECT * FROM cart');
    $sql->execute();
    $carts = $sql->fetchAll();
?>  
<section class="checkout-wrapper">
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

<?php 
    if((isset($_SESSION['u_id']) or isset($_SESSION['s_id']))) { ?>

        <div class="center-paypal" style="text-align: center;">

            <!-- Replace "test" with your own sandbox Business account app client ID -->
            <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>

            <!-- Set up a container element for the button -->
            <div id="paypal-button-container" style="width: 70%;"></div>
            <script>
            paypal.Buttons({
                // Sets up the transaction when a payment button is clicked
                createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                    amount: {
                        value: '77.44' // Can also reference a variable or function
                    }
                    }]
                });
                },
                // Finalize the transaction after payer approval
                onApprove: (data, actions) => {
                return actions.order.capture().then(function(orderData) {
                    // Successful capture! For dev/demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    const transaction = orderData.purchase_units[0].payments.captures[0];
                    alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
                    // When ready to go live, remove the alert and show a success message within this page. For example:
                    // const element = document.getElementById('paypal-button-container');
                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    // Or go to another URL:  actions.redirect('thank_you.html');
                });
                }
            }).render('#paypal-button-container');
            </script>
        </div> <?php
    } ?>
</section>
    




<?php   include("./inc/footer.php");  ?>