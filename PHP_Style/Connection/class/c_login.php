<?php 

class Login
{
      protected $username;
      protected $password;
      protected $db;

      private $result;

      public function __construct(Connection $db)
      {
            if(!isset($db->con)) return null;
            $this->db = $db;
      }

      public function getUserPassword($username, $password)
      {
            if ($username != null && $password != null)
            {
                  $this->username = $username;
                  $this->password = $password;
            }

            $this->checkUser();

            return $this->result;
      }

      private function checkUser()
      {
            if ($connection = mysqli_query($this->db->con,"SELECT * FROM user_tb WHERE username='$this->username'"))
            {
                  if ($userdata = mysqli_fetch_assoc($connection)) {
                        if ($userdata['password'] == $this->password) 
                              $this->result = 0;
                        else
                              $this->result = 1;
      
                  }else
                        $this->result = 2;
            }else
                  $this->result = 502;   
      }
}