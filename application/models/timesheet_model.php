<?php
Class timesheet_model extends CI_Model
{
    
  /*
   *This Function validates user and pass against DB
   */
function set_timesheet($sheets)
 {
     $data = array();
     $questions= array_keys($question_key_answer_array[0]);
     for ($i = 0; $i < count($question_key_answer_array[0]); ++$i) 
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