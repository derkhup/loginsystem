<?php
include_once 'header.php';

?>
        <section class="main-container">
            <div class="main-wrapper">
                <h2>Signup</h2>
               
                  
                    <center><img src="download.png"></center> 
                    <form class="signup-form" action="includes/signup.php" method="POST">
                    <input type="text" name="first" placeholder="Firstname">
                    <input type="text" name="last" placeholder="Lastname">
                    <input type="text" name="email" placeholder="E-mail">
                    <input type="text" name="uid" placeholder="Username">
                    <input type="text" name="pwd" placeholder="Password">
                    <button type="submit" name="submit">Sign up</button>
                     
                    
                </form>
                
                
            </div>
        </section>
<?php
include_once 'footer.php';

?>
