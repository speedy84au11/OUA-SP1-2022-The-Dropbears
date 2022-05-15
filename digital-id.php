<?php   include("./inc/header.php");  ?>

<div class="d-id-wrapper">
    
    <section class="d-id-top">
        <ul class="breadcrumb">
            <li><a href="index.php">Home/</a></li>
            <li><a href="Digital-id.php">Digital Identification</a></li>
        </ul>
    </section>

    <div id="digital-id">
        <div class="digital-id-content">

        <?php
            if(isset($_SESSION['u_id'])) { ?>

                <div class="d-id-g1"> <?php 
                
                    if ($_SESSION['img'] != NULL) { ?> 
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($_SESSION['img']); ?>" title="description"></img> <?php
                    } else {
                        ?> <img src="./img/alternative_user.jpg" title="description"></img> <?php
                    }?><?php 
                    
                    if ($_SESSION['gender_orientation'] != "heterosexual") { ?>
                        <div class="rainbow"><span>LGBTQ+</span></div> <?php 
                    } ?>
                </div>
                <div class="d-id-g2">
                    <p><span>Name:</span><?php echo " " . $_SESSION['fname'] . " " . $_SESSION['mname'] . " " . $_SESSION['lname']; ?></p>
                    <p><span>D.O.B:</span><?php echo " " . $_SESSION['dob']; ?></p>
                    <p><span>Gender:</span><?php echo " " . $_SESSION['gender']; ?></p>
                    <p><span>Location:</span><?php echo " " . $_SESSION['state']; ?></p>
                    <p><span>Id Number:</span><?php echo " " . $_SESSION['u_id']; ?></p>
                    <p><span>Centrelnk CRN:</span><?php echo " " . $_SESSION['centerlink_crn']; ?></p>
                    <p><span>Expiry:</span><?php echo " " . $_SESSION['dob']; ?></p>
               </div> <?php

            } else if (isset($_SESSION['s_id'])) { ?>
                <div class="d-id-g1"> <?php 
                    if ($_SESSION['img'] != NULL) { ?> 
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($_SESSION['img']); ?>" title="description"></img> <?php
                    } else {
                        ?> <img src="./img/alternative_user.jpg" title="description"></img> <?php
                    }?>
            </div>

            <div class="d-id-g2">
                <p><span>Name:</span><?php echo " " . $_SESSION['name'];?></p>
                <p><span>Support Type:</span><?php echo " " . $_SESSION['support_type']; ?></p>
                <p><span>Location:</span><?php echo " " . $_SESSION['state']; ?></p>
                <p><span>Id Number:</span><?php echo " " . $_SESSION['s_id']; ?></p>
                <p><span>Website:</span><?php echo " " . $_SESSION['website']; ?></p>
           </div> <?phpte: " . $_SESSION['website']; ?></p> <?php
            } ?>
        </div>
    </div>
</div>

<?php   include("./inc/footer.php");  ?>