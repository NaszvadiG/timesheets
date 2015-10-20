<?php
Class timesheet_model extends CI_Model
{
    
  /*
   *This Function validates user and pass against DB
   */
function set_timesheet($sheets=NULL)
 {
     $data = array();
     $questions= array_keys($sheets[0]);
     
           foreach ($sheets as $innerArray) {
    //  Check type
               $fields = $this->db->list_fields('timesheets');
                  $counter++;
    if (is_array($innerArray)){
        //  Scan through inner loop
        //$return .= '[';
             foreach ($innerArray as $value) 
             {
           // $return .= "'".$value."',";
            
            
            
             }
       // $return .= "'= SUM(F$counter:L$counter)'";
       // $return=rtrim($return, ",");
        $return .= '],';
    }
    
} 
/*****



 *****/
function get_employeeid($emp_key)
 {
        //$a = sha1($password);
   $this -> db -> select('id');
   $this -> db -> from('employees');
   $this -> db -> where('emp_key', $emp_key);
  // $this -> db -> where('password', sha1($password));
  // $this -> db -> limit(1);
 
   $query = $this -> db -> get();
   $rows= $query->result_array();
 return $rows;
 }
    
 
     
     for ($i = 0; $i < count($sheets[0]); ++$i) 
     {
         
        $data[$i]= array(
            "session_key" => $session_key,
            "event_key" => $event_key,
            "company_key" => $company_key,
            "question_key" => $questions[$i],
            "answer" => $question_key_answer_array[0][$questions[$i]],
            "latitude" => $geolocation[0]['latitude'],
            "longitude" => $geolocation[0]['longitude'],
            "geolocation" => $geo
            );
        
       
    }
    return $this->db->insert_batch('events_questions', $data);  
     
 }
 
  function get_timesheet()
 {
     //$a = sha1($password);
   $this -> db -> select('*');
   $this -> db -> from('custom_timesheet');
  // $this -> db -> where('username', $username);
  // $this -> db -> where('password', sha1($password));
  // $this -> db -> limit(1);
 
   $query = $this -> db -> get();
   $rows= $query->result_array();
 return $rows;
 }
 
 function get_timesheet_task()
 {
     //$a = sha1($password);
     $this -> db -> distinct();
   $this -> db -> select('task');
   $this -> db -> from('timesheets');
  // $this -> db -> where('username', $username);
  // $this -> db -> where('password', sha1($password));
  // $this -> db -> limit(1);
 
   $query = $this -> db -> get();
   $rows= $query->result_array();
 return $rows;
 }
    private function set_session($userdata) {
        // session->set_userdata is a CodeIgniter function that
        // stores data in CodeIgniter's session storage.  Some of the values are built in
        // to CodeIgniter, others are added.  See CodeIgniter's documentation for details.
        $this->session->set_userdata( array(
                'id'=>$userdata->id,
                'name'=> $userdata->first_name,
                'username'=>$userdata->username,
              
                'isLoggedIn'=>true
            )
        );
    }
 
 
 
}
?>