<?php

class User_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function register_user( $username, $password, $name, $email_address, $activation_code )
    {
        $sha1_password = sha1($password);

        $query_str = "INSERT INTO tbl_user(username, password, name, email_address, activation_code) VALUEs ( ?, ?, ?, ?, ?)";

        $this->db->query( $query_str, array( $username, $sha1_password, $name, $email_address, $activation_code ) );

    }

    function confirm_registration($registration_code)
    {
        $query_str = "SELECT id FROM tbl_user WHERE activation_code = ?";

        $result = $this->db->query($query_str, $registration_code );

        if( $result->num_rows() == 1 )
        {
            $query_str = "UPDATE tbl_user SET activated = 1 WHERE activation_code = ?";
            $result = $this->db->query($query_str, $registration_code );
            return true;
        }
        else
        {
            return false;
        }
    }
    
    function check_login($username, $password)
    {
        $query_str = "SELECT id FROM tbl_user WHERE username = ? AND password = ?";
        $sha1_password = sha1($password);

        $result = $this->db->query($query_str, array($username,$sha1_password) );

        if( $result->num_rows() == 1 )
        {
            return $result->row(0)->id;
        }
        else
        {
            return false;
        }
    }


    function username_exists($username)
    {

        $query_str = "SELECT username from tbl_user where username = ?";

        $result = $this->db->query($query_str, $username);

        if( $result->num_rows() > 0 )
        {
            //user exists
            return true;
        }
        else
        {
            //user doesn't exist
            return false;
        }
    }
}
