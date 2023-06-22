

<?php 

require_once "../model/StudentDb.php";


$SavedStudentVar  = new SavedStudents();
$SavedStudentVar-> openDB();
$SavedStudentVar-> querryAllStudent();
$studentArray =  $SavedStudentVar-> querryAllStudent();

$myJSON = json_encode($studentArray) ;
echo $myJSON ;


?>