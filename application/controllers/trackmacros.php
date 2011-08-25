<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trackmacros extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://trackmacros.com/index.php/trackmacros
	 *	- or -  
	 * 		http://trackmacros.com/index.php/trackmacros/index
	 *	- or -
	 *	    http://trackmacros.com/trackmacros (since config.php and .htaccess has been changed)
	 *	- or -
	 *	    http://trackmacros.com/trackmacros/index 
	 *
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://trackmacros.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/trackmacros/<method_name>
	 *  - or -
	 *        /trackmacros/<method_name> (because of config.php and .htaccess has been changed)
	 */
	public function __construct()
    {
        parent::__construct();
    }

    public function index()
	{
        
        $data['main_content'] = 'home';
        $this->load->view('template', $data);
	}
    
    public function profile()
	{
		if( $this->session->userdata('logged_in') )
		{   $data['main_content'] = 'profile';
        	$this->load->view('template', $data);
		}
		else
		{
			redirect('trackmacros/login');
		}
	}
    
    public function changepassword()
	{
		if( $this->session->userdata('logged_in') )
		{   $data['main_content'] = 'changepassword';
        	$this->load->view('template', $data);
		}
		else
		{
			redirect('trackmacros/login');
		}
	}
	
    public function updatepassword()
	{
		if( $this->session->userdata('logged_in') )
		{   
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|xss_clean');
        	$this->form_validation->set_rules('newpassword', 'New Password', 'trim|required|min_length[6]|xss_clean');
        	$this->form_validation->set_rules('confirmnewpassword', 'Confirm New Password', 'trim|required|min_length[6]|xss_clean|matches[newpassword]');

        	if( $this->form_validation->run() == FALSE )
        	{
            	// hasn't been run or there are validation errors
            	$data['main_content'] = 'changepassword';
            	$this->load->view('template', $data);
        	}
			else 
			{			
				// everything is good - process the form - write the data into the db
	            $password = $this->input->post('password');
	            $newpassword = $this->input->post('newpassword');
	
	            if( $this->User_model->update_password($password, $newpassword) == FALSE )
	            {
	            	$this->session->set_flashdata('updated_password_failed', TRUE);
	            	$data['main_content'] = 'changepassword';
            		$this->load->view('template', $data);
	            }
	        	else
	        	{
	        		$this->session->set_flashdata('updated_password_successful', TRUE);
					redirect('trackmacros/profile');
	        	}
			}
		}
        else
		{
			redirect('trackmacros/login');
		}
	}	
	
	public function update_profile()
	{
		if( $this->session->userdata('logged_in') )
		{   
			$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[6]|max_length[125]|xss_clean');
        	$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|min_length[6]|xss_clean|valid_email');

        	if( $this->form_validation->run() == FALSE )
        	{
            	// hasn't been run or there are validation errors
            	$data['main_content'] = 'profile';
            	$this->load->view('template', $data);
        	}
			else 
			{			
				// everything is good - process the form - write the data into the db
	            $name = $this->input->post('name');
	            $email_address = $this->input->post('email_address');
	
	            $this->User_model->update_user($name, $email_address);
	        
                $this->session->set_userdata( array(
                				'name' => $name,
                				'email_address' => $email_address ) );
                $this->session->set_flashdata('updated_profile_successful', TRUE);
                $data['main_content'] = 'profile';
            	$this->load->view('template', $data);
			}
		}
        else
		{
			redirect('trackmacros/login');
		}
	}
	
	public function foods()
	{
        if( $this->session->userdata('logged_in') )
        {   $data['main_content'] = 'foods';
        	$this->load->view('template', $data);
        }
        else
		{
			redirect('trackmacros/login');
		}        
	}

    public function addfoods()
	{
		if( $this->session->userdata('logged_in') )
		{   $data['main_content'] = 'addfoods';
        	$this->load->view('template', $data);
		}
		else
		{
			redirect('trackmacros/login');
		}
	}	

	public function addfoodform()
	{
		if( $this->session->userdata('logged_in') )
		{
			$this->form_validation->set_rules('brand', 'Brand', 'trim|required|min_length[2]|xss_clean|valid_food');
			$this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[2]|xss_clean|valid_food');
	        $this->form_validation->set_message('valid_food', 'The %s field cannot contain \'-\' or \'/\' characters.');
			$this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric');
	        $this->form_validation->set_rules('units', 'Units', 'trim|required');
	        $this->form_validation->set_rules('calories', 'Calories', 'trim|required|numeric');
	        $this->form_validation->set_rules('sodium', 'Sodium', 'trim|required|numeric');
	        $this->form_validation->set_rules('totalfat', 'Total Fat', 'trim|required|numeric');
	        $this->form_validation->set_rules('potassium', 'Potassium', 'trim|required|numeric');
	        $this->form_validation->set_rules('saturated', 'Saturated', 'trim|required|numeric');
	        $this->form_validation->set_rules('carbs', 'Total Carbs', 'trim|required|numeric');
	        $this->form_validation->set_rules('polyunsaturated', 'Polyunsaturated', 'trim|required|numeric');
	        $this->form_validation->set_rules('fiber', 'Dietary Fiber', 'trim|required|numeric');
	        $this->form_validation->set_rules('monounsaturated', 'Monounsaturated', 'trim|required|numeric');
	        $this->form_validation->set_rules('sugars', 'Sugars', 'trim|required|numeric');
	        $this->form_validation->set_rules('trans', 'Trans', 'trim|required|numeric');
	        $this->form_validation->set_rules('protein', 'Protein', 'trim|required|numeric');
	        $this->form_validation->set_rules('cholesterol', 'Cholesterol', 'trim|required|numeric');
	        $this->form_validation->set_rules('vitamin_a', 'Vitamin A', 'trim|required|numeric');
	        $this->form_validation->set_rules('calcium', 'Calcium', 'trim|required|numeric');
	        $this->form_validation->set_rules('vitamin_c', 'Vitamin C', 'trim|required|numeric');
	        $this->form_validation->set_rules('iron', 'Iron', 'trim|required|numeric');
	        
	        
	        if( $this->form_validation->run() == FALSE )
	        {
	            // hasn't been run or there are validation errors
	            $data['main_content'] = 'addfoods';
	            $this->load->view('template', $data);
	        }
	        else
	        {
	            // everything is good - process the form - write the data into the db
	        	$this->Food_model->add_food($_POST);
	        }	
		}
	    else
		{
			redirect('trackmacros/login');
		}		
	}
	
	
	public function addfooditem()
	{
		if( $this->session->userdata('logged_in') )
		{
			extract($_POST);
	        $this->form_validation->set_rules('brand', 'Brand', 'trim|required|min_length[2]|xss_clean');
	        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric');
	        $this->form_validation->set_rules('units', 'Units', 'trim|required');
	        
	        if( $this->form_validation->run() == FALSE )
	        {
	            // hasn't been run or there are validation errors
	            $data['main_content'] = 'addfoods';
	            $this->load->view('template', $data);
	        }
	        else
	        {
	            // everything is good - process the form - write the data into the db
	            extract($_POST);
	    		$food_id = $this->Food_model->get_food_branddesc($brand);
	    		
	    		if( $food_id != 0 )
	    		{
	    			$fields = array($this->session->userdata('id'), $food_id, $amount, $units, date('Y-m-d'));	
	    		}
	            
				$this->Dailyfood_model->add_food_item($fields);
	        }

		}
	    else
		{
			redirect('trackmacros/login');
		}		
	}
	
    public function deletefooditem()
	{
		if( $this->session->userdata('logged_in') )
		{
			$this->Dailyfood_model->delete_food_item();
		}
	}
	
	public function weight()
	{
        if( $this->session->userdata('logged_in') )
        {   $data['main_content'] = 'weight';
        	$this->load->view('template', $data);
        }
        else
		{
			redirect('trackmacros/login');
		}           
	}
	
    public function about()
	{
        $data['main_content'] = 'about';
        $this->load->view('template', $data);
	}
	
    public function guides()
	{
        if( $this->session->userdata('logged_in') )		
        {   $data['main_content'] = 'guides';
        	$this->load->view('template', $data);
        }
        else
 		{
			redirect('trackmacros/login');
		}          
	}
	
	public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numberic|min_length[6]|xss_clean|strtolower');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|xss_clean');
        if( $this->form_validation->run() == FALSE )
        {
            // hasn't been run or there are validation errors
            $data['main_content'] = 'login';
            $this->load->view('template', $data);
        }
        else
        {
            // everything is good - process the input and login the user
            extract($_POST);
          
            $query = $this->User_model->check_login($username, $password);

            if( $query->num_rows() <= 0 )
            {
                //login failed
                $this->session->set_flashdata('login_error_incorrect', TRUE);
                redirect('trackmacros/login');
            }
            
            $row = $query->row();
            
            if( $row->activated == 0 )
            {
            	$this->session->set_flashdata('login_error_activate', TRUE);
                redirect('trackmacros/login');
            }
            else
            {
                //login the user
                $this->session->set_userdata( array(
                                'logged_in' => TRUE, 
                                'id' => $row->id,
                				'username' => $row->username,
                				'name' => $row->name,
                				'email_address' => $row->email_address,
                				'activated' => $row->activated ) );

               redirect('');
            }
        }
    }
    
	public function addupdate_weight()
    {
        if( $this->session->userdata('logged_in') )
        {
	    	$this->form_validation->set_rules('weight', 'Weight', 'trim|required|numeric|xss_clean');
	        $this->form_validation->set_rules('date', 'Date', 'trim|required|xss_clean|valid_date');
	        $this->form_validation->set_message('valid_date', 'The %s field must be entered in MM/DD/YYYY format.');
			
	        if( $this->form_validation->run() == FALSE )
	        {
	        	// hasn't been run or there are validation errors
	            $data['main_content'] = 'weight';
	            $this->load->view('template', $data);
	        }
	        else
	        {
	            // everything is good - process the input and add the user's weight
	            extract($_POST);
				$this->Weight_model->add_update($date, $weight, $unit);
				redirect('trackmacros/weight');
	        }
        }
        else
        {
        	redirct('trackmacros/login');
        }
    }

	public function view_weights()
    {
        if( $this->session->userdata('logged_in') )
        {
	    	extract($_POST);
	        $result = $this->Weight_model->view($period);
	        $data['result'] = $result;
	        $data['period'] = $period;
			$this->load->view('includes/header');
			$this->load->view('includes/style');
			$this->load->view('includes/endheader');
			$this->load->view('includes/navigation');
			$this->load->view('view_weights', $data);
			$this->load->view('includes/bottom');   
			$this->load->view('includes/footer');
        }
        else
        {
        	redirect('trackmacros/login');
        }
    }

    
	public function email_weights()
	{
		if( $this->session->userdata('logged_in') )
		{
			extract($_POST);
	        // email weigh ins
	        $this->load->library('email');
	        $config['mailtype'] = 'html';
	        $this->email->from('matt.navarret@gmail.com', 'TrackMacros');
	        $this->email->to($email_address);
	        $this->email->subject('Weigh ins for the ');
	        $this->email->message($weights . "\n" . $body);
	        $this->email->send();
            $this->session->set_flashdata('email_successful', TRUE);
	        redirect('trackmacros/weight');
		}
		else
		{
			redirect('trackmacros/login');
		}	        
	}
	
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('');
    }

    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numberic|min_length[6]|xss_clean|strtolower|callback_username_not_exists');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|xss_clean|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|xss_clean');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[6]|max_length[125]|xss_clean');
        $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|min_length[6]|xss_clean|valid_email');

        if( $this->form_validation->run() == FALSE )
        {
            // hasn't been run or there are validation errors
            $data['main_content'] = 'register';
            $this->load->view('template', $data);
        }
        else
        {
            // everything is good - process the form - write the data into the db
            $username = $this->input->post('username');
            $name = $this->input->post('name');
            $password = $this->input->post('password');
            $email_address = $this->input->post('email_address');

            $activation_code = $this->_random_string(10);

            $this->User_model->register_user($username, $password, $name, $email_address, $activation_code);
        
            // email confirmation
            $this->load->library('email');
            $config['mailtype'] = 'html';
            $this->email->from('matt.navarret@gmail.com', 'TrackMacros');
            $this->email->to($email_address);
            $this->email->subject('Registration Confirmation');
            $this->email->message('Please click this link or copy and paste it into your brower\'s address bar to confirm your registration ' . 
            	'http://trackmacros.com/trackmacros/register_confirm/' . $activation_code);
            $this->email->send();
            // confirmation message view
     		$data['main_content'] = 'registration';
        	$data['registration_status'] = 2;
        	$this->load->view('template', $data);
        }
    }

    function register_confirm()
    {
        $registration_code = $this->uri->segment(3);
        echo "$registration_code";

        if( $registration_code == '' )
        {
     		$data['main_content'] = 'registration';
        	$data['registration_status'] = 0;
        	$this->load->view('template', $data);
        	return;
        }

        $registration_confirmed = $this->User_model->confirm_registration($registration_code);

        if( $registration_confirmed )
        {
            $data['main_content'] = 'registration';
        	$data['registration_status'] = 1;
        	$this->load->view('template', $data);
        }
        else
        {
            $data['main_content'] = 'registration';
        	$data['registration_status'] = 3;
        	$this->load->view('template', $data);
        }
    }
    
    function username_not_exists($username)
    {
        $this->form_validation->set_message('username_not_exists', 'That %s already exists. Please choose a different username.');

        if( $this->User_model->username_exists($username) )
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    function _random_string($length)
    {
        $len = $length;
        $base = 'ABCDEFGHKLMNOPQRSTWXYZabcdefghjkmnpqrstwxyz123456789';
        $max = strlen($base)-1;
        $activatecode = '';
        mt_srand((double)microtime()*1000000);
        while( strlen( $activatecode ) < $len+1 )
            $activatecode.=$base{mt_rand(0,$max)};

        return $activatecode;
    }
}

/* End of file trackmacros.php */
/* Location: ./application/controllers/trackmacros.php */
