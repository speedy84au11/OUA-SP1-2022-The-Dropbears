<?php   

include("./inc/header.php");  

$id = $_GET['id'];
?>
<section class="temporary" style="padding-top: 35px"> 

    <?php
    
        $sql = "SELECT * FROM services WHERE id='$id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $services = $stmt->fetchAll();

        foreach($services as $service) {
            $id = $service['id'];
            echo $id . "<br>";

            $name = $service['name'];
            echo $name . "<br>";

            $phone = $service['phone'];
            echo $phone . "<br>";

            $email = $service['email'];
            echo $email . "<br>";

            $website = $service['website'];
            echo $website . "<br>";

            $address = $service['address'];
            echo $address . "<br>";

            
            $suburb = $service['suburb'];
            echo $suburb. "<br>";

            $postcode = $service['postcode'];
            echo $postcode . "<br>";

            $state = $service['state'];
            echo $state . "<br>";

            $country = $service['country'];
            echo $country. "<br>";

            $hours = $service['operating_hours'];
            echo $hours . "<br>";

            $supportType = $service['support_type'];
            echo $supportType . "<br>";

            $serviceEligibility = $service['service_eligibility'];
            echo $serviceEligibility . "<br>";

            $phoneRechargeAvailability = $service['phone_recharge_availability'];
            echo $phoneRechargeAvailability . "<br>";

            $servicesAvailable = $service['services_available'];
            echo $servicesAvailable . "<br>";
        }
    ?>
</section>

<?php   include("./inc/footer.php");  ?>