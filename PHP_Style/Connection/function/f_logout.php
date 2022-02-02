<?php 

include '../caller.php';

session_start() ;
session_destroy() ;

echo "<script type='text/javascript'>document.location.href='{$homeurl}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $homeurl . '">';

