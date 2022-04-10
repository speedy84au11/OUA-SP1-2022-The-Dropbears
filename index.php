<?php   include("./inc/header.php");  ?>

<main>

    <!-- Content for the help buttons -->
    <section class="objective-content">
        <p class="small-heading">Our Service</p>
        <h4>Our Main Focus</h4>

        <div class="help-buttons-wrapper">
            <div class="can-content">
                <a href="register.php?id=user">I Need Help</a>
                <p>Connecting people in times of need to services providing help</p>
            </div>
            <div class="will-content">
                <a href="register.php?id=service">I Can Help</a>
                <p>Connecting services providing help to people in times of need</p>
            </div>
        </div>
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












<!-- Database querry which retreives the first and last name of each user and echos it to the screen -->
<?php

//try {
 //   $sql ='SELECT * FROM users';
 //   $stmt = $conn->prepare($sql);
 //   $stmt->execute();
 //   $users = $stmt->fetchAll();
    
//
 //  foreach($users as $user) {
 //       $fname = $user['fname'];
//        $lname = $user['lname'];
//       echo "$fname " . "$lname" . "<br>";
//   }
//}
//catch(PDOException $e) {
//    echo "Error: " . $e->getMessage();
//}
//$conn = null;
//echo "</table>";
?>
