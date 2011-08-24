<?php

class Food_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function add_food( $_POST )
    {
        extract($_POST);
	    
	    $fields = array($this->session->userdata('id'), $brand, $description, $amount, $units, $calories,
	            		$sodium, $totalfat, $potassium, $saturated, $carbs,
	            		$polyunsaturated, $fiber, $monounsaturated, $sugars,
	            		$trans, $protein, $cholesterol, $vitamin_a, $calcium,
	            		$vitamin_c, $iron);
	            		
        $query_str = "INSERT INTO tbl_food(user_id, brand, description, amount, units, calories,
	            		sodium, totalfat, potassium, saturated, carbs,
	            		polyunsaturated, fiber, monounsaturated, sugars,
	            		trans, protein, cholesterol, vitamin_a, calcium,
	            		vitamin_c, iron) VALUEs ( ?, ?, ?, ?, ?,
        											  ?, ?, ?, ?, ?,
        											  ?, ?, ?, ?, ?,
        											 ?, ?, ?, ?, ?, ?, ? )";

        $this->db->query( $query_str, $fields );

        redirect('trackmacros/foods');
    }
    
    function get_foods()
    {
            	            		
        $query_str = "SELECT id, brand, description 
        			  FROM tbl_food 
        			  WHERE user_id = ?";

        return $this->db->query( $query_str, $this->session->userdata('id') );

    }
    
    function get_food_by_id()
    {
            	            		
        $query_str = "SELECT id, brand, description, amount, protein, carbs, totalfat, calories 
        			  FROM tbl_food 
        			  WHERE concat_ws(' ',brand,description) = ? AND user_id = ?";
        $search = str_replace("%20", " ", $this->uri->segment(3));
			
        return $this->db->query( $query_str, array($search,$this->session->userdata('id')) );

    }
    
    function get_food_branddesc($brand)
    {
            	            		
        $query_str = "SELECT id from tbl_food where concat_ws(' ',brand,description) = ?";

        $result = $this->db->query($query_str, $brand);

        if( $result->num_rows() == 1 )
        {
            //food exists
            $row = $result->row(0);
            return $row->id;
        }
        else
        {
            //food doesn't exist
        	return 0;
        }
    	
    }
    
    function food_exists($brand, $description)
    {

        $query_str = "SELECT id from tbl_food where brand = ? and description = ?";

        $result = $this->db->query($query_str, $brand, $description);

        if( $result->num_rows() > 0 )
        {
            //food exists
            return true;
        }
        else
        {
            //food doesn't exist
            return false;
        }
    }
}