<?php
include_once 'header.php';

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



        <section class="main-container">
            <div class="main-wrapper">
                <h2>Events</h2>
                
                
                
                <br>
                  <br>
                    <br>
                    <script>
                    $(document).ready(function(){
                    $("button").click(function(){
                    $(".test").flip (3000);
                          });
                    });
                    </script>
                    <center><button><img class="test" src="IMG/download.png"></button></center> 
                    
                    <?php
                    if (isset($_SESSION['u_id'])) {
                        echo "You are logged in";
                        
                    }
                    
                    ?>
                11 november 2017
Workshop makreel en/of forel, eend en zalm roken
Rookoven.com - Nunspeet, Gelderland, Nederland
Rookoven.com	 	Workshop	
 	 	 	 
25 november 2017
Workshop Worst Maken
Rookoven.com - Nunspeet, Gelderland, Nederland
Rookoven.com	 	Workshop	
 	 	 	 
09 december 2017
Workshop makreel en/of forel, eend en zalm roken
Rookoven.com - Nunspeet, Gelderland, Nederland
Rookoven.com	 	Workshop	
 	 	 	 
16 december 2017
Smokey Christmas
Rookoven.com - Nunspeet, Gelderland, Nederland
Rookoven.com			
 
            </div>
        </section>
<?php
include_once 'footer.php';

?>
