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

	function parseInt($string) 
	{
		//  return intval($string);
		if(preg_match('/(\d+)/', $string, $array)) {
			return $array[1];
		} 
		else 
		{
			return 0;
		}
	}
	
	function mysql_to_date($str, $format) 
	{
	    $mysql_date;	
		$SHORT_MONTH_NAMES = array('01' => 'Jan','02' => 'Feb','03' => 'Mar','04' => 'Apr',
									'05' => 'May','06' => 'Jun', '07' => 'Jul','08' => 'Aug',
									'09' => 'Sep','10' => 'Oct','11' => 'Nov','12' => 'Dec'); 
		$LONG_MONTH_NAMES = array('01' => 'January','02' => 'Febuary','03' => 'March','04' => 'April',
									'05' => 'May','06' => 'June', '07' => 'July','08' => 'August',
									'09' => 'September','10' => 'October','11' => 'November','12' => 'December'); 
						
		switch( $format )
		{
			case "mm/dd/yyyy":
				$arr = split("/", $str);
			    $mm = $arr[0];
			    $dd = $arr[1];
			    $yyyy = $arr[2];
			    $mysql_date = $yyyy . '-' . $mm . '-' . $dd;
			    break;
			case "yyyy-mm-dd":
				$arr = split("-", $str);
			    $yyyy = $arr[0];
			    $mm = $arr[1];
			    $dd = $arr[2];
  				$h = mktime(0, 0, 0, $mm, $dd, $yyyy);
 				$d = date("F dS, Y", $h) ;
 				$w= date("l", $h) ; 
   				$mysql_date = $w . ', ' . $LONG_MONTH_NAMES[$mm] . ' ' . $dd . ', ' . $yyyy;
			    break;			    
			default:
				break;
		}
		
		return $mysql_date;
	}