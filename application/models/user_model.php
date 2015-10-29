<?php
Class user_model extends CI_Model
{
    
  /*
   *This Function validates user and pass against DB
   */
 function validate_user($username, $password)
 {
     $a = sha1($password);
   $this -> db -> select('id,first_name,last_name, username, password,emp_key,picture');
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
                'first_name'=> $userdata->first_name,
                'last_name' => $userdata->last_name,
                'username'=>$userdata->username,
                'emp_key'=>$userdata->emp_key,
                'avatar'=>$userdata->picture,
                'isLoggedIn'=>true
            )
        );
    }
 
 
 
}
?>