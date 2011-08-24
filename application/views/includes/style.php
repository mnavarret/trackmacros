		
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
        
        if( strcmp( $page, 'foods' ) == 0 )
        {
        	  echo "<script type=\"text/javascript\" language=\"javascript\">\n";
			  echo "function hideFood() {\n";
			  echo "	document.getElementById('textblock_div').style.display='none';\n";
			  echo "}\n";
			  echo "function showFood() {\n";
			  echo "	var index = document.getElementById(\"choosefood\").selectedIndex;\n";
			  echo "	var temp = document.getElementById(\"choosefood\").options[index].text;\n";
			  echo "	var baseURL = \"http://trackmacros.com/trackmacros/foods/\" + temp;\n";
			  echo "    top.location.href = baseURL;";
			  echo "    return true;";
			 // echo "	if( temp != \"Choose Food...\")";
			 // echo "	{	brand.value = temp;\n";
			 // echo "		document.getElementById('textblock_div').style.display='inline';\n";
			//  echo "	}";
			  echo "}\n";			  
			  echo "</script>\n";     
		}
	    
        if( strcmp( $page, 'addfoods' ) != 0 )
        {
			  echo '	<link rel="stylesheet" href="http://www.trackmacros.com/css/tmforms.css" type="text/css" />';
        }
		else
        {
			  echo '	<link rel="stylesheet" href="http://www.trackmacros.com/css/addfoods.css" type="text/css" />';
		}
		
        ?>
