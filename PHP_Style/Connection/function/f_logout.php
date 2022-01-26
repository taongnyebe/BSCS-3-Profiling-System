<?php 

include '../caller.php';

session_start() ;
session_destroy() ;

header("location:".$homedir);

