// Open the mobile menu
function toggleMenu() {
    var x = document.getElementById("mobile-menu-container");
    if(x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}

// Open the login tab
function openLogin() {
    var x = document.getElementById("sign-in-tab");
    if (x.style.display === "flex") {
        x.style.display = "none";
    } 
    else{
        x.style.display = "flex";
    }
}

// Close the login tab
function closeLogin() {
    document.getElementById("sign-in-tab").style.display = 'none';
}


// Open the login tab
function openUserContent() {
    var x = document.getElementById("user-content-dropdown");
    if (x.style.display === "block") {
        x.style.display = "none";
    } 
    else{
        x.style.display = "block";
    }
}







