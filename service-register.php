<?php 
include("./inc/header.php");  


error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
   header("Location: index.php");
}

//  =======Validate and store all user input data to database================================
    $s_passwordError = "";
    $s_emailError = "";
    $s_success ="";
    $s_error = "";

if(isset($_POST['submit'])) {

    $s_name = $_POST['s_name'];
    $s_phone = $_POST['s_phone'];
    $s_email = $_POST['s_email'];
    $s_website = $_POST['s_website'];
    $s_address = $_POST['s_address'];
    $s_suburb = $_POST['s_suburb'];
    $s_postcode = $_POST['s_postcode'];
    $s_state = $_POST['s_state'];
    $s_country = $_POST['s_country'];
    $s_operatingHours = $_POST['s_operating-hours'];
    $s_supportType = $_POST['s_support-type'];
    $s_serviceEligibility = $_POST['s_service-eligibility'];
    $s_phoneRechargeAvailability = $_POST['s_recharge'];
    $s_servicesAvailable = $_POST['s_services-available'];
    $s_password = sha1($_POST['s_password']);
    $s_confirmPassword = sha1($_POST['s_confirm-password']);
    $s_img = $_POST['s_img'];
    

    if ($s_password == $s_confirmPassword) {
		$sql = "SELECT * FROM services WHERE email='$s_email'";

		//Prepare the SQL statement.
        $stmt = $conn->prepare($sql);

        //Bind our email value to the :email parameter.
        $stmt->bindValue(':s_email', $s_email);

        //Execute the statement.
        $stmt->execute();

        //Fetch the row / result.
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($row == false) {
             
			$sql = "INSERT INTO services (name, phone, email, website, address, suburb, postcode, state, country, operating_hours, 
                                        support_type, service_eligibility,  phone_recharge_availability, services_available, password) 
                                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);

            $result = $stmt->execute([$s_name, $s_phone, $s_email, $s_website, $s_address, $s_suburb, $s_postcode, $s_state, $s_country, 
                                     $s_operatingHours, $s_supportType, $s_serviceEligibility, $s_phoneRechargeAvailability, $s_servicesAvailable, $s_password]);
        
			if ($result) {
				$s_success = "Registration Completed Successfully";

				$s_name = $s_phone = $s_email = $s_website = $s_address = $s_suburb = $s_postcode = $s_state = $s_country = $s_operatingHours = $s_supportType = $s_serviceEligibility = $s_phoneRechargeAvailability = $s_servicesAvailable = $s_password = "";
				
                $_POST['s_password'] = "";
				$_POST['s_confirm-password'] = "";
			} else {
				$s_error = "Something Wrong Went";
			}
		} else {
			$s_emailError = "* Email Already Exists";
	    }	
	} else {
		$s_passwordError = "* Passwords Don't Match";
	}
} // End of POST check
?>

