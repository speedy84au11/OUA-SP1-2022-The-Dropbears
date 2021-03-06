<?php 

include("./tools.php"); 

session_start();


error_reporting(0);


if (isset($_POST['login-submit'])) {
    
	$email = $_POST['email'];
	$password = sha1($_POST['password']);

    $sql = "SELECT * FROM users WHERE email= ? AND password= ?";
	$s_sql = "SELECT * FROM services WHERE email= ? AND password= ?";

    try {

        //Prepare the SQL statement.
        $stmt = $conn->prepare($sql);
        $s_stmt = $conn->prepare($s_sql);

        //Bind our email value to the :email parameter.
        $stmt->bindValue(1, $email, PDO::PARAM_STR);
        $s_stmt->bindValue(1, $email, PDO::PARAM_STR);

        //Bind our password value to the :password parameter.
        $stmt->bindValue(2, $password, PDO::PARAM_STR);
        $s_stmt->bindValue(2, $password, PDO::PARAM_STR);

        //Execute the statement.
        $stmt->execute();
        $s_stmt->execute();

    } catch (PDOException $e) {
            echo $e->getMessage();
    }

	

    //Fetch the row / result.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $s_row = $s_stmt->fetch(PDO::FETCH_ASSOC);


    if ($row == true) {
		$_SESSION['u_id'] = $row['id'];
        $_SESSION['fname'] = $row['fname'];
        $_SESSION['dob'] = $row['dob'];
        $_SESSION['gender'] = $row['gender'];
        $_SESSION['state'] = $row['state'];
        $_SESSION['centerlink_crn'] = $row['centerlink_crn'];
        $_SESSION['mname'] = $row['mname'];
        $_SESSION['lname'] = $row['lname'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['img'] = $row['img'];
        $_SESSION['gender_orientation'] = $row['gender_orientation'];

         
	} else if ($s_row == true) {
		$_SESSION['s_id'] = $s_row['id'];
        $_SESSION['name'] = $s_row['name'];
        $_SESSION['email'] = $s_row['email'];
        $_SESSION['phone'] = $s_row['phone'];
        $_SESSION['img'] = $s_row['img'];
        $_SESSION['website'] = $s_row['website'];
        $_SESSION['support_type'] = $s_row['support_type'];
        $_SESSION['state'] = $s_row['state'];

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
    <link rel="icon" href="img/icon1.jpg">
    <title>The Connected App</title>
</head>
<body onload=maintainColor()>
    <header>

    

        <!-- Top bar content -->
        <div id="top-bar">

            <!-- Color selectors -->
            <div id="toggle-colors" onclick="openColorSelector()">Change Color</div>
            <ul id="colors">
                <li id="default" onclick="toggleDefault()"><p>Default</p></li>
                <li id="green" onclick="toggleGreen()"><p>Green</p></li>
                <li id="red" onclick="toggleRed()"><p>Red</p></li>
                <li id="black" onclick="toggleBlack()"><p>Black</p></li>
                <li id="orange" onclick="toggleOrange()"><p>Orange</p></li>
                <li id="purple" onclick="togglePurple()"><p>Purple</p></li>
            </ul>
            
            <!-- If seesion is started display user or service information. -->
            <div class="user-content">
            <?php
                if(isset($_SESSION['u_id'])) { 
                    ?> <p class="welcome-message"><span><?php echo $_SESSION['fname'] . " " . $_SESSION['lname'];?><i class="fa fa-user" onclick=openUserDropdownMenu()></i><a href="cart.php"><i class="fa fa-shopping-cart"></i></a></span></p> <?php
                } else if(isset($_SESSION['s_id'])) {  
                    ?> <p class="welcome-message"><span><?php echo $_SESSION['name'];?><i class="fa fa-user" onclick=openUserDropdownMenu()></i><a href="cart.php"><i class="fa fa-shopping-cart"></i></a></span></p> <?php
                } else { 
                    ?> <p> <?php echo ('Welcome to The Connected App '); ?></p> <?php
                } ?>
                </div>

                <div id="user-dropdown">
                   
                        <!-- Close botton for search bar -->
                        <div class="close-search" onclick="closeUserDropdownMenu()">
                            <svg class="cross"  height="18" width="18">
                                <line x1="0" y1="0" x2="18" y2="18" style="stroke-width:3" />
                                <line x1="18" y1="0" x2="0" y2="18" style="stroke-width:3" />
                            </svg>
                        </div>
                    <ul>
                        <li><a href="digital-id.php">Digital Id</a></li>
                        <li><a href="report-generator.php">Generate Report</a></li>
                        <li><a href="logout.php">Sign Out</a></li>
                    </ul>

                </div>
        </div> <!-- top-bar -->

        <!-- Nav bar -->
        <nav>
            <!--Logo bar -->
            <div class="logo-bar">
                <!-- Logo image -->
                <a href="index.php"> <img src="./img/banner2.jpg" alt=""></a>
            </div> <!--logo-bar -->

            <!--Menu bar-->
            <ul id="menu-bar">
                <!-- Menu bar links -->
                <li class="menu-item"><a href="index.php">Home</a></li>
                <li class="menu-item"><a href="services.php">Services</a></li>
                <li class="menu-item"><a href="shop.php">Shop</a></li>
                <li class="menu-item"><a href="about.php">About</a></li>
                <li class="menu-item"><a href="contact.php">Contact</a></li>
            
                 <!-- If seesion is not started display sign in button. -->
            <?php
                if(!(isset($_SESSION["u_id"]) || isset($_SESSION["s_id"]))) { ?>

                    <!-- Sign in button -->
                    <button class="sign-in" onclick="openLogin()">Sign In</button> <?php
                } else { ?>
                    <!-- Sign out in button -->
                      <a href="logout.php"><button class="sign-in">Sign Out</button></a> <?php
                }
            ?>

                <!-- Search Button -->
                <button class="sign-in" onclick="toggleSearch()"><i class="fa fa-search"></i></button>

                
                <!-- Mobile Menu -->
                <div class="mobile-menu" onclick="toggleMenu()">
                    <svg class="mobile-menu" viewBox="0 0 100 80" width="40" height="45">
                        <rect width="100" height="12"></rect>
                        <rect y="30" width="100" height="12"></rect>
                        <rect y="60" width="100" height="12"></rect>
                    </svg>
                </div> <!-- Mobile Menu -->
            </ul> 
        </nav>  
        
        <!--Search Form -->
        <div id="search-wrapper">
            
            <!-- Close botton for search bar -->
            <div class="close-search" onclick="closeSearch()">
                <svg class="cross"  height="18" width="18">
                    <line x1="0" y1="0" x2="18" y2="18" style="stroke-width:3" />
                    <line x1="18" y1="0" x2="0" y2="18" style="stroke-width:3" />
                </svg>
            </div>

            <!-- Form bar search bar -->
            <form class="search-container" action="" method="post">
                <input class="input" type="text" name="search" placeholder="Search Here....">
                <button class="search-button" name="search-submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
            
        <!-- mobile side menu -->
        <div id="mobile-menu-container" >
            <ul class="mobile-menu-content">

                <!-- Close botton for mobile menu bar -->
                <div class="close-menu" onclick="closeMenu()">
                    <svg class="cross"  height="18" width="18">
                        <line x1="0" y1="0" x2="18" y2="18" style="stroke-width:3" />
                        <line x1="18" y1="0" x2="0" y2="18" style="stroke-width:3" />
                    </svg>
                </div>

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
                    <line x1="0" y1="0" x2="18" y2="18" style="stroke-width:3" />
                    <line x1="18" y1="0" x2="0" y2="18" style="stroke-width:3" />
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
                    
                    <button type="submit"  name="login-submit">Sign In</button>
                    <p>Forgot Password?</p>
                </form>
            </div>
        </div> <!-- Login tab -->

        <button onclick="backToTop()" id="back-to-top">Top</button>
    </header>


   