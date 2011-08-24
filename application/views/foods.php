	<div id="content" class="body">
		<table style="width:35%;color:#FFFFFF;font-weight:bold;background-color:#0072bc;">
			<tr>
				<td style="width:10%">
				<?php
					$date = $this->uri->segment(3);
					if( $date == "" || strstr($this->uri->segment(3),"-") == FALSE )
					{
						$today =  date('Y-m-j');
						
					}
					else
					{
						$today = $date;	
					}
					$newdate = strtotime ( '-1 day' , strtotime ( $today ) ) ;
					$newdate = date ( 'Y-m-j' , $newdate );
					echo "<a href=\"http://trackmacros.com/trackmacros/foods/" . $newdate . "\"" . "/>Prev</a>"; 
				?>
				</td>
				<td style="width:80%;text-align:center;">
					<?php 
						$date = $this->uri->segment(3);
						if( $date == "" || strstr($this->uri->segment(3),"-") == FALSE )
						{
							$today =  date('Y-m-j');
							$long_today = date('l F j, Y');
						}
						else
						{
							$today = $date;
							$long_today = date( 'l F j, Y', strtotime( $today ) );
						}
						echo "$long_today";
					?>
				</td>
				<td style="width:10%">
				<?php 
					$date = $this->uri->segment(3);
					if( $date == "" || strstr($this->uri->segment(3),"-") == FALSE )
					{
						$today =  date('Y-m-j');
						
					}
					else
					{
						$today = $date;	
					}	
					$newdate = strtotime ( '+1 day' , strtotime ( $today ) ) ;
					$newdate = date ( 'Y-m-j' , $newdate );
					echo "<a href=\"http://trackmacros.com/trackmacros/foods/" . $newdate . "\"" . "/>Next</a>"; 
				?>
			</tr>
		</table>		
	<div class="foods">	
	<?php 
       	$brand = array(
            'name'      =>      'brand',
            'id'        =>      'brand',
      		'value'		=>		'',
      		'readonly'  => 		'readonly'
      	);      	      	      	
 		      	
		$amount = array(
            'name'      =>      'amount',
            'id'        =>      'amount',
			'style'		=>		'width:60px',
            'value'     =>      '0.0'
      	);
      	
      	$unit_options = array(
            'grams'      =>      'grams'
        );
	
		$atts = array(
        	'style'    => 'color:#000000'
			);
	    
		$result = $this->Food_model->get_foods();
        $food_options = array(
			'0'	=>		'Choose Food...'
        );
        
		$i=0;
	    $num = $result->num_rows();
				
	    while ($i < $num) 
		{
			$item = '';
			$row = $result->row($i);
			$item = $row->brand . ' ' . $row->description;
			$food_options[$row->id] = $item;
			$i++;
		}
		$foodsform = array(
            'name'      =>      'foodsform'
        );
        
        echo form_open('trackmacros/foods', $foodsform);
        echo form_dropdown('choosefood',$food_options,'0','id="choosefood" style="width:23%" onChange="showFood();"');
        echo form_close();
        echo anchor("trackmacros/addfoods", "Add A Food To The Database", $atts);
	?>
	</div>

