<script>
    
function _(id)
{	
	return document.getElementById(id);
}
function SubmitUpdatesForm()
{
	_("SubmitButton").disabled = true;
	_("SubmitButton").value = 'Please Wait..';
	
    var formdata = new FormData();
    formdata.append( "n", _("n").value );
    formdata.append( "e", _("e").value );
			
	var ajax = new XMLHttpRequest();
	ajax.open( "POST", "http://www.hennesseyy.com/UpdatesForm/UpdatesForm.php");
	ajax.onreadystatechange = function()
	{
		if(ajax.readyState == 4 && ajax.status == 200) 
		{
			if(ajax.responseText == "success")
			{
				_("SubmitButton").value = 'Thank You for Subscibing!!';
				alert("Thanks "+ _("n").value + " your message has been sent");
			}			
			else
			{
				alert(ajax.responseText);
				_("SubmitButton").value = 'Subscibe Now';
				_("SubmitButton").disabled = false;
			}
		}
	}
	ajax.send( formdata );
}

<?php
    if( isset($_POST['n']) && isset($_POST['e']) )
    {
		$n = strip_tags($_POST['n']);
		$e = strip_tags($_POST['e']);
		$to = "info@hennesseyy.com";
		$from = $e;
		
		//Main message sent to the service provider
		$MainSubject = 'Mailing List Subscription';
		$MainMessage = 'Mailing List Subscription<br><b>Name : </b>'.$n.'<br><b>Email : </b>'.$e;
		$MainHeaders = "From: $from\r\n";
		$MainHeaders .= "Reply-To : $to\r\n";
		$MainHeaders .= "MIME-Version: 1.0\r\n";
		$MainHeaders .= "Content-type: text/html; charset=iso-8859-1\r\n";
		
        //Acknowledge message sent to the service provider
		$AckSubject = 'Thank you for subscribing to Hennesseyy';
		
		$AckMessage = '<html><body>';
		$AckMessage .= '<div style = "font-family: rockwell; background-color : #121212; color : white; width : 700; height : 250; padding : 20; padding-top: 30; margin : auto; text-align:center; box-shadow : 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 12px 40px 0 rgba(0, 0, 0, 0.19); opacity : 90;">';
		$AckMessage .= '<h2><br><b>Thanks '.$n.' for subscribing to Hennesseyy!!</b></h2>';
		$AckMessage .= '<i style = "font-family : calibri;font-size : 17px">';
		$AckMessage .= '<br>This is surely the best way to receive the latest news, concert dates, and free ticket offers!!<br>Please be sure to me on social media and share my music with your friends <br><br></i>';
		$AckMessage .= '<a style = "padding-right:1em" href = "https://www.facebook.com/Hennesseyy-123069743081/"> <img src = "http://www.hennesseyy.com/UpdatesForm/Facebook.png">	</a>';
		$AckMessage .= '<a style = "padding-right:1em" href = "https://twitter.com/hennesseyy"><img src = "http://www.hennesseyy.com/UpdatesForm/Twitter.png"></a>';
		$AckMessage .= '<a style = "padding-right:1em" href = "https://www.instagram.com/hennesseyyhennesseyy/"><img src = "http://www.hennesseyy.com/UpdatesForm/Instagram.png"></a>';
		$AckMessage .= '<a style = "padding-right:1em" href = "https://soundcloud.com/hennesseyy"><img src = "http://www.hennesseyy.com/UpdatesForm/Soundcloud.png"></a>';
		$AckMessage .= '<a style = "padding-right:1em" href = "https://www.youtube.com/channel/UC4h2wQSLmHBkDmf1WZS16fA"><img src = "http://www.hennesseyy.com/UpdatesForm/Youtube.png"></a>';
		$AckMessage .= '<a style = "padding-right:1em" href = "http://www.tunecore.com/music/hennesseyy"><img src = "http://www.hennesseyy.com/UpdatesForm/Itunes.png"></a>';
		$AckMessage .= '<br></div></body></html>';
				
		$AckHeaders = "From: $to\n";
		$AckHeaders .= "MIME-Version: 1.0\n";
		$AckHeaders .= "Content-type: text/html; charset=iso-8859-1\n";
		
		
		if(mail($to, $MainSubject, $MainMessage,$MainHeaders) && mail($from, $AckSubject, $AckMessage, $AckHeaders))
		{
			echo "success";
		}
		else
		{
			echo "The server failed to send the message. Please try again later.";
		}
		
	}
    
    else
	{
		echo "The server failed to receive all the data";
	}
	
?>
    
    <body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Create a Customer</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label">Email Address</label>
                        <div class="controls">
                            <input name="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($dateError)?'error':'';?>">
                        <label class="control-label">date Number</label>
                        <div class="controls">
                            <input name="date" type="text"  placeholder="date Number" value="<?php echo !empty($date)?$date:'';?>">
                            <?php if (!empty($dateError)): ?>
                                <span class="help-inline"><?php echo $dateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
               <?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $emailError = null;
        $dateError = null;
         
        // keep track post values
        $name = $_POST['name'];
        $email = $_POST['email'];
        $date = $_POST['date'];
         
        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }
         
        if (empty($email)) {
            $emailError = 'Please enter Email Address';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Please enter a valid Email Address';
            $valid = false;
        }
         
        if (empty($date)) {
            $dateError = 'Please enter date Number';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO customers (name,email,date) values(?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$email,$date));
            Database::disconnect();
            header("Location: index.php");
        }
    }
?>  
    </div> <!-- /container -->
  </body>
</html>