<?php

class Dailyfood_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function add_food_item( $fields )
    {

	    $query_str = "INSERT INTO tbl_dailyfood(user_id, food_id, amount, units, date) VALUEs ( ?, ?, ?, ?, ? )";

        $this->db->query( $query_str, $fields );

        redirect('trackmacros/foods');

    }
    
    function delete_food_item()
    {
	   	$query_str = "select date FROM tbl_dailyfood where ID = ?";
        $result = $this->db->query( $query_str, $this->uri->segment(3) );
		if( $result->num_rows() == 1 )
		{
			$row = $result->row();
			$url = 'trackmacros/foods/' . $row->date;
		}
		$query_str = "DELETE FROM tbl_dailyfood where ID = ?";
		$this->db->query( $query_str, $this->uri->segment(3) );
        redirect($url);
    }
    
    function get_dailyfoods($date)
    {
            	            		
        $query_str = "SELECT A.id, A.user_id, A.date, A.food_id, A.amount, A.units, B.brand, B.description,
        					B.protein, B.carbs, B.totalfat,B.calories,B.amount as serving 
        			  FROM tbl_dailyfood A, tbl_food B
        			  WHERE (A.food_id = B.id) AND (A.user_id = ? AND A.date = ?)";
        
        
        $fields = array( $this->session->userdata('id'), $date );
        
        return $this->db->query( $query_str, $fields );

    }

}