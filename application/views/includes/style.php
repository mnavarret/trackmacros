		
		<link rel="stylesheet" href="http://www.trackmacros.com/css/tmstyle.css" type="text/css" />
		
        <!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	
		<!--[if lte IE 7]>
		<link rel="stylesheet" type="text/css" media="all" href="css/ie.css"/>
		<script src="js/IE8.js" type="text/javascript"></script><![endif]-->
		
		<!--[if lt IE 7]>
		<link rel="stylesheet" type="text/css" media="all" href="css/ie6.css"/><![endif]-->
		
<?php
        $page = $this->uri->segment(2);
        if( strcmp( $page, 'weight' ) == 0 )
        {
			  echo '<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>';
			  echo '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>';
			  echo '<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>';
			  
			  echo '<script>';
			  echo '$(document).ready(function() {';
			  echo '	$("#datepicker").datepicker();';
			  echo '});';
			  echo '</script>';
        }
        
        if( strcmp( $page, 'addfoods' ) != 0 )
        {
			  echo '	<link rel="stylesheet" href="http://www.trackmacros.com/css/tmforms.css" type="text/css" />';
        }
		else
        {
			  echo '	<link rel="stylesheet" href="http://www.trackmacros.com/css/addfoods.css" type="text/css" />';
			  echo "\n";
        	  echo "<script>\n";
			  echo "function calculate() {\n";
			  echo "	var calories = document.addfoodform.calories;\n";
			  echo "	var totalfat = document.addfoodform.totalfat;\n";
			  echo "	var totalcarbs = document.addfoodform.totalcarbs;\n";
			  echo "	var protein = document.addfoodform.protein;\n";
			  echo "	calories.value = totalfat.value*9 + totalcarbs.value*4 + protein.value*4;\n";
			  echo "}\n";
			  echo "</script>\n";
        }
		
        ?>
