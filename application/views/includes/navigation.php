<?php
        $page = $this->uri->segment(2);
        $home = '';
        $about = '';

        if( strlen( $page ) == 0 )
        {
            $home = ' class="current"';
        }
        else
        if( strcmp( $page, 'about' ) == 0 )
        {
            $about = ' class="current"';
        }    
?>
	<ul id="nav">
		<li<?php echo "$home" ?>><a href="http://trackmacros.com">Home</a></li>
		<li<?php echo "$about" ?>><a href="http://trackmacros.com/trackmacros/about">About Us</a></li>
	</ul>

