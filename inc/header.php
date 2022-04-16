<?php 

include("./tools.php"); 

session_start();

error_reporting(0);

$currentUser ="";

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = sha1($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

	//Prepare the SQL statement.
    $stmt = $conn->prepare($sql);

    //Bind our email value to the :email parameter.
    $stmt->bindValue(':email', $email);

    //Execute the statement.
    $stmt->execute();

    //Fetch the row / result.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);


    if ($row == true) {
		$_SESSION['name'] = $row['fname'];
        $currentUser = $_SESSION['name'];  
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b4eff55874.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <title>The Connected App</title>
</head>
<body>
    <header>

        <!-- Top bar content -->
        <div class="top-bar">

            <!-- Language Selector -->
            <div class="topbar-content">
            
            <!-- If seesion is started display user information. -->
            <?php
                if(isset($_SESSION['name'])) { ?>
                    <div class="user-content">
                        <p onclick="openUserContent()"> <?php echo ('Welcome ' . $_SESSION['name']); ?></p>
                        <ul id="user-content-dropdown">
                            <li><a href="">My Account</a></li>
                            <li><a href="">Edit Detail</a></li>
                            <li><a href="logout.php">Log Out</a></li>
                        </ul>
                    </div> <?php
                }?>
            </div>

            <!--Search Form -->
            <form class="search-container" action="">
                <input class="input" type="text" placeholder="Search Here....">
                <button class="search-button"><i class="fa fa-search"></i></button>
            </form>

            <?php
                if(!isset($_SESSION['name'])) { ?>

                    <!-- Mobilesign in button -->
                    <button class="mobile-sign-in" onclick="openLogin()">Sign In</button> <?php
                }
            ?>
        </div> <!-- top-bar -->


        <!-- Nav bar -->
        <nav>
            <!--Logo bar -->
            <div class="logo-bar">

            <!-- Logo image -->
            <img src="./img/heart-logo.jpg" alt="">

            <!-- If seesion is not started display sign in button. -->
            <?php
                if(!isset($_SESSION['name'])) { ?>

                    <!-- Main sign in button -->
                    <button class="sign-in" onclick="openLogin()">Sign In</button> <?php
                }
            ?>

            <!-- Mobile Menu -->
            <div class="mobile-menu" onclick="toggleMenu()">
                <svg class="mobile-menu" viewBox="0 0 100 80" width="30" height="30">
                    <rect width="100" height="12" style="fill:#0B74BD"></rect>
                    <rect y="30" width="100" height="12" style="fill:#0B74BD"></rect>
                    <rect y="60" width="100" height="12" style="fill:#0B74BD"></rect>
                </svg>
            </div> <!-- Mobile Menu -->

            </div> <!--logo-bar -->

            <!--Menu bar-->
            <ul class="menu-bar">
                <!-- Menu bar links -->
                <li class="menu-item"><a href="index.php">Home</a></li>
                <li class="menu-item"><a href="services.php">Services</a></li>
                <li class="menu-item"><a href="shop.php">Shop</a></li>
                <li class="menu-item"><a href="about.php">About</a></li>
                <li class="menu-item"><a href="forum.php">Forum</a></li>
                <li class="menu-item"><a href="contact.php">Contact</a></li>
            </ul> 
        </nav>   

        <!-- mobile side menu -->
        <div id="mobile-menu-container" >
            <ul class="mobile-menu-content">
                <li class="mobile-menu-item close"><a href="">Close</a></li>

                <!-- Clear floated element -->
                <div class="clearfix"></div>

                <!--mobile menu links -->
                <li class="mobile-menu-item"><a href="index.php">Home</a></li>
                <li class="mobile-menu-item"><a href="services.php">Services</a></li>
                <li class="mobile-menu-item"><a href="shop.php">Shop</a></li>
                <li class="mobile-menu-item"><a href="about.php">About</a></li>
                <li class="mobile-menu-item"><a href="forum.php">Forum</a></li>
                <li class="mobile-menu-item"><a href="contact.php">Contact</a></li>
            </ul>
        </div> <!-- mobile side menu -->

        <!-- Login tab -->
        <div id="sign-in-tab">
            <div class="sign-in-tab-content">
            <div class="close-login" onclick="closeLogin()">
                <svg class="cross"  height="18" width="18">
                    <line x1="0" y1="0" x2="18" y2="18" style="stroke:#0B74BD;stroke-width:3" />
                    <line x1="18" y1="0" x2="0" y2="18" style="stroke:#0B74BD;stroke-width:3" />
                </svg>
            </div>
            
                <h4>Sign In</h4>
                <form action="index.php" method="POST">

                    <div class="email">
                        <input type="text" id="email" name="email" placeholder="Your Email">
                    </div>
                    

                    <div class="password">
                        <input type="text" id="password" name="password" placeholder="Your Password">
                    </div>
                    
                    <button type="submit"  name="submit">Sign In</button>
                    <p>Forgot Password?</p>
                </form>
            </div>
        </div> <!-- Login tab -->
    </header>