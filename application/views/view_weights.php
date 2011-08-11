	<div id="content" class="body">
    <?php 
    	$period = strtolower($period);
		$period = substr_replace($period, strtoupper(substr($period, 0, 1)), 0, 1);
		$weightstr = '';
			
    	if( strcmp($period, "Day") == 0 )
    	{
    		echo "<h2>Weight for the $period</h2>";
    		$weightstr = "Weight for the $period\n\n";
    	}
    	else
		if( strcmp($period, "All") == 0 )
    	{
    		echo "<h2>All Weights</h2>";	
    		$weightstr = "All Weights\n\n";
    		
    	}
    	else
    	{
    		echo "<h2>Weights for the $period</h2>";
    		$weightstr = "Weights for the $period\n\n";
    	}

	    $i=0;
	    	    
	    $num = $result->num_rows();
		echo '<ul>';
	    while ($i < $num) 
		{
			$row = $result->row($i);
//	Format dates to prettier look
//	TODO
			$view_date = mysql_to_date($row->date, "yyyy-mm-dd"); 

			echo "<li>" . mysql_to_date($row->date, "yyyy-mm-dd") . " $row->weight $row->units</li>";
			$weightstr .= $row->date . ' ' . $row->weight . ' ' . $row->units . "\n";				
			$i++;
		}

//
//	Begin email form
		echo form_open('trackmacros/email_weights');
        $email_address = array(
            'name'      =>      'email_address',
            'id'        =>      'email_address',
            'value'     =>      set_value('email_address'),
         	'style'       =>    'width:25%'
        );
        $body = array(
            'name'      =>      'body',
            'id'        =>      'body',
            'value'     =>      set_value('')
        );  
		$weights = array(
			'type'      =>      'hidden',
			'name'      =>      'weights',
            'id'        =>      'weights',		
            'value'     =>      $weightstr
        );             
     		         
		echo '<li>';
        echo '<label>Email:</label>';    
    	echo '<div>';
    	echo form_input($email_address);
    	echo '</div>';
    	echo '</li>';
        //echo '<li>';
        //echo '<label>Weights:</label>';    
    	//echo '<div>';
    	echo form_input($weights);
    	//echo '</div>';
    	//echo '</li>';     		
    	echo '<li>';
        echo '<label>Body:</label>';     	
    	echo '<div>';
    	echo form_textarea($body);
    	echo '</div>';
    	echo '</li>';
    	echo '<li>';
        echo '<div>';
        echo validation_errors();
        echo '</div>';
        echo '</li>';        
        echo '<li>';
        echo '<div>';
        echo form_submit(array('name' => 'email_weights'), 'Send');
        echo '</div>';
        echo '</li>';
    	
		echo '</ul>';
    
        echo form_close();

		
	?>
	</div><!-- /#content -->
