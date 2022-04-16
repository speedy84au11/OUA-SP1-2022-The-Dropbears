<?php 
include("./inc/header.php");  

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

//  =======Validate and store all user input data to database================================
    $passwordError = "";
    $emailError = "";
    $success ="";
    $error = "";

if(isset($_POST['submit'])) {

    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = sha1($_POST['password']);
    $confirmPassword = sha1($_POST['confirm-password']);
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $genderOrientation = $_POST['gender-orientation'];
    $address = $_POST['address'];
    $suburb = $_POST['suburb'];
    $postcode = $_POST['postcode'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $centerlinkCRN = $_POST['centerlink-crn'];
    

    if ($password == $confirmPassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";

		//Prepare the SQL statement.
        $stmt = $conn->prepare($sql);

        //Bind our email value to the :email parameter.
        $stmt->bindValue(':email', $email);

        //Execute the statement.
        $stmt->execute();

        //Fetch the row / result.
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //If num is bigger than 0, the email already exists.

		if ($row == false) {
			$sql = "INSERT INTO users (fname, mname, lname, email, password, gender, dob, gender_orientation, address, suburb, 
                                        postcode, state, country, centerlink_crn) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);

            $result = $stmt->execute([$fname, $mname, $lname, $email, $password, $gender, $dob, $genderOrientation, $address, 
                                        $suburb, $postcode, $state, $country, $centerlinkCRN]);
        
			if ($result) {
				$success = "Registration Completed Successfully";
				$fname = $mname = $lname = $email = $gender = $dob = $genderOrientation = $address = $suburb = $postcode = $state = $country = $centerlinkCRN = "";
				$_POST['password'] = "";
				$_POST['confirm-password'] = "";
			} else {
				$error = "Something Wrong Went";
			}
		} else {
			$emailError = "* Email Already Exists";
		}	
	} else {
		$passwordError = "* Passwords Don't Match";
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
                        <h2>User Registration Form</h2>
                        <span class="error"><?php echo $error; ?></span>
                        <div class="success"><?php echo $success; ?></div>
                    </div>

                    

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

                    <!-- First name input -->
                    <div class="row">
                        <div class="label-column">
                            <label for="fname">First Name</label>
                        </div>
                        <div class="input-column">
                            <input type="text" id="fname" name="fname" placeholder="Your name.." value="<?php echo $fname; ?>" required>
                        </div>
                    </div>
                    

                    <!-- Middle name input -->
                    <div class="row">
                        <div class="label-column">
                            <label for="mname">Middle Name</label>
                        </div>
                        <div class="input-column">
                            <input type="text" id="mname" name="mname" placeholder="Your middle name.." value="<?php echo $mname; ?>" required>
                        </div>
                    </div>

                    <!-- Last name input -->
                    <div class="row">
                        <div class="label-column">
                            <label for="lname">Last Name</label>
                        </div>
                        <div class="input-column">
                            <input type="text" id="lname" name="lname" placeholder="Your last name.." value="<?php echo $lname; ?>" required>
                        </div>
                    </div>

                    <!-- Email input -->
                    <div class="row">
                        <div class="label-column">
                            <label for="enail">Email</label>
                        </div>
                        <div class="input-column">
                            <input type="text" id="email" name="email" placeholder="Your email name.." value="<?php echo $email; ?>" required>
                        </div>
                        <span class="error"><?php echo $emailError; ?></span>
                    </div>

                    <!-- D.O.B input -->
                    <div class="row">
                        <div class="label-column">
                            <label for="dob">Date Of Birth</label>
                        </div>
                        <div class="input-column">
                            <input type="text" id="dob" name="dob" placeholder="Your birth date.." value="<?php echo $dob; ?>" required>   
                        </div>
                    </div>

                    <!-- Gender input -->
                    <div class="row">
                        <div class="label-column">
                            <label for="gender">Gender</label>
                        </div>
                        <div class="input-column">
                            <select id="gender" name="gender" value="<?php echo $gender; ?>" required>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                    </div>

                    <!-- Gender orientation input -->
                    <div class="row">
                        <div class="label-column">
                            <label for="gender-orientation">Gender Orientation</label>
                        </div>
                        <div class="input-column">
                            <select id="gender-orientation" name="gender-orientation" value="<?php echo $genderOrientation; ?>" required>
                                <option value="heterosexual">heterosexual</option>
                                <option value="homosexual">Homosexual</option>
                                <option value="bisexual">Bisexual</option>
                            </select>
                        </div>
                    </div>


                    <!-- Address input -->
                    <div class="row">
                        <div class="label-column">
                            <label for="address">Address</label>
                        </div>
                        <div class="input-column">
                            <input type="text" id="address" name="address" placeholder="Your Address.." value="<?php echo $address; ?>" required>
                        </div>
                    </div>

                    <!-- Suburb input -->
                    <div class="row">
                        <div class="label-column">
                            <label for="suburb">Town</label>
                        </div>
                        <div class="input-column">
                            <input type="text" id="suburb" name="suburb" placeholder="Your Suburb.." value="<?php echo $suburb; ?>" required>
                        </div>
                    </div>

                    <!-- Postcode input -->
                    <div class="row">
                        <div class="label-column">
                            <label for="postcode">Postcode</label>
                        </div>
                        <div class="input-column">
                            <input type="text" id="postcode" name="postcode" placeholder="Your postcode.." value="<?php echo $postcode; ?>" required>
                        </div>
                    </div>

                    <!-- State input -->
                    <div class="row">
                        <div class="label-column">
                            <label for="state">State</label>
                        </div>
                        <div class="input-column">
                            <select id="state" name="state" value="<?php echo $state; ?>" required>
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
                            <label for="country">Country</label>
                        </div>
                        <div class="input-column">
                            <select id="country" name="country" value="<?php echo $country; ?>" required>
                                <option value="aus">Australia</option>
                                <option value="nz">New Zealand</option>
                            </select>
                        </div>
                    </div>

                    <!-- Centerlink CRN input -->
                    <div class="row">
                        <div class="label-column">
                            <label for="centerlink-crn">Centerlink CRN</label>
                        </div>
                        <div class="input-column">
                            <input type="text" id="centerlink-crn" name="centerlink-crn" placeholder="Your Centerlink CRN.." value="<?php echo $centerlinkCRN; ?>" required>
                        </div>
                    </div>

                    <!-- Password input -->
                    <div class="row">
                        <div class="label-column">
                            <label for="password">Password</label>
                        </div>
                        <div class="input-column">
                            <input type="password" id="password" name="password" placeholder="Your password.." value="<?php echo $_POST['password']; ?>" required>
                        </div>
                    </div>

                    <!-- Confirm Password input -->
                    <div class="row">
                        <div class="label-column">
                            <label for="confirm-password">Confirm Password</label>
                        </div>
                        <div class="input-column">
                            <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password.." value="<?php echo $_POST['confirm-password']; ?>" required>
                        </div>
                        <span class="error"><?php echo $passwordError; ?></span>
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