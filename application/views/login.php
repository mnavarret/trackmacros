	<section id="content" class="body">
	    <section id="mainimg">
        </section>
    	<h2>Login Required</h2>
    <?php

        echo form_open('trackmacros/login');
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
        <div>
            <?php
	            if( $this->session->flashdata('login_error_incorrect') == TRUE )
	            {
	                echo 'You entered an incorrect username or password';
	            }
	            else
	            if( $this->session->flashdata('login_error_activate') == TRUE )
	            {
	                echo 'You must activate your account before you can login';
	            }
	            else
	            {
	                echo validation_errors();
           		}
            ?>
        </div>
        </li>
        <li>
        <div>
            <?php echo form_submit(array('name' => 'login'), 'Login'); ?>
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
