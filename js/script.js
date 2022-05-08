// =====================================
// =========== Mobile Menu =============
// =====================================

// Open the mobile menu
function toggleMenu() {
    var x = document.getElementById("mobile-menu-container");
    if(x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
    backToTop();
}

// Close the login tab
function closeMenu() {
  document.getElementById("mobile-menu-container").style.display = 'none';
}


// =====================================
// =========== User Dropdown menu=======
// =====================================

// Open the user dropdown menu
function openUserDropdownMenu() {
  var x = document.getElementById("user-dropdown");
  if(x.style.display === "block") {
      x.style.display = "none";
  } else {
      x.style.display = "block";
  }
  backToTop();
}

// Close the user dropdown menu
function closeUserDropdownMenu() {
document.getElementById("user-dropdown").style.display = 'none';
}




// =====================================
// =========== Login tab ===============
// =====================================

// Open the login tab
function openLogin() {
    var x = document.getElementById("sign-in-tab");
    if (x.style.display === "flex") {
        x.style.display = "none";
    } 
    else{
        x.style.display = "flex";
    }
    backToTop();
}

// Close the login tab
function closeLogin() {
    document.getElementById("sign-in-tab").style.display = 'none';
}


// =====================================
// =========== Search Bar ==============
// =====================================

// Open the search bar
function toggleSearch() {
    var x = document.getElementById("search-wrapper");    if(x.style.display === "flex") {
        x.style.display = "none";
    } else {
        x.style.display = "flex";
    }
    backToTop();
}

// Close the search tab
function closeSearch() {
  document.getElementById("search-wrapper").style.display = 'none';
}

// =====================================
// ======= Dark to Light Modes =========
// =====================================

// Toggle from dark to light mode




var colors = document.getElementById('colors'); 


function toggleDefault() {
  var x = document.querySelector(':root');
  x.style.setProperty('--main-color', '#0B74BD');
  colors.style.display = "none";

  localStorage.setItem("color", "#0B74BD");       
}

function toggleGreen() {
    var x = document.querySelector(':root');
    x.style.setProperty('--main-color', 'green');
    colors.style.display = "none"; 
    
    localStorage.setItem("color", "green");          
}

function toggleRed() {
  var x = document.querySelector(':root');
  x.style.setProperty('--main-color', 'red');
  colors.style.display = "none"; 
  
  localStorage.setItem("color", "red");         
}

function toggleBlack() {
  var x = document.querySelector(':root');
  x.style.setProperty('--main-color', 'black');
  colors.style.display = "none"; 

  localStorage.setItem("color", "black");         
}

function toggleOrange() {
  var x = document.querySelector(':root');
  x.style.setProperty('--main-color', 'orange');
  colors.style.display = "none";  
  
  localStorage.setItem("color", "orange");       
}

function togglePurple() {
  var x = document.querySelector(':root');
  x.style.setProperty('--main-color', 'purple');
  colors.style.display = "none"; 

  localStorage.setItem("color", "purple");        
}


function maintainColor() {
  var color = localStorage.getItem('color')
  var x = document.querySelector(':root');
  x.style.setProperty('--main-color', color);
}

// Open the color selector
function openColorSelector() {
  var x = document.getElementById("colors");
    if(x.style.display === "flex") {
        x.style.display = "none";
    } else {
        x.style.display = "flex";
    }
    backToTop();
}


// =====================================
// =========== On Scroll ===============
// =====================================

// On scroll call this function
window.onscroll = function() {
    myFunction()
    scrollFunction()
};

// Menu bar sticks to the top on scroll
var menuBar = document.getElementById("menu-bar");
var sticky = menuBar.offsetTop;
function myFunction() {
  if (window.pageYOffset >= sticky) {
    menuBar.classList.add("sticky")
  } else {
    menuBar.classList.remove("sticky");
  }
}

// Back to top button

var mybutton = document.getElementById("back-to-top");

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When clicked on screen will return to top
function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}



