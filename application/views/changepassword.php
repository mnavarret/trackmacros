	<div id="content" class="body">
    	<h2>My Profile</h2>
    <?php

        echo form_open('trackmacros/updatepassword');

        $password = array(
            'password'      =>      'password',
            'id'	        =>      'password',
            'value'  	    =>      ''
        );
        $newpassword = array(
            'name'      =>      'newpassword',
            'id'        =>      'newpassword',
            'value'     =>      ''
        );
        $confirmnewpassword = array(
            'name'      =>      'confirmnewpassword',
            'id'        =>      'confirmnewpassword',
            'value'     =>      ''
        );
        
    ?>

    <ul>
        <li>
        <label>Old Password</label>
        <div>
        <?php echo form_password('password'); ?>
        </div>
        </li>

        <li>
        <label>New Password</label>
        <div>
        <?php echo form_password('newpassword'); ?>
        </div>
        </li>

        <li>
        <label>Confirm Name Password</label>
        <div>
        <?php echo form_password('confirmnewpassword'); ?>
        </div>
        </li>

        <li>
        <div class="error">
            <?php 
                if( $this->session->flashdata('updated_password_failed') == TRUE )
	            {
	                echo 'Your current password is incorrect!';
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
            <?php echo form_submit(array('name' => 'updatepassword'),'Update Password'); ?>
        </div>
        </li>
    </ul>

    <?php
    
        echo form_close();
    ?>        
	</div><!-- /#content -->
