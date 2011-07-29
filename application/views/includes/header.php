<!DOCTYPE html>
<html lang="es">
<head>
	<title>TrackMacros - Online web application for food</title>
	<meta charset="utf-8" />
	
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
?>
</head>

<body>
	<section id="pagetop">
        <h1><a href="http://trackmacros.com">TrackMacros</strong></a></h1>
        <section id="login">
        <?php 
        	if( $this->session->userdata('logged_in') )
        	{
            	$name = $this->session->userdata('name');
        		echo "Welcome $name | <a href=\"http://trackmacros.com/trackmacros/logout\">Logout</a>";
        	}
	        else
	        {
	            echo "<a href=\"http://trackmacros.com/trackmacros/login\">Login</a> | <a href=\"http://trackmacros.com/trackmacros/register\">Register</a>";
	        }
	     ?>
         
        </section>
    </section>
