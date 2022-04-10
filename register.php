<?php include("./inc/header.php");  ?>
<?php $id = $_GET['id']; ?>

<main>   
    <section class="registration">
        <div class="registration-wrapper">   
            <?php 
                if($id == "user") { ?>

                    <!-- User registration -->
                    <div id="users" class="tabcontent user">
                        <div class="form-container">
                            <div class="form-heading">
                                <h2><?php echo $id . " " . "Registration Form"?> </h2>
                            </div>
                            <?php include("inc/userRegistration.php"); ?>
                        </div>
                    </div> <!-- User registration -->

                <?php } elseif ($id == "service") { ?>
                    <!-- Service registration -->
                    <div id="services" class="tabcontent">
                        <div class="form-container">
                            <div class="form-heading">
                            <h2><?php echo $id . " " . "Registration Form"?></h2>
                            </div>
                            <?php include("inc/servicesRegistration.php"); ?>
                        </div>
                    </div> <!-- Service registration -->
                <?php
                } 
            ?>
        </div>
    </section>
</main>
<?php   include("./inc/footer.php");  ?>