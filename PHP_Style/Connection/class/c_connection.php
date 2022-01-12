<?php

class Connection
{
      protected $host = 'localhost';
      protected $user = 'root';
      protected $password = '';
      protected $database = 'cs-sims';

      public $con = null;

      public function __construct()
      {
            $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database);

            if ($this->con->connect_error) {
                  echo 'Fail Connection' . $this->con->connect_error;
            }
      }

      public function __destruct()
      {
            $this->closeConnection();
      }
      
      // clossing Connection
      protected function closeConnection()
      {
            if ($this->con != null) {
                  $this->con->close();
                  $this->con = null;
            }
      }
}