<?php
	$date = $this->uri->segment(3);
	if( $date == "" )
	{
		$date = date('Y-m-j');	
	}
	$result = $this->Dailyfood_model->get_dailyfoods($date);
	$num = $result->num_rows();
	$i=0;
	$ratio=0;
	$sumprotein = 0;
	$sumcarbs = 0;
	$sumfat = 0;
	$sumcalories = 0;

	if( $num > 0 )
	{
		echo '<div>';
		echo '	<table style="border:2px #7b9ebd solid; background-color:e6ecf2;">';
		echo '		<tr style="border:1px #7b9ebd solid;font-weight:bold">';
		echo '			<td>Brand Description</td>';
		echo '			<td>Amount</td>';
		echo '			<td>Units</td>';
		echo '			<td>Protein(g)</td>';
		echo '			<td>Carbs(g)</td>';
		echo '			<td>Fat(g)</td>';
		echo '			<td>Calories</td>';
		echo '			<td align="center">Remove</td>';
		echo '		</tr>';
	    while ($i < $num) 
		{
			$row = $result->row($i);
			$ratio = $row->amount/$row->serving;
			$protein = $row->protein*$ratio;
			$carbs = $row->carbs*$ratio;
			$fat = $row->totalfat*$ratio;
			$calories = $row->calories*$ratio;
			if( $i == 0 )
			{
				echo '	<tr style="border-bottom:1px #7b9ebd solid;border-top:2px #7b9ebd solid;">';
			}
			else
			{
				echo '	<tr style="border:1px #7b9ebd solid;">';
			}
			echo "		<td>$row->brand $row->description</td>";
			echo "		<td>$row->amount</td>";
			echo "		<td>$row->units</td>";
			echo "		<td>$protein</td>";
			echo "		<td>$carbs</td>";
			echo "		<td>$fat</td>";
			echo "		<td>$calories</td>";
			echo "		<td align=\"center\" class=\"error\"><a href=\"http://trackmacros.com/trackmacros/deletefooditem/$row->id\"/>X</a></td>";
			echo '	</tr>';
			$sumprotein += $protein;
			$sumcarbs += $carbs;
			$sumfat += $fat;
			$sumcalories += $calories;
			
			$i++;
		}

		echo '	<tr style="border:2px #7b9ebd solid;font-weight:bold">';
		echo "		<td>Totals</td>";
		echo "		<td></td>";
		echo "		<td></td>";
		echo "		<td>$sumprotein</td>";
		echo "		<td>$sumcarbs</td>";
		echo "		<td>$sumfat</td>";
		echo "		<td>$sumcalories</td>";
		echo "		<td></td>";
		echo '	</tr>';
		echo '	</table>';		
		echo '</div>';
	}
?>
<?php
	if( $this->uri->segment(3) != "" && strstr($this->uri->segment(3),"-") == FALSE )
	{
		echo '<div id="textblock_div" style="display:inline" >';
		$result = $this->Food_model->get_food_by_id();
		$num = $result->num_rows();

	    if ($num == 1) 
		{
			$row = $result->row($i);
			$branddesc = $row->brand . ' ' . $row->description;
			$brand['value'] = $branddesc;
		}
	}
	else
	{
		echo '<div id="textblock_div" style="display:none" >';
	}
	echo form_open('trackmacros/addfooditem');?>
		<table style="border:2px #7b9ebd solid; background-color:e6ecf2;">
			<tr style="border:1px #7b9ebd solid;font-weight:bold;">
				<td style="width:25%">Brand Description</td>
				<td style="width:75px">Amount</td>
				<td style="width:75px">Units</td>
				<td>Protein(g)</td>
				<td>Carbs(g)</td>
				<td>Fat(g)</td>
				<td>Calories</td>
				<td align="center">Remove</td>
			</tr>
			<tr style="border:1px #7b9ebd solid;">
				<td><?php echo form_input($brand); ?></td>
				<td><?php $amount['value'] = $row->amount;echo form_input($amount); ?></td>
				<td><?php echo form_dropdown('units',$unit_options,'grams','id="units"'); ?></td>
				<td><?php echo $row->protein; ?></td>
				<td><?php echo $row->carbs; ?></td>
				<td><?php echo $row->totalfat; ?></td>
				<td><?php echo $row->calories; ?></td>
				<td align="center" class="error"><a href="JavaScript:void()" onClick="hideFood()" />X</a></td>
			</tr>
		</table>		
		<ul>	
		<li class="error">
            <?php echo validation_errors(); ?>
        </li>
		<li>
       		<?php echo form_submit(array('name' => 'addfooditem'), 'Add'); ?>
		</li>
		</ul>		
	<?php echo form_close();?>
	</div>
	</div><!-- /#content -->
