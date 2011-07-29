	<section id="content" class="body">
    <?php 
    	$period = strtolower($period);
		$period = substr_replace($period, strtoupper(substr($period, 0, 1)), 0, 1);
			
    	if( strcmp($period, "All") != 0 )
    	{
    		echo "<h2>Weights for the last $period</h2>";
    	}
    	else
    	{
    		echo "<h2>All Weights</h2>";
    	}
    //	    $view_date = mysql_to_date($date, "day"); 
	    $i=0;
	    
	    $num = $result->num_rows();
		echo '<ul>';
	    while ($i < $num) 
		{
			$row = $result->row($i);
			
			echo "<li>$row->date $row->weight $row->units</li>";
							
			$i++;
		}
		echo '</ul>';
		
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
