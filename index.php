<?php   include("./inc/header.php");  ?>

<main>

    <?php
        if(!isset($_SESSION['name'])) { 
            ?>
                <!-- Content for the help buttons -->
                <section class="objective-content">
                    <p class="small-heading">Our Service</p>
                    <h4>Our Main Focus</h4>

                    <div class="help-buttons-wrapper">
                        <div class="can-content">
                            <a href="user-register.php">I Need Help</a>
                            <p>Connecting people</p>
                        </div>
                        <div class="will-content">
                            <a href="service-register.php">I Will Help</a>
                            <p>Connecting services</p>
                        </div>
                    </div>
                </section>
            <?php
        }
    ?>

    <!-- Content for the services section -->
    <section class="service">
        <p class="small-heading">Services</p>
        <h4>Services we have on board</h4>

        <!-- service wrapper -->
        <div class="service-wrapper">
  
        <?php
            //Database querry which retreives data from services table
            if(isset($_POST['search-submit'])) {

                // Create query using search input
                $search = $_POST['search'];
                $sql = $conn->prepare('SELECT * FROM services WHERE name LIKE :keyword OR support_type LIKE :keyword OR state LIKE :keyword OR suburb LIKE :keyword');
                $sql->bindValue(':keyword' , '%' . $search . '%', PDO::PARAM_STR);
                $sql->execute();
                $services = $sql->fetchAll();
                $rows = $sql->rowCount();

                    // If there are results display them
                if($rows != 0) {
                    foreach($services as $service) {
                        $id = $service['id'];
                        $name = $service['name'];
                        $phone = $service['phone'];
                        $email = $service['email'];
                        $address = $service['address'];
                        $suburb = $service['suburb'];
                        $postcode = $service['postcode'];
                        $state = $service['state'];
                        $country = $service['country'];
                        $hours = $service['operating_hours'];
                        $website = $service['website'];
                        $supportType = $service['support_type'];
                        $img = $service['img'];
                        ?>
                        
                        <!-- Individual service cards -->
                    <div class="service-content">
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($img); ?>" title="description"></img>
                        <div class="service-name-wrapper">
                            <p class="service-name service-link" ><?php echo $name?></p>
                        </div>
                        <p class="service-type" style="font-size: 1.2rem">Service Type</p>
                        <p class="service-text" style="font-size: .8rem"><?php echo ($supportType); ?></p>
                        <a href="service.php?id=<?php echo $id; ?> "><button>View Service</button></a>
                        <p class="service-location" style="margin-top: 15px"><?php echo ( $suburb . ", " . $state); ?></p>
                    </div> <!-- Individual service cards --> <?php
                    }
                } else {
                    echo '<h4 class="small-heading">No results found for your match!</h4>';
                }
            } else {

                // Create query to select all data in the services table
                $sql ='SELECT * FROM services';
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $services = $stmt->fetchAll();
                
                $count = 0;
                foreach($services as $service) {
                    $id = $service['id'];
                    $name = $service['name'];
                    $phone = $service['phone'];
                    $email = $service['email'];
                    $address = $service['address'];
                    $suburb = $service['suburb'];
                    $postcode = $service['postcode'];
                    $state = $service['state'];
                    $country = $service['country'];
                    $hours = $service['operating_hours'];
                    $website = $service['website'];
                    $supportType = $service['support_type'];
                    $img = $service['img'];
                    ?>
                    
                    <!-- Individual service cards -->
                    <div class="service-content">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($img); ?>" title="description"></img>
                        <div class="service-name-wrapper">
                            <p class="service-name service-link" ><?php echo $name?></p>
                        </div>
                        <p class="service-type" style="font-size: 1.2rem">Service Type</p>
                        <p class="service-text" style="font-size: .8rem"><?php echo ($supportType); ?></p>
                        <a href="service.php?id=<?php echo $id; ?> "><button>View Service</button></a>
                        <p class="service-location" style="margin-top: 15px"><?php echo ( $suburb . ", " . $state); ?></p>
                    </div> <!-- Individual service cards --> <?php

                    if(++$count == 6) {
                        break;
                    }
                }
            }?>
        </div><!-- services wrapper -->
    </section>

    <!-- Content for the testimonial section -->
    <section class="testimonial">
        <p class="small-heading">Testamonials</p>
        <h4>Our Success Stories</h4>
        <div class="testimonial-wrapper">

            <!-- Individual testimonal cards -->
            <div class="testimonial-content">
                <img src="./img/john.jpg" alt="">
                <p class="test-text">
                    CVivamus integer non suscipit taciti mus etiam at primis tempor sagittis sit, 
                    euismod libero facilisi aptent elementum. 
                </p>
                <p class="test-name">John Smith</p>
                <p class="test-location">Sydney, NSW</p>
            </div> <!-- Individual testimonal cards -->

            <!-- Individual testimonal cards -->
            <div class="testimonial-content">
                <img src="./img/john.jpg" alt="">
                <p class="test-text">
                    CVivamus integer non suscipit taciti mus etiam at primis tempor sagittis sit, 
                    euismod libero facilisi aptent elementum. 
                </p>
                <p class="test-name">John Smith</p>
                <p class="test-location">Sydney, NSW</p>
            </div> <!-- Individual testimonal cards -->

            <!-- Individual testimonal cards -->
            <div class="testimonial-content">
                <img src="./img/john.jpg" alt="">
                <p class="test-text">
                    CVivamus integer non suscipit taciti mus etiam at primis tempor sagittis sit, 
                    euismod libero facilisi aptent elementum. 
                </p>
                <p class="test-name">John Smith</p>
                <p class="test-location">Sydney, NSW</p>
            </div> <!-- Individual testimonal cards -->  
        </div>
</section>
</main>
<?php   include("./inc/footer.php");  ?>