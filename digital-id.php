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
                <p class="d-id-name"> <?php echo $_SESSION['fname'] . " " . $_SESSION['mname'] . " " . $_SESSION['lname']; ?></p>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($_SESSION['img']); ?>" title="description"></img>
                <p> <?php echo "Service Id: " . $_SESSION['u_id']; ?></p> 
                <p> <?php echo "Email: " . $_SESSION['email']; ?></p> <?php
            } else if (isset($_SESSION['s_id'])) { ?>
                <p class="d-id-name"> <?php echo $_SESSION['name']; ?></p>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($_SESSION['img']); ?>" title="description"></img>
                <p> <?php echo "Service Id: " . $_SESSION['s_id']; ?></p> 
                <p> <?php echo "Phone number: " . $_SESSION['phone']; ?></p> 
                <p> <?php echo "Email: " . $_SESSION['email']; ?></p> 
                <p> <?php echo "Website: " . $_SESSION['website']; ?></p> <?php
            } ?>
        </div>
    </div>
    
</div>

<?php   include("./inc/footer.php");  ?>