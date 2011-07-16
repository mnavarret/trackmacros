	<section id="content" class="body">
	    <section id="mainimg">
        </section>
    	<h2>Registration Required</h2>
        <p>Fill out form to gain access</p>
    <?php

        echo form_open('trackmacros/register');
        $username = array(
            'name'      =>      'username',
            'id'        =>      'username',
            'value'     =>      set_value('username')
        );

        $password = array(
            'name'      =>      'password',
            'id'        =>      'password',
            'value'     =>      ''
        );
        $password_confirm = array(
            'name'      =>      'password_confirm',
            'id'        =>      'password_confirm',
            'value'     =>      ''
        );
        $name = array(
            'name'      =>      'name',
            'id'        =>      'name',
            'value'     =>      set_value('name')
        );
        $email_address = array(
            'name'      =>      'email_address',
            'id'        =>      'email_address',
            'value'     =>      set_value('email_address')
        );
        
    ?>

    <ul>
        <li>
        <label>Username</label>
        <div>
            <?php echo form_input($username); ?>
        </div>
        </li>

        <li>
        <label>Password</label>
        <div>
            <?php echo form_password($password); ?>
        </div>
        </li>

        <li>
        <label>Confirm Password</label>
        <div>
            <?php echo form_password($password_confirm); ?>
        </div>
        </li>

        <li>
        <label>Name</label>
        <div>
            <?php echo form_input($name); ?>
        </div>
        </li>

        <li>
        <label>Email Address</label>
        <div>
            <?php echo form_input($email_address); ?>
        </div>
        </li>

        <li>
        <div>
            <?php echo validation_errors(); ?>
        </div>
        </li>

        <li>
        <div>
            <?php echo form_submit(array('name' => 'register'),'Register'); ?>
        </div>
        </li>
    </ul>

    <?php
    
        echo form_close();
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
