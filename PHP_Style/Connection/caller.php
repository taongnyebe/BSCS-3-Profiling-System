<?php

$homedir = "D:\Softwares\x"."ampp\htdocs\code\BSCS-3-Profiling-System\PHP_Style";
$homeurl = "http://localhost/code/BSCS-3-Profiling-System/PHP_Style/";

session_start();

require $homedir.'\Connection\class\multi_functions.php';

require $homedir.'\Connection\class\c_connection.php';
require $homedir.'\Connection\class\c_user_data.php';
require $homedir.'\Connection\class\c_delete_data.php';

require $homedir.'\Connection\class\c_yearsection_data.php';
require $homedir.'\Connection\class\c_award_data.php';
require $homedir.'\Connection\class\c_awardstudent_data.php';
require $homedir.'\Connection\class\c_competition_data.php';
require $homedir.'\Connection\class\c_competitionstudent_data.php';
require $homedir.'\Connection\class\c_schyearsemester_data.php';
require $homedir.'\Connection\class\c_securityretrival_data.php';
require $homedir.'\Connection\class\c_seminar_data.php';
require $homedir.'\Connection\class\c_seminarstudent_data.php';
require $homedir.'\Connection\class\c_subjectstudent_data.php';
require $homedir.'\Connection\class\c_student_data.php';
require $homedir.'\Connection\class\c_studentSchool_data.php';
require $homedir.'\Connection\class\c_guardian_data.php';
require $homedir.'\Connection\class\c_subject_data.php';

$db = new Connection();
$login = new Login($db);
$d = new Delete($db);

$ys = new YearSectionData($db);
$sd = new StudentData($db);
$ssd = new StudentSchoolData($db);
$gd = new GuardianData($db);
$subj = new Subject($db);