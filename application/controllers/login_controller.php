<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


//    public function index()
//	{
//	        $this->load->helper(array('form'));
//                $this->load->view('login_view');
//        
//	}
//        
        function index() 
        {
            
            if( $this->session->userdata('isLoggedIn') ) 
                { 
                $this->show_login();
                //redirect('/Home/');
        
               } 
            else 
               {
            
               $this->show_login();
               }
        }

    function login_user() 
    {
        // Create an instance of the user model
        $this->load->model('user_model');

        // Grab the email and password from the form POST
        $email = $this->input->post('login');
        $pass  = $this->input->post('password');

        //Ensure values exist for email and pass, and validate the user's credentials
        if( $email && $pass && $this->user_model->validate_user($email,$pass)) {
            // If the user is valid, redirect to the main view
       
                redirect('/Admin_controller');
        } else {
            // Otherwise show the login screen with an error message.
           $this->show_login(true);
        }
    }
    //control how to display login page
     function show_login( $show_error = false ) {
        $data['error'] = $show_error;

        $this->load->helper('form');
        
        $this->load->view('login_view',$data);
    }
        
}
