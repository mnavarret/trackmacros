<?php
class MY_Form_validation extends CI_Form_validation {

	function __construct()
	{
		parent::__construct();
	}
	
	public function valid_date($str) {
	    	
	    if (ereg("([0-9]{1,2})/([0-9]{1,2})/([0-9]{4})", $str)) 
	    {
	        $arr = split("/", $str);
	        $mm = $arr[0];
	        $dd = $arr[1];
	        $yyyy = $arr[2];
	        
	        if (is_numeric($yyyy) && is_numeric($mm) && is_numeric($dd)) 
	        {
	            return checkdate($mm, $dd, $yyyy);
	        } 
	        else 
	        {
	            return false;
	        }
	    } 
	    else 
	    {
	        return false;
	    }
	}  
}
?>