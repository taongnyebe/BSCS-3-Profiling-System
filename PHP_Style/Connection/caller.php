<?php

$homedir = "C:\x"."ampp\htdocs\PHP-Codes\BSCS-3-Profiling-System\PHP_Style";

session_start();

require $homedir.'\Connection\class\c_connection.php';
require $homedir.'\Connection\class\c_login.php';
require $homedir.'\Connection\class\c_delete_data.php';

require $homedir.'\Connection\class\c_yearsection.php';
require $homedir.'\Connection\class\c_student_data.php';
require $homedir.'\Connection\class\c_studentSchool_data.php';
require $homedir.'\Connection\class\c_guardian_data.php';

$db = new Connection();
$login = new Login($db);
$d = new Delete($db);

$ys = new YearSectionData($db);
$sd = new StudentData($db);
$ssd = new StudentSchoolData($db);
$gd = new GuardianData($db);