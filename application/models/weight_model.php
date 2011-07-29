<?php

class Weight_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function add_update($date, $weight, $unit)
    {
        $query = "SELECT id FROM tbl_weight WHERE user_id = ? AND date = ?";
	    $mysql_date = date_to_mysql($date, "mm/dd/yyyy"); 
        $user_id = $this->session->userdata('id' );
        $result = $this->db->query($query, array( $user_id, $mysql_date ) );
		
        if( $result->num_rows() == 1 )
        {
        	$row = $result->row();
            $query = "UPDATE tbl_weight SET weight = ? WHERE id = ?";
            $result = $this->db->query($query, array( $weight, $row->id ) );
            $this->session->set_flashdata('weight_updated', TRUE);
        }
        else
        {
	        $query = "INSERT INTO tbl_weight(user_id, date, weight, units) VALUEs ( ?, ?, ?, ?)";
	        $this->db->query( $query, array( $user_id, $mysql_date, $weight, $unit ) );
	        $this->session->set_flashdata('weight_added', TRUE);
        }
    }
    
    function view($period)
    {
        $query = "SELECT date, weight, units FROM tbl_weight WHERE user_id = ? ";

        if( strcmp( $period, "ALL") != 0 )
        {
        	$query .= "AND DATE_SUB(CURDATE(),INTERVAL 1 ";
        	$query .= $period;
        	$query .= ") <= date";
        }
        
        $user_id = $this->session->userdata('id' );
        
        return $this->db->query($query, array( $user_id ) );
    }
}  