<?php   

include("./inc/header.php");  

$id = $_GET['id'];
?>

   <div class="services-top">
        <ul class="breadcrumb">
            <li><a href="index.php">Home/</a></li>
            <li><a href="">Service</a></li>
        </ul>
    </div>
<section class="service-page-wrapper"> 

   <?php
   
      $sql = "SELECT * FROM services WHERE id='$id'";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $services = $stmt->fetchAll();

      foreach($services as $service) {
         $id = $service['id'];
         $name = $service['name'];
         $phone = $service['phone'];
         $email = $service['email'];
         $website = $service['website'];
         $address = $service['address'];
         $suburb = $service['suburb'];
         $postcode = $service['postcode'];
         $state = $service['state'];
         $country = $service['country']; 
         $daysOpen = $service['days_open'];
         $operatingHours = $service['operating_hours'];
         $supportType = $service['support_type'];
         $serviceEligibility = $service['service_eligibility'];
         $phoneRechargeAvailability = $service['phone_recharge_availability'];
         $servicesAvailable= $service['services_available'];
         $img = $service['img'];
      ?>
         
         <div class="service-page-content">

               
               <?php if ($img != NULL) {
                     ?> <img src="data:image/jpeg;base64,<?php echo base64_encode($img); ?>" title="description"></img> <?php
               } else {
                     ?> <img src="./img/alternative.jpg" title="description"></img> <?php
               }?>

               <div class="service-heading"><?php echo $name?></div>
               
               <article class="service-article">
                  <div class="article-item"><p>Address</p></div>
                  <div class="article-content"><p><?php echo $address . " " . $suburb . ", " .$state; ?></p></div>  
               </article> 
               
               <article class="service-article">
                  <div class="article-item"><p>Phone</p></div>
                  <div class="article-content"><p><?php echo $phone; ?></p></div>  
               </article>  
               
               <article class="service-article">
                  <div class="article-item"><p>Email</p></div>
                  <div class="article-content"><p><?php echo $email; ?></p></div>  
               </article>  

               <article class="service-article">
                  <div class="article-item"><p>Hours</p></div>
                  <div class="article-content"><p><?php echo $daysOpen . " " . $operatingHours; ?></p></div>  
               </article> 

               <article class="service-article">
                  <div class="article-item"><p>Type</p></div>
                  <div class="article-content"><p><?php echo $supportType; ?></p></div>  
               </article> 

               <article class="service-article">
                  <div class="article-item"><p>Services:</p></div>
                  <div class="article-content"><p><?php echo $servicesAvailable; ?></p></div>  
               </article>                             
         </div> <!-- Individual service cards --> <?php
         }
   ?>
</section>

<?php   include("./inc/footer.php");  ?>