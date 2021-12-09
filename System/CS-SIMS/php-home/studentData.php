<?php
      include_once "../php-constant/MainHandler.php";

      $count = mysqli_fetch_assoc(mysqli_query($db->con, "SELECT COUNT(id) AS count FROM studentschool_tb WHERE yearsection_id=1;")) or die ("0");
      
      if ($count == 0) {
            echo '1';
      }
      
      if ($count['count'] == 0)
      {
            echo "Table is Empty";
      }
      else
      {
            $b = (int)$count['count'];

            echo $b."\t";
            
            $sql = mysqli_query($db->con, "SELECT studentbasic_tb.*, studentschool_tb.regular, studentschool_tb.student_status, yearsection_tb.year, yearsection_tb.section FROM studentschool_tb INNER JOIN yearsection_tb ON studentschool_tb.yearsection_id=yearsection_tb.id INNER JOIN studentbasic_tb ON studentschool_tb.student_id=studentbasic_tb.id;");

            $resultArray = array();

            while ($items = mysqli_fetch_array($sql, MYSQLI_ASSOC))
            {
                  $resultArray[] = $items;
            }

            array_map(function($item)
            {
                  echo $item['id']."\t";
                  echo $item['first_name']."\t".$item['middle_name']."\t".$item['family_name']."\t".$item['suffix']."\t";
                  echo $item['gender']."\t".$item['date_of_birth']."\t";
                  echo $item['contact_number']."\t".$item['email']."\t";
                  echo $item['guardian']."\t".$item['parent']."\t".$item['g_contact_number']."\t";
                  echo $item['profile_filename']."\t";
                  echo $item['regular']."\t".$item['student_status']."\t";
                  echo $item['year']."\t".$item['section']."\t";
            }, $resultArray);
            
      }
?>