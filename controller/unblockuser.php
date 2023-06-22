
<?php 

require_once "../model/StudentDb.php";



$retrievedemail = $_REQUEST["useremail"] ;

$SavedStudentVar  = new SavedStudents();
$SavedStudentVar-> openDB();


$unblockedStatus = $SavedStudentVar->unblockStudent($retrievedemail) ;



?>