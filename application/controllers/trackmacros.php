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
    
    public function about()
	{
        
        $data['main_content'] = 'about';
        $this->load->view('template', $data);
	}
    
    public function main_page()
    {
        if( $this->session->userdata('logged_in') )
        {
            echo 'You are logged in and you may view this lovely page.';
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
            $user_id = $this->User_model->check_login($username, $password);

            if( !$user_id )
            {
                //login failed
                $this->session->set_flashdata('login_error', TRUE);
                redirect('trackmacros/login');
            }
            else
            {
                //login the user
                $this->session->set_userdata( array(
                                'logged_in' => TRUE, 
                                'user_id' => $user_id ) );

               redirect('trackmacros/main_page');
            }
        }
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
    }

    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numberic|min_length[6]|xss_clean|strtolower|callback_username_not_exists');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|xss_clean');
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
            $email = $this->input->post('email');

            $activation_code = $this->_random_string(10);

            $this->User_model->register_user($username, $password, $name, $email, $activation_code);
        
            // email confirmation
            $this->load->library('email');
            $this->email->from('matt.navarret@gmail.com', 'TrackMacros');
            $this->email->to($email);
            $this->email->subject('Registration Confirmation');
            $this->email->message('Please click this link to confirm your registration '. anchor('http://trackmacros.com/index.php/trackmacros/register_confirm/' . $activation_code, 'Confirm Registration'));
            $this->email->send();
            // confirmation message view
            echo 'Please click this link to confirm your registration '. anchor('http://trackmacros.com/index.php/trackmacros/register_confirm/' . $activation_code, 'Confirm Registration');
        }
    }

    function register_confirm()
    {
        $registration_code = $this->uri->segment(3);

        if( $registration_code == '' )
        {
            echo 'Error no registration code in URL';
            exit();
        }

        $registration_confirmed = $this->User_model->confirm_registration($registration_code);

        if( $registration_confirmed )
        {
            echo 'You have successfully registered!';
        }
        else
        {
            echo 'You have failed to register - no record found for that activation code';
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
