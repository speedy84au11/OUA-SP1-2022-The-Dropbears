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
    <div class="container">

    <header>
        <div class="top-bar"><p>Striving to connect people in need</p></div>
        <nav>
            <div class="logo">
                <img src="./img/banner1.jpg" alt="">
            </div>
            <ul class="menu">
                <li class="menu-item dd"><a class="down-arrow" href="">services</a>
                    <ul class="dd-menu">
                        <li><a href="#">food</a></li>
                        <li><a href="#">housing</a></li>
                        <li><a href="#">mental health</a></li>            
                    </ul>
                </li>
                <li class="menu-item"><a href="">shop</a></li>
                <li class="menu-item"><a href="">about</a></li>
                <li class="menu-item"><a href="">sign in</a></li>
                <li class="menu-item"><a href="">register</a></li>
            </ul>
            <div class="hb-menu" onclick="toggleMenu()">
                <svg class="hb-menu" viewBox="0 0 100 80" width="30" height="30">
                    <rect width="100" height="12" style="fill:rgb(0, 24, 59)"></rect>
                    <rect y="30" width="100" height="12" style="fill:rgb(0, 24, 59)"></rect>
                    <rect y="60" width="100" height="12" style="fill:rgb(0, 24, 59)"></rect>
                </svg>
            </div>
            <div id="slide-menu-container" >
                <ul class="slide-content">
                    <li class="slide-item"><a class="down-arrow" href="">services</a>
                        <ul class="dd-slide-item">
                            <li><a href="#">food</a></li>
                            <li><a href="#">housing</a></li>
                            <li><a href="#">mental health</a></li>            
                        </ul>
                    </li>
                    <li class="slide-item"><a href="">shop</a></li>
                    <li class="slide-item"><a href="">about</a></li>
                    <li class="slide-item"><a  class="border-black" href="">register</a></li>
                    <li class="slide-item"><a class="border-blue" href="">sign in</a></li>
                </ul>
            </div>
        </nav>   
    </header>
    <?php include("tools.php"); ?>