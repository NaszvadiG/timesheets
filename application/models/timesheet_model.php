<?php
Class timesheet_model extends CI_Model
{
    
  /*
   *This Function validates user and pass against DB
   */
function set_timesheet($sheets=NULL)
 {
     $data = array();
     $datafordelete = array();
     $questions= array_keys($sheets[0]);
     $fields = $this->db->list_fields('timesheet_view_insert');
     $outer_counter=-1; 
          foreach ($sheets as $innerArray) 
               {
                                           
                  $counter=-1;
                if (is_array($innerArray) && is_numeric($this->get_employeeid($innerArray[0])))
                    {
        //  Scan through inner loop
        //$return .= '['
        $outer_counter++;
                        foreach ($innerArray as $value) 
                            {
                                $counter++;
                             
                                switch ($counter) 
                                        {
                                            case 0:
//                                                  if(is_numeric($this->get_employeeid($value)))
//                                                {
                                                    $data[$outer_counter][$fields[$counter]]=$this->get_employeeid($value);
                                                    $datafordelete[$outer_counter][$fields[$counter]]=$this->get_employeeid($value);
                                               //}
                                                break;
                                            
                                            case 2:
//                                                 if(is_numeric($this->get_projectid($value)))
//                                                {
                                                    $data[$outer_counter][$fields[$counter]]=$this->get_projectid($value);
                                                    $datafordelete[$outer_counter][$fields[$counter]]=$this->get_projectid($value);
//                                                }
                                                break;
                                             case 12:
                                              
                                                break;  
                                            case 13:
                                              $datafordelete[$outer_counter][$fields[$counter-1]]=$value;
                                                break; 
                                            default :
                                                
                                                $data[$outer_counter][$fields[$counter]]=$value;
                                                $datafordelete[$outer_counter][$fields[$counter]]=$value;
                                        }
                                
                 
           // $return .= "'".$value."',";
            
            
            
                            }
       // $return .= "'= SUM(F$counter:L$counter)'";
       // $return=rtrim($return, ",");
                // $return .= '],';
                    }
    
                } 
                
                 foreach ($data as $timesheet) 
               {
                $bold = array_slice($timesheet, 0, 3);
$this->db->delete('timesheets', $bold); 

            } 
$this->db->insert_batch('timesheets', $data);  


//code to delete selected data
foreach ($datafordelete as $timesheet) 
               {
                $bold = array_slice($timesheet, 0, 13);
                if($bold['delete']==1)
                 $this->db->delete('timesheets', array_slice($bold,0,12)); 

            } 
 $bold= array('week_end'=>'0000-00-00');
 $this->db->delete('timesheets', $bold);        
    /* for ($i = 0; $i < count($sheets[0]); ++$i) 
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
    return $this->db->insert_batch('events_questions', $data);  */
     
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
   if($query->num_rows()>0)
      {
        $rows= $query->result_array();
        $result=$rows[0]['id'];
        return $result;
      }
    else 
        {
        return false;
         }
 }
 
 function get_projectid($key)
 {
        //$a = sha1($password);
     if(strlen($key)<2)
                  $key='Office'    ;                      
   $this -> db -> select('id');
   $this -> db -> from('projects');
   $this -> db -> where('project_key', $key);
  // $this -> db -> where('password', sha1($password));
  // $this -> db -> limit(1);
 
   $query = $this -> db -> get();
    if($query->num_rows()>0)
      {
        $rows= $query->result_array();
        $result=$rows[0]['id'];
        return $result;
      }
    else 
        {
        return false;
         }
 }
 
 function get_project_keys()
 {
        //$a = sha1($password);
   $this -> db -> select('project_key');
   $this -> db -> from('projects');
  //$this -> db -> where('project_key', $key);
  // $this -> db -> where('password', sha1($password));
  // $this -> db -> limit(1);
 
     $query = $this -> db -> get();
     $rows= $query->result_array();
     return $rows;
 }
 
 function get_date_for_day($day=7)
 {
            //$a = sha1($password);
   $this -> db -> select('fulldate');
   $this -> db -> from('datedim');
   $this -> db -> where('dayofweek', $day);
   $this -> db -> where('year', date("Y"));
   $this -> db -> where('fulldate <=', $this->get_end_week(date("Y-m-d")));
  // $this -> db -> where('password', sha1($password));
  // $this -> db -> limit(1);
 
   $query = $this -> db -> get();
   $rows= $query->result_array();
 return $rows; 
   
 }
 
  function get_timesheet($employee_key=null,$week_end=null)
 {
     //$a = sha1($password);
      $b = $this->get_end_week($week_end);
   $this -> db -> select('*');
   $this -> db -> from('custom_timesheet');
   $this -> db -> where('emp_key', $employee_key);
   $this -> db -> where('WE', $this->get_end_week($week_end));
  // $this -> db -> limit(1);
 
   $query = $this -> db -> get();
   $rows= $query->result_array();
 return $rows;
 }
 
 function get_end_week($date)
 {
     
     $query = $this->db->query("select end_of_week('".$date."') as ew");
    // $query = $this -> db -> get();
     $rows= $query->result_array();
     $result=$rows[0]['ew'];
        return $result;
     //return date_add($date,(7-jddayofweek($date)));
     
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