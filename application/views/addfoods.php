	<div id="content" class="body">
	<div id="main">
	
      <h2 class="main-title">Enter Nutritional Information</h2>
<?php		
        echo form_open('trackmacros/addfoodform');

        $brand = array(
            'name'      =>      'brand',
            'id'        =>      'brand',
            'value'     =>      '',
         	'style'     =>      'width:25%',
      	);
        
      	$description = array(
            'name'      =>      'description',
            'id'        =>      'description',
            'value'     =>      '',
         	'style'     =>      'width:25%'
      	);
      	
      	$amount = array(
            'name'      =>      'amount',
            'id'        =>      'amount',
            'value'     =>      '0.0'
      	);
      	
      	$unit_options = array(
            'grams'      =>      'grams'
        );

      	$calories = array(
            'name'      =>      'calories',
            'id'        =>      'calories',
         	'style'     =>  	'width:50px',
      		'value'		=>		'0'
      	);      	      	      	
      	        
      	$totalfat = array(
            'name'      =>      'totalfat',
            'value'		=>		'0.0'
      	);      	      	      	

      	$saturated = array(
            'name'      =>      'saturated',
            'id'		=>		'saturated',
      		'value'		=>		'0.0'
      	);  

      	$polyunsaturated = array(
            'name'      =>      'polyunsaturated',
            'id'		=>		'polyunsaturated',
      		'value'		=>		'0.0'
      	);  

      	$monounsaturated = array(
            'name'      =>      'monounsaturated',
            'id'		=>		'monounsaturated',
      		'value'		=>		'0.0'
      	);  
      	      	
      	$trans = array(
            'name'      =>      'trans',
            'id'		=>		'trans',
      		'value'		=>		'0.0'	
      	);  

      	$sodium = array(
            'name'      =>      'sodium',
            'id'		=>		'sodium',
        	'value'		=>		'0.0'    
      	);
      	
      	$potassium = array(
            'name'      =>      'potassium',
            'id'		=>		'potassium',
      		'value'		=>		'0.0'
      	);
      	
      	$carbs = array(
            'name'      =>      'carbs',
            'value'		=>		'0.0'
      	);      	      	      	
      	
      	$fiber = array(
            'name'      =>      'fiber',
            'id'		=>		'fiber',
      		'value'		=>		'0.0'
      	);

      	$sugars = array(
            'name'      =>      'sugars',
            'id'		=>		'sugars',
      		'value'		=>		'0.0'
      	);

      	$protein = array(
            'name'      =>      'protein',
            'value'		=>		'0.0'
      	);

      	$cholesterol = array(
            'name'      =>      'cholesterol',
            'id'		=>		'cholesterol',
      		'value'		=>		'0.0'
      	);      	
      	
      	$vitamin_a = array(
            'name'      =>      'vitamin_a',
            'id'		=>		'vitamin_a',
      		'value'		=>		'0.0'
      	);
      	      	
      	$calcium = array(
            'name'      =>      'calcium',
            'id'		=>		'calcium',
      		'value'		=>		'0.0'
      	);
      	      	
      	$vitamin_c = array(
            'name'      =>      'vitamin_c',
            'id'		=>		'vitamin_c',
      		'value'		=>		'0.0'
      	);
      	      	
      	$iron = array(
            'name'      =>      'iron',
            'id'		=>		'iron',
      		'value'		=>		'0.0'
      	);
      	      	
      	$addfood = array(
            'name'      =>      'addfood',
            'id'        =>      'addfood',
            'value'     =>      set_value('addfood')
        );
	   
    ?>

	<h4 class="title">Nutrition Facts</h4>
	<HR NOSHADE>            
	<div>
		<ol>
			<li>
			<h3>
				<label>Brand/Restaurant:</label>
				<?php echo form_input($brand); ?>
			</h3>				
			</li>
			<li>
			<h3>
				<label>Food Description:</label>
				<?php echo form_input($description); ?>
			</h3>
			</li>			
			<li>
				<label>Amount:</label>
				<?php echo form_input($amount); ?>
			</li>
			<li>
				<label>Units:</label>
	      		<?php echo form_dropdown('units',$unit_options,'grams','id="units"'); ?>
			</li>
		</ol>
	</div>
	<HR NOSHADE>      
		<table id="nutrition-facts">
					
			<colgroup>
				<col class="col-1"/>
				<col class="col-2"/>
				<col class="col-1"/>
				<col class="col-2"/>
			</colgroup>
	
			<thead>
				<tr>
					<th colspan="4">Amount Per Serving</th>									
				</tr>
			</thead>
			
			<tbody>
				<tr class="first">
					<td class="col-1">Calories</td>
					<td class="col-2"><?php echo form_input($calories); ?></td>
					<td class="col-1">Sodium</td>
					<td class="col-2"><?php echo form_input($sodium); ?>mg</td>
				</tr>
				<tr>
					<td class="col-1">Total Fat</td>
					<td class="col-2"><?php echo form_input($totalfat); ?>g</td>
					<td class="col-1">Potassium</td>
					<td class="col-2"><?php echo form_input($potassium); ?>mg</td>
				</tr>
				
				<tr>
					<td class="col-1sub">Saturated</td>
					<td class="col-2"><?php echo form_input($saturated); ?>g</td>
					<td class="col-1">Total Carbs</td>
					<td class="col-2"><?php echo form_input($carbs); ?>g</td>
				</tr>
				
				<tr>
					<td class="col-1sub">Polyunsaturated</td>
					<td class="col-2"><?php echo form_input($polyunsaturated); ?>g</td>
					<td class="col-1sub">Dietary Fiber</td>
					<td class="col-2"><?php echo form_input($fiber); ?>g</td>
	
				</tr>
				
				<tr>
					<td class="col-1sub">Monounsaturated</td>
					<td class="col-2"><?php echo form_input($monounsaturated); ?>g</td>
					<td class="col-1sub">Sugars</td>
					<td class="col-2"><?php echo form_input($sugars); ?>g</td>
				</tr>
	
				
				<tr>
					<td class="col-1sub">Trans</td>
					<td class="col-2"><?php echo form_input($trans); ?>g</td>
					<td class="col-1">Protein</td>
					<td class="col-2"><?php echo form_input($protein); ?>g</td>
				</tr>
				
				<tr class="bottomborder">
	
					<td class="col-1">Cholesterol</td>
					<td class="col-2"><?php echo form_input($cholesterol); ?>mg</td>
					<td class="col-1">&nbsp;</td>
					<td class="col-2">&nbsp;</td>
				</tr>
	                			
				<tr class="alt first">
					<td class="col-1">Vitamin A</td>
					<td class="col-2"><?php echo form_input($vitamin_a); ?>%</td>
					<td class="col-1">Calcium</td>
					<td class="col-2"><?php echo form_input($calcium); ?>%</td>
				</tr>
				
				<tr class="last">
					<td class="col-1">Vitamin C</td>
					<td class="col-2"><?php echo form_input($vitamin_c); ?>%</td>
					<td class="col-1">Iron</td>
					<td class="col-2"><?php echo form_input($iron); ?>%</td>
				</tr>
				
			</tbody>
			
		</table> <!-- / #nutrition-facts -->
		
	</div> <!-- / #nutrition-wrap -->
	    <HR NOSHADE>            
	<p class="aclaration-6">
		*Percent Daily Values are based on a 2,000 calorie diet. Your daily values may be higher or lower depending on your calorie needs.
	</p>					
	<ul>
		<li class="error">
            <?php echo validation_errors(); ?>
        </li>
		<li>
       		<?php echo form_submit(array('name' => 'addfoods'), 'Add Food'); ?>
		</li>
	</ul>
<?php
    
        echo form_close();
?>  
	</div><!-- /#content -->