<main>   
    <section class="registration">
        <div class="registration-wrapper">  
            
            <!-- User registration -->
            <div id="users" class="tabcontent user">
                <div class="form-container">
                    <div class="form-heading">
                        <h2>Services Registration Form</h2>
                        <span class="error"><?php echo $s_error; ?></span>
                        <div class="success"><?php echo $s_success; ?></div>
                    </div>

                    

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

                    <!-- Name input -->
                    <div class="row">
                        <div class="label-column">
                            <label for="s_name">Name</label>
                        </div>
                        <div class="input-column">
                            <input type="text" id="s_name" name="s_name" placeholder="Your name.." value="<?php echo $s_name; ?>" required>
                        </div>
                    </div>
                    

                    <!-- Phone input -->
                    <div class="row">
                        <div class="label-column">
                            <label for="s_phone">Phone</label>
                        </div>
                        <div class="input-column">
                            <input type="text" id="s_phone" name="s_phone" placeholder="Your phone.." value="<?php echo $s_phone; ?>" required>
                        </div>
                    </div>

                    <!-- Email input -->
                    <div class="row">
                        <div class="label-column">
                            <label for="s_email">Email</label>
                        </div>
                        <div class="input-column">
                            <input type="text" id="s_email" name="s_email" placeholder="Your email.." value="<?php echo $s_email; ?>" required>
                        </div><span class="error"><?php echo $s_emailError; ?></span>
                    </div>

                    <!-- Website input -->
                    <div class="row">
                        <div class="label-column">
                            <label for="s_website">Website</label>
                        </div>
                        <div class="input-column">
                            <input type="text" id="s_website" name="s_website" placeholder="Your website.." value="<?php echo $s_website; ?>" required>
                        </div>
            
                    </div>

                    <!-- Address input -->
                    <div class="row">
                        <div class="label-column">
                            <label for="s_address">Address</label>
                        </div>
                        <div class="input-column">
                            <input type="text" id="s_address" name="s_address" placeholder="Your address.." value="<?php echo $s_address; ?>" required>   
                        </div>
                    </div>

                    <!-- Suburb input -->
                    <div class="row">
                        <div class="label-column">
                            <label for="s_suburb">Suburb</label>
                        </div>
                        <div class="input-column">
                            <input type="text" id="s_suburb" name="s_suburb" placeholder="Your suburb.." value="<?php echo $s_suburb; ?>" required>   
                        </div>
                    </div>


                    <!-- Postcode input -->
                    <div class="row">
                        <div class="label-column">
                            <label for="s_postcode">Postcode</label>
                        </div>
                        <div class="input-column">
                            <input type="text" id="s_postcode" name="s_postcode" placeholder="Your postcode.." value="<?php echo $s_postcode; ?>" required>
                        </div>
                    </div>

                    <!-- State input -->
                    <div class="row">
                        <div class="label-column">
                            <label for="s_state">State</label>
                        </div>
                        <div class="input-column">
                            <select id="s_state" name="s_state" value="<?php echo $s_state; ?>" required>
                                <option value="nsw">New South Wales</option>
                                <option value="qld">Queensland</option>
                                <option value="vic">Victoria</option>
                                <option value="sa">South Australia</option>
                                <option value="wa">Western Australia</option>
                                <option value="act">Australian Capital Territory</option>
                                <option value="nt">Northern Territory</option>
                            </select>
                        </div>
                    </div>

                    <!-- Country input -->
                    <div class="row">
                        <div class="label-column">
                            <label for="s_country">Country</label>
                        </div>
                        <div class="input-column">
                            <select id="s_country" name="s_country" value="<?php echo $s_country; ?>" required>
                                <option value="aus">Australia</option>
                                <option value="nz">New Zealand</option>
                            </select>
                        </div>
                    </div>

                    <!-- Operating hours input -->
                    <div class="row">
                        <div class="label-column">
                            <label for="s_operating-hours">Operating hours</label>
                        </div>
                        <div class="input-column">
                            <input type="text" id="s_operating-hours" name="s_operating-hours" placeholder="Your operating hours.." value="<?php echo $s_operatingHours; ?>" required>
                        </div>
                    </div>

                    <!-- Support type input -->
                    <div class="row">
                        <div class="label-column">
                            <label for="s_support-type">Support Type</label>
                        </div>
                        <div class="input-column">
                            <input type="text" id="s_support-type" name="s_support-type" placeholder="Your support type.." value="<?php echo $s_supportType; ?>" required>
                        </div>
                    </div>

                    <!-- Service eligibility input -->
                    <div class="row">
                        <div class="label-column">
                            <label for="s_service-eligibility">Service Eligibility</label>
                        </div>
                        <div class="input-column">
                            <input type="text" id="s_service-eligibility" name="s_service-eligibility" placeholder="Your service eligibility.." value="<?php echo $s_serviceEligibility; ?>" required>
                        </div>
                    </div>

                    <!-- Phone recharge availibility input -->
                    <div class="row">
                        <div class="label-column">
                            <label for="s_recharge">Phone Re-Charge</label>
                        </div>
                        <div class="input-column">
                            <input type="text" id="s_recharge" name="s_recharge" placeholder="Your phone recahrge status.." value="<?php echo $s_phoneRechargeAvailability; ?>" required>
                        </div>
                    </div>
                    
                    <!-- Services available input -->
                    <div class="row">
                        <div class="label-column">
                            <label for="s_services-available">Services Available</label>
                        </div>
                        <div class="input-column">
                            <input type="text" id="s_services-available" name="s_services-available" placeholder="Your services available.." value="<?php echo $s_servicesAvailable; ?>" required>
                        </div>
                    </div>


                    <!-- Password input -->
                    <div class="row">
                        <div class="label-column">
                            <label for="s_password">Password</label>
                        </div>
                        <div class="input-column">
                            <input type="password" id="s_password" name="s_password" placeholder="Your password.." value="<?php echo $_POST['s_password']; ?>" required>
                        </div>
                    </div>

                    <!-- Confirm Password input -->
                    <div class="row">
                        <div class="label-column">
                            <label for="s_confirm-password">Confirm Password</label>
                        </div>
                        <div class="input-column">
                            <input type="password" id="s_confirm-password" name="s_confirm-password" placeholder="Confirm your password.." value="<?php echo $_POST['s_confirm-password']; ?>" required>
                        </div>
                        <span class="error"><?php echo $s_passwordError; ?></span>
                    </div>

                   

                    <br>
                    <div class="row">
                        <input type="submit" value="submit" name="submit">
                    </div>
                    </form>
                </div>
            </div> <!-- User registration -->
        </div>
    </section>
</main>

<?php   include("./inc/footer.php");  ?>