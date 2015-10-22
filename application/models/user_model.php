<?php
Class user_model extends CI_Model
{
    
  /*
   *This Function validates user and pass against DB
   */
 function validate_user($username, $password)
 {
     $a = sha1($password);
   $this -> db -> select('id,first_name, username, password,emp_key');
   $this -> db -> from('employees');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', sha1($password));
   $this -> db -> limit(1);
 
   $query = $this -> db -> get();
   $userdata = $query->result();
   if($query -> num_rows() == 1)
   {
       $this->set_session($userdata[0] );
     return true;
   }
   else
   {
     return false;
   }
 }
 
 
    private function set_session($userdata) {
        // session->set_userdata is a CodeIgniter function that
        // stores data in CodeIgniter's session storage.  Some of the values are built in
        // to CodeIgniter, others are added.  See CodeIgniter's documentation for details.
        $this->session->set_userdata( array(
                'id'=>$userdata->id,
                'name'=> $userdata->first_name,
                'username'=>$userdata->username,
                'emp_key'=>$userdata->emp_key,
                'isLoggedIn'=>true
            )
        );
    }
 
 
 
}
?>