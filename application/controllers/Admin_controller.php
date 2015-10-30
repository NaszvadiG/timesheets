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
            $this->timesheets_management();
           // $this->Secure_output('','dashboard');
	}
        
        
          function simple_table_management($tablename=null,$subject=null,$theme='flexigrid',$page='dashboard')
	{

		$this->grocery_crud->set_table($tablename);
                $this->grocery_crud->set_theme($theme);
                $this->grocery_crud->set_subject($subject);     
		$output = $this->grocery_crud->render();
		$this->Secure_output($output,$page);
	}  
        
        function Secure_output($output = null,$page)
	{
           if($this->session->userdata('isLoggedIn')) 
                 {
                    $this->load->view($page,$output);
                 }
                 else 
                     redirect('/login_controller/');
	}
        
        function events_management()
        {
          $this->simple_table_management('events','Events');  
        }
        
        public function process_timesheet()
	{
          // var_dump( $_POST('total'));
            $a=$this->input->post('total');
            $timesheetarray = json_decode($a);
           
         //  var_dump($betaray);
            $this->load->model('timesheet_model');
            $this->timesheet_model ->set_timesheet($timesheetarray);
            $this->timesheets_load($timesheetarray[0][1]);
            //var_dump(json_decode($_POST('total')));
            //$b=$a;
		//$this->load->view('welcome_message');
	}
        
        function timesheets_management()
        {
           
            $this->timesheets_load();
        }
        
         function timesheets_reload()
        {
           
            $this->timesheets_load($this->input->post('we'));
        }
        /* locad timesheet function according to date
         * 
         * 
        */
        private function timesheets_load($date = null)
        {   if(is_null($date))
               $date = date("Y-m-d");
        
            $this->load->model('timesheet_model');
            $data['timesheet']=$this->timesheet_model ->get_timesheet($this->session->userdata('emp_key'),$date);
            $data['task']=$this->timesheet_model ->get_timesheet_task();
            $data['project_keys']=$this->timesheet_model ->get_project_keys();
            $data['week_ends']=$this->timesheet_model ->get_date_for_day();
          //$this->load->view('timesheet',$data); 
            $this->Secure_output($data,'dashboard');
        }
       
        
        function timesheets_management2()
        {
          //$this->simple_table_management('timesheets','Timesheet'); 
          
            $this->grocery_crud->set_table('timesheets');
            $this->grocery_crud->set_theme('flexigrid');
            $this->grocery_crud->set_subject('Timesheet');     
            $this->grocery_crud->set_primary_key('fulldate','datedim');
	    $this->grocery_crud->set_relation('projectid','projects','project_key')->set_relation('employee_id','employees','{first_name} {last_name}');
                    $this->grocery_crud->set_relation('week_end','datedim','fulldate','dayofweek = 7');
           // $this->grocery_crud->add_fields('projectid','employee_id','task','description','week_end','sunday','monday','tuesday','wednesday','thursday','friday','saturday','created_date');
            //$this->grocery_crud->set_relation('company_id','companies','name');
                //  $this->grocery_crud->display_as('company_id','Company')->display_as('city_id','City');
            
            $this->grocery_crud->field_type('description', 'string');
          $output = $this->grocery_crud->render();
		$this->Secure_output($output,'admin_console_view');
        }
        
        function Personel_management()
        {
           // $this->simple_table_management('employees','Employees');
            
            $this->grocery_crud->set_table('employees');
            $this->grocery_crud->set_theme('flexigrid');
            $this->grocery_crud->set_subject('Employees');     
	    //$this->grocery_crud->set_relation('city_id','cities','name');
            $this->grocery_crud->field_type('password', 'password');
            $this->grocery_crud->set_field_upload('picture','assets/UI/images/employees');
            
            $this->grocery_crud->callback_before_insert(array($this,'encrypt_password_callback'));
            $this->grocery_crud->callback_before_update(array($this,'encrypt_password_callback'));
            
            $output = $this->grocery_crud->render();
		$this->Secure_output($output,'dashboard');
            
        }
        
        function clients_management()
        {
           // $this->simple_table_management('clients','Clients');
            
            $this->grocery_crud->set_table('clients');
            $this->grocery_crud->set_theme('flexigrid');
            $this->grocery_crud->set_subject('Clients');     
	    $this->grocery_crud->set_relation('city_id','cities','name')->set_relation('company_id','companies','name');
             //$this->grocery_crud->set_relation('company_id','companies','name');
                  $this->grocery_crud->display_as('company_id','Company')->display_as('city_id','City');
          $output = $this->grocery_crud->render();
		$this->Secure_output($output,'dashboard');
        }
        
        function company_management()
        {   
            //$this->simple_table_management('companies','Company');
            
            $this->grocery_crud->set_table('companies');
            $this->grocery_crud->set_theme('flexigrid');
            $this->grocery_crud->set_subject('Company');     
	    $this->grocery_crud->set_relation('city_id','cities','name');
            $output = $this->grocery_crud->render();
		$this->Secure_output($output,'dashboard');
            
        }
        
        function cities_management()
        {   
           // $this->simple_table_management('cities','City');
            $this->grocery_crud->set_table('cities');
            $this->grocery_crud->set_theme('flexigrid');
            $this->grocery_crud->set_subject('City');     
	    $this->grocery_crud->set_relation('province_id','provinces','name');
          $output = $this->grocery_crud->render();
		$this->Secure_output($output,'dashboard');
        }
        
        function states_management()
        {   
           // $this->simple_table_management('provinces','State');
            $this->grocery_crud->set_table('provinces');
            $this->grocery_crud->set_theme('flexigrid');
            $this->grocery_crud->set_subject('State');     
	    $this->grocery_crud->set_relation('country_id','countries','name');
          $output = $this->grocery_crud->render();
		$this->Secure_output($output,'dashboard');
            
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
            $this->grocery_crud->set_relation('client_id','clients','{title} {fname} {lname}');
             // $this->grocery_crud->columns('customerName','phone','addressLine1','creditLimit');
            $this->grocery_crud->display_as('project_manager_id','Project manager')->display_as('client_id','Client');
          //$this->grocery_crud->set_field_upload('picture','assets/uploads/files');
          
            $output = $this->grocery_crud->render();
	    $this->Secure_output($output,'dashboard');
            
        }
        
        function products_management()
        {
          //$this->simple_table_management('Products','Products'); 
          
          $this->grocery_crud->set_table('Products');
                $this->grocery_crud->set_theme('flexigrid');
                $this->grocery_crud->set_subject('Products');     
		
          $this->grocery_crud->set_field_upload('picture','assets/uploads/files');
          
          $output = $this->grocery_crud->render();
		$this->Secure_output($output,'dashboard');
        }
        
        
        function encrypt_password_callback($post_array)
        {
            $this->load->model('user_model');
            $old_password = $this->user_model ->get_session_user_password();
            if($old_password==$post_array['password'])
                return $post_array;
            else 
                {
                $post_array['password'] = sha1($post_array['password']);
           return $post_array;
            }
           
        }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
}
