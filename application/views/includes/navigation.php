<?php
        $page = $this->uri->segment(2);
        $home = '';
        $profile = '';
        $foods = '';
        $weight = '';
        $about = '';
        $guides = '';

        if( strlen( $page ) == 0 )
        {
            $home = ' class="current"';
        }
        else
        if( strcmp( $page, 'profile' ) == 0 )
        {
            $profile = ' class="current"';
        }
        else
        if( strcmp( $page, 'foods' ) == 0 )
        {
            $foods = ' class="current"';
        } 
        else
        if( strcmp( $page, 'weight' ) == 0 )
        {
            $weight = ' class="current"';
        } 
        else
        if( strcmp( $page, 'about' ) == 0 )
        {
            $about = ' class="current"';
        } 
        else
        if( strcmp( $page, 'guides' ) == 0 )
        {
            $guides = ' class="current"';
        } 
   
		
        if( $this->session->userdata('logged_in') )
		{
			echo '<ul id="nav">';
			echo "<li$profile><a href=\"http://trackmacros.com/trackmacros/profile\">Profile</a></li>";
			echo "<li$foods><a href=\"http://trackmacros.com/trackmacros/foods\">Foods</a></li>";
			echo "<li$weight><a href=\"http://trackmacros.com/trackmacros/weight\">Weight</a></li>";
			echo "<li$guides><a href=\"http://trackmacros.com/trackmacros/guides\">Guides</a></li>";
			echo '</ul>';		
		}
		else
		{
			echo '<ul id="nav">';
			echo "<li$home><a href=\"http://trackmacros.com\">Home</a></li>";
			echo "<li$about><a href=\"http://trackmacros.com/trackmacros/about\">About</a></li>";
			echo '</ul>';
		}
?>