	<section id="content" class="body">
	    <section id="mainimg">
        </section>
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
	</section><!-- /#content -->
	
        <section id="bottom">
	<section id="extras" class="body">
		<div class="social">
			<ul>
				<li><a href="http://twitter.com/" rel="alternate"> </a></li>
			</ul>
		</div>
      		
		<div class="social">
			<ul>
				<li><a href="http://facebook.com/" rel="me"> </a></li>
			</ul>
		</div><!-- /.social -->
	</section><!-- /#extras -->
	</section>