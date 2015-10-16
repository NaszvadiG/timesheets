<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

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
	public function index()
	{
		//$this->simple_table_management('events','Events');
            $this->load->view('timesheet');
	}
        
        
          function simple_table_management($tablename=null,$subject=null,$theme='flexigrid',$page='admin_console_view')
	{

		$this->grocery_crud->set_table($tablename);
                $this->grocery_crud->set_theme($theme);
                $this->grocery_crud->set_subject($subject);     
		$output = $this->grocery_crud->render();
		$this->Secure_output($output,$page);
	}  
        
        function Secure_output($output = null,$page)
	{
           if($this->session->userdata('isLoggedIn') ) 
                 {
                    $this->load->view($page,$output);
                 }
                 else 
                     redirect('/Login_controller/');
	}
        
        function events_management()
        {
          $this->simple_table_management('events','Events');  
        }
        
        function timesheets_management()
        {
          $this->load->view('timesheet'); 
        }
        
        function timesheets_management2()
        {
          $this->simple_table_management('timesheets','Timesheet'); 
        }
        
        function Personel_management()
        {
            $this->simple_table_management('employees','Employees');
        }
        
        function clients_management()
        {
            $this->simple_table_management('clients','Clients');
        }
        
        function cities_management()
        {   
            $this->simple_table_management('cities','City');
            
        }
        
        function states_management()
        {   
            $this->simple_table_management('provinces','State');
            
        }
        
        function countries_management()
        {   
            $this->simple_table_management('countries','Country');
            
        }
        
        function projects_management()
        {   
            //$this->simple_table_management('projects','Projects');
            
            $this->grocery_crud->set_table('projects');
                $this->grocery_crud->set_theme('flexigrid');
                $this->grocery_crud->set_subject('Projects');     
	       $this->grocery_crud->set_relation('created_by','employees','first_name');
              $this->grocery_crud->set_relation('project_manager_id','employees','first_name');
          //$this->grocery_crud->set_field_upload('picture','assets/uploads/files');
          
          $output = $this->grocery_crud->render();
		$this->Secure_output($output,'admin_console_view');
            
        }
        
        function products_management()
        {
          //$this->simple_table_management('Products','Products'); 
          
          $this->grocery_crud->set_table('Products');
                $this->grocery_crud->set_theme('flexigrid');
                $this->grocery_crud->set_subject('Products');     
		
          $this->grocery_crud->set_field_upload('picture','assets/uploads/files');
          
          $output = $this->grocery_crud->render();
		$this->Secure_output($output,'admin_console_view');
        }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
}
