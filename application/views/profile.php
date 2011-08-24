	<div id="content" class="body">
    	<h2>My Profile</h2>
    <?php

        echo form_open('trackmacros/update_profile');

        $name = array(
            'name'      =>      'name',
            'id'        =>      'name',
            'value'     =>      $this->session->userdata('name')
        );
        $email_address = array(
            'name'      =>      'email_address',
            'id'        =>      'email_address',
            'value'     =>      $this->session->userdata('email_address')
        );
        
    ?>

    <ul>
        <li>
        <label>Username</label>
        <div>
        <h3><?php echo $this->session->userdata('username'); ?></h3>
        </div>
        </li>

        <li>
        <label>Password</label>
        <div>
        <?php echo "<a class=\"orange\" href=\"changepassword\"/>Change Password</a>"; ?>
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
        <div class="error">
            <?php 
                if( $this->session->flashdata('updated_profile_successful') == TRUE )
	            {
	                echo 'Profile successfully updated!';
	            }
	            else
	            if( $this->session->flashdata('updated_password_successful') == TRUE )
	            {
	                echo 'Password successfully updated!';
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
            <?php echo form_submit(array('name' => 'update_profile'),'Update Profile'); ?>
        </div>
        </li>
    </ul>

    <?php
    
        echo form_close();
    ?>        
	</div><!-- /#content -->
