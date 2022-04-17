<?php   include("./inc/header.php");  ?>

<main>
    <!-- Content for the services section -->
    <section class="service">
        <p class="small-heading">Services</p>
        <h4>Services we have on board</h4>

        <!-- testimonal wrapper -->
        <div class="service-wrapper">
            
        <?php
            //Database querry which retreives data from services table
            if(isset($_POST['submit'])) {

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
                        ?>
                        
                        <!-- Individual service cards -->
                        <div class="service-content">
                            <iframe src=" <?php echo $website; ?>"  title="description"></iframe>
                            <p class="service-type" style="font-size: 1.2rem">Service Type</p>
                            <p class="test-text" style="font-size: .8rem"><?php echo ($supportType); ?></p>
                            <a href="service.php?id=<?php echo $id; ?> " class="test-name service-link" ><?php echo $name?></a>
                            <p class="test-location" style="margin-top: 15px"><?php echo ( $suburb . ", " . $state); ?></p>
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
                    ?>
                    
                    <!-- Individual service cards -->
                    <div class="service-content">
                        <iframe src=" <?php echo $website; ?>"  title="description"></iframe>
                        <p class="service-type" style="font-size: 1.2rem">Service Type</p>
                        <p class="test-text" style="font-size: .8rem"><?php echo ($supportType); ?></p>
                        <a href="service.php?id=<?php echo $id; ?> " class="test-name service-link" ><?php echo $name?></a>
                        <p class="test-location" style="margin-top: 15px"><?php echo ( $suburb . ", " . $state); ?></p>
                    </div> <!-- Individual service cards --> <?php

                    if(++$count == 10) {
                        break;
                    }
                }
            }?>
        </div><!-- service wrapper -->
    </section>        
</main>

<?php include("./inc/footer.php"); ?>