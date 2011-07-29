<?php
	function date_to_mysql($str, $format) 
	{
	    $mysql_date;	
		
		switch( $format )
		{
			case "mm/dd/yyyy":
				$arr = split("/", $str);
			    $mm = $arr[0];
			    $dd = $arr[1];
			    $yyyy = $arr[2];
			    $mysql_date = $yyyy . '-' . $mm . '-' . $dd;
			    break;
			default:
				break;
		}
		
		return $mysql_date;
	}