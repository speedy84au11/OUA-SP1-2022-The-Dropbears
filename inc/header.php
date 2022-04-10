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
                <p>Language Selector</p>
            </div>

            <!-- Dark Mode Selector -->
            <div class="topbar-content">
                <p>Toggle Dark Mode</p>
            </div>

            <!--Search Form -->
            <form class="search-container" action="">
                <input class="input" type="text" placeholder="Search Here....">
                <button class="search-button"><i class="fa fa-search"></i></button>
            </form>

            <button class="mobile-sign-in"><a href="login.php">Sign In</a></button>

        </div> <!-- top-bar -->

        <!-- Nav bar -->
        <nav>
            <!--Logo bar -->
            <div class="logo-bar">

                <!-- Logo image -->
                <img src="./img/heart-logo.jpg" alt="">

                <!-- Main sign in button -->
                <button class="sign-in"><a href="login.php">Sign In</a></button>
                
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
    </header>
    <?php include("tools.php"); ?>