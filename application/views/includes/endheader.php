</head>

<body>
	<div id="pagetop">
        <h1><a href="http://trackmacros.com">TrackMacros</a></h1>
        <div id="login">
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
         
        </div>
    </div>
