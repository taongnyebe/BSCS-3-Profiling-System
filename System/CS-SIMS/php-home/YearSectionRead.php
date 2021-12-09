<?php
      include_once "../php-constant/MainHandler.php";

      $count = mysqli_fetch_assoc(mysqli_query($db->con, "SELECT COUNT(id) AS count FROM yearsection_tb;")) or die ("0");
      
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
            
            $sql = mysqli_query($db->con, "SELECT * FROM yearsection_tb;");

            $resultArray = array();

            while ($item = mysqli_fetch_array($sql, MYSQLI_ASSOC))
            {
                  $resultArray[] = $item;
            }

            array_map(function($item)
            {
                  echo $item['id']."\t".$item['year']."\t".$item['section']."\t";
            }, $resultArray);
            
      }
?>