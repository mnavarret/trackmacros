	<div id="content" class="body">
	    <div id="mainimg"></div>
    	<?php
	    	if( $registration_status == 2 )
	    	{
    			echo '<h2>Thank you for registering!</h2>';
	    		echo '<p>You should receive an activation email shortly.</p>';
	    		echo '<p>Once you receive the email, click on the link provided to activate your account.</p>';
	    	}
	    	else
	    	if( $registration_status == 0 )
	    	{
	    		echo '<h2>ERROR!</h2>';
	    		echo 'No registration code in URL';
	    	}
	    	else 
	    	if( $registration_status == 1 )
	    	{
	    		echo '<h2>Thank you for registering!</h2>';
	    		echo 'You have successfully registered!';
	    	}
	    	else 
	    	{
	    		echo '<h2>ERROR!</h2>';
	    		echo 'You have failed to register - no record found for that activation code';
	    	}
    	?>
	</div><!-- /#content -->
	