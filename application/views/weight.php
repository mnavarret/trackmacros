	<div id="content" class="body">
    <?php
		echo form_open('trackmacros/view_weights');
        
        $period_options = array(
			'DAY'		=>		'Day',	
        	'WEEK'      =>      'Week',
            'MONTH'     =>      'Month',
        	'YEAR'      =>      'Year',
        	'ALL'       =>      'All'
        );
    ?>
    <ul>
        <li>
        <label>View weight ins by:</label>
        <?php echo form_dropdown('period',$period_options,'Day','id="period"'); ?>
        <?php echo form_submit(array('name' => 'viewweights'), 'View'); ?>
        </li>
    </ul>

    <?php
    
        echo form_close();
    ?>
    <HR NOSHADE>            
	<?php
		echo form_open('trackmacros/addupdate_weight');
        
        $date = array(
            'name'      =>      'date',
            'id'        =>      'datepicker',
            'value'     =>      set_value('date')
        );
        
        $weight = array(
            'name'      =>      'weight',
            'id'        =>      'weight',
            'value'     =>      set_value('weight')
        );
        
        $unit_options = array(
            'lbs'      =>      'lbs',
            'kgs'       =>     'kgs'
        );
    ?>

    <ul>
        <li class="error">
        <div>
            <?php
            	
	            if( $this->session->flashdata('weight_added') == TRUE )
	            {
	                echo 'Weight Added';
	            }
	            
	            if( $this->session->flashdata('weight_updated') == TRUE )
	            {
	                echo 'Weight Updated';
	            }
	            
	            if( $this->session->flashdata('email_successful') == TRUE )
	            {
	            	echo 'Email Sent Successfully';
	            }
            ?>
        </div>
        </li>
    	<li>
        <label>Date</label>    
    	<div>
    		<?php echo form_input($date); ?>
    	</div>
    	</li>
        <li>
        <label>Weight</label>
        <div>
            <?php echo form_input($weight); ?>
        </div>
        </li>
        <li>
        <label>Unit</label>
        <div>
            <?php echo form_dropdown('unit',$unit_options,'lbs','id="unit"'); ?>
        </div>
        </li>
        <li>
        <div>
            <?php echo validation_errors(); ?>
        </div>
        </li>        
        <li>
        <div>
            <?php echo form_submit(array('name' => 'addweight'), 'Save'); ?>
        </div>
        </li>
    </ul>

    <?php
    
        echo form_close();
    ?>        

	</div><!-- /#content -->
