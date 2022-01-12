<?php

class StudentData
{
      protected $db;
      private $table = "studentbasic_tb";

      public function __construct(Connection $db)
      {
            if(!isset($db->con)) return null;
            $this->db = $db;
      }

      public function getDisplayCardData($idsection)
      {
            return $this->checker("SELECT studentbasic_tb.id, studentbasic_tb.family_name, 
                              studentbasic_tb.middle_name, studentbasic_tb.first_name, 
                              studentbasic_tb.suffix, studentbasic_tb.student_id, 
                              studentbasic_tb.profile_filename, studentbasic_tb.gender
                        FROM $this->table 
                        INNER JOIN studentschool_tb 
                        ON studentbasic_tb.id=studentschool_tb.student_id 
                        WHERE studentschool_tb.yearsection_id='$idsection' AND active=1
                        ORDER BY studentbasic_tb.family_name");
      }

      public function getStudentData($id)
      {
            return $this->checker("SELECT * FROM $this->table 
                                    WHERE id=$id AND active=1");
      }

      public function getFullStudentList($limit=null)
      {
            return $this->checker("SELECT $this->table.*, studentschool_tb.id AS school_id FROM $this->table
                                    INNER JOIN studentschool_tb 
                                    ON studentbasic_tb.id=studentschool_tb.student_id
                                    GROUP BY $this->table.id
                                    ORDER BY studentbasic_tb.family_name");
      }

      public function getNewStudentDataID($family_name, $middle_name, $first_name, $suffix, $gender, $birthdate, $contact, $email)
      {
            return $this->singlechecker("SELECT id FROM $this->table 
                                          WHERE family_name='$family_name' && middle_name='$middle_name' && 
                                          first_name='$first_name' && suffix='$suffix' && gender='$gender' 
                                          && date_of_birth='$birthdate' && contact_number='$contact' && email='$email'");
      }

      private function checker($sql_c)
      {
            if($connection = mysqli_query($this->db->con, $sql_c)) {
                  if(mysqli_num_rows($connection)>0) {
                        $studentData = array();

                        while ($item = mysqli_fetch_array($connection, MYSQLI_ASSOC)) {
                              $studentData[]=$item;
                        }

                        return $studentData;
                  } else
                        return 1;
            } else
                  return 2;
      }

      private function singlechecker($sql_c)
      {
            if ($connection = mysqli_query($this->db->con, $sql_c)) {
                  if (mysqli_num_rows($connection)>0) {
                        while ($item = mysqli_fetch_assoc($connection)) {
                              return $item;
                        }

                  } else
                        return 1;
            } else
                  return 2;
      }

      public function setStudentData($family_name, $middle_name, $first_name, $suffix, $gender, $birthdate, $contact, $email, $student_id, $fb_name, $home, $boarding, $studentbasic_id)
      {

            if ($studentbasic_id != "") {
                  $sql_c = "UPDATE $this->table 
                              SET family_name='$family_name', middle_name='$middle_name', first_name='$first_name', suffix='$suffix', 
                              gender='$gender', date_of_birth='$birthdate', contact_number='$contact', email='$email', student_id='$student_id',
                              fb_name='$fb_name', home='$home', boarding='$boarding '
                              WHERE id='$studentbasic_id'";
                  return mysqli_query($this->db->con, $sql_c);
            } else {
                  $sql_c = "INSERT INTO $this->table 
                              SET family_name='$family_name', middle_name='$middle_name', first_name='$first_name', suffix='$suffix', 
                              gender='$gender', date_of_birth='$birthdate', contact_number='$contact', email='$email', student_id='$student_id',
                              fb_name='$fb_name', home='$home', boarding='$boarding'";
                  return mysqli_query($this->db->con, $sql_c);
            }
            
      }

      public function setProfileImage($profile_img, $studentbasic_id){
            $sql_c = "UPDATE $this->table
                        SET profile_filename='$profile_img'
                        WHERE id='$studentbasic_id'";
            return mysqli_query($this->db->con, $sql_c);
            

      }
      
}