	<section id="content" class="body">
	<div id="main">
	
      <h2 class="main-title">Enter Nutritional Information</h2>
<?php		
	  	$addfoodform = array(
            'name'      =>      'addfoodform'
        );

        echo form_open('trackmacros/addfoods',$addfoodform);

        $brand = array(
            'name'      =>      'brand',
            'id'        =>      'brand',
            'value'     =>      set_value('brand'),
         	'style'       =>    'width:25%',
      	);
        
      	$desc = array(
            'name'      =>      'desc',
            'id'        =>      'desc',
            'value'     =>      set_value('desc'),
         	'style'       =>    'width:25%'
      	);
      	
      	$amount = array(
            'name'      =>      'amount',
            'id'        =>      'amount',
            'value'     =>      set_value('amount'),
         	'style'       =>    'width:25%'
      	);
      	
      	$unit_options = array(
            'grams'      =>      'grams',
 			'ounces'	 =>		 'ounces'
        );

      	$calories = array(
            'name'      =>      'calories',
            'id'        =>      'calories',
         	'style'     =>  	'width:50px',
      		'value'		=>		'0',
      		'readonly'  => 		'readonly',
      	);      	      	      	
      	        
      	$totalfat = array(
            'name'      =>      'totalfat',
            'onBlur'    =>      'calculate()'
      	);      	      	      	

      	$saturated = array(
            'name'      =>      'saturated',
            'id'		=>		'saturated'
      	);  

      	$polyunsaturated = array(
            'name'      =>      'polyunsaturated',
            'id'		=>		'polyunsaturated'
      	);  

      	$monounsaturated = array(
            'name'      =>      'monounsaturated',
            'id'		=>		'monounsaturated'
      	);  
      	      	
      	$trans = array(
            'name'      =>      'trans',
            'id'		=>		'trans'
      	);  

      	$sodium = array(
            'name'      =>      'sodium',
            'id'		=>		'sodium'
      	);
      	
      	$potassium = array(
            'name'      =>      'potassium',
            'id'		=>		'potassium'
      	);
      	
      	$totalcarbs = array(
            'name'      =>      'totalcarbs',
            'onBlur'    =>      'calculate()'
      	);      	      	      	
      	
      	$fiber = array(
            'name'      =>      'fiber',
            'id'		=>		'fiber'
      	);

      	$sugars = array(
            'name'      =>      'sugars',
            'id'		=>		'sugars'
      	);

      	$protein = array(
            'name'      =>      'protein',
            'onBlur'    =>      'calculate()'
      	);

      	$cholesterol = array(
            'name'      =>      'cholesterol',
            'id'		=>		'cholesterol'
      	);      	
      	
      	$vitamin_a = array(
            'name'      =>      'vitamin_a',
            'id'		=>		'vitamin_a'
      	);
      	      	
      	$calcium = array(
            'name'      =>      'calcium',
            'id'		=>		'calcium'
      	);
      	      	
      	$vitamin_c = array(
            'name'      =>      'vitamin_c',
            'id'		=>		'vitamin_c'
      	);
      	      	
      	$iron = array(
            'name'      =>      'iron',
            'id'		=>		'iron'
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
				<?php echo form_input($desc); ?>
			</li>			
			</h3>
			<li>
				<label>Amount:</label>
				<?php echo form_input(); ?>
			</li>
			<li>
				<label>Units:</label>
	      		<?php echo form_dropdown('unit',$unit_options,'grams','id="unit"'); ?>
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
					<td class="col-2"><?php echo form_input($totalcarbs); ?>g</td>
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
	<li>
       <?php echo form_submit(array('name' => 'addfoods'), 'Add Food'); ?>
</li>
</ul>
<?php
    
        echo form_close();
?>  
	</section><!-- /#content -->

