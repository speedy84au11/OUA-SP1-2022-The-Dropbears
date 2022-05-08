<?php   include("./inc/header.php");  ?>


<div class="contact-wrapper">
    
    <section class="contact-top">
        <ul class="breadcrumb">
            <li><a href="index.php">Home/</a></li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
    </section>

    <div class="contact-form">

        <h4>Leave a comment</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris convallis sed neque vitae bibendum. 
            Nunc auctor dictum risus, a finibus eros iaculis nec. Sed et euismod felis, non euismod est. 
            Maecenas quis nulla ullamcorper, imperdiet lacus et, porta sem.</p>

        <form action="" method="post">
         <!-- Name input -->
            <div class="row">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Your name.." value="" required>
            </div>

            <!-- Email input -->
            <div class="row">
                <label for="s_name">Email</label>         
                <input type="text" id="email" name="email" placeholder="Your email.." value="" required>
            </div>

            <!-- Comment input -->
            <div class="row">
                <label for="comment">Comment</label>
                <textarea rows="5" cols="80" id="comment" name="comment"></textarea>
            </div>
            <div class="row">
                <input class="contact-form-button" type="submit" value="submit" name="submit">
            </div>
        </form>              
    </div>

    <div class="contact-info">

        <h4>Contact Details</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris convallis sed neque vitae bibendum. 
            Nunc auctor dictum risus, a finibus eros iaculis nec. </p>
        <h4>Address</h4>
        <p>4356 Smith Street, Smithfield, 2245 NSW Australia</p>
        <h4>Email</h4>
        <p>admin@theconnectedapp.com.au</p>
        <h4>Phone Number</h4>
        <p>0434 6767 8989</p>
        <h4>Opening Hours</h4>
        <p>Monday to Friday: 9am to 4pm</p>
    </div>  
</div>

<?php   include("./inc/footer.php");  ?>