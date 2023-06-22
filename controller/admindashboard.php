

<?php 


require_once "../model/StudentDb.php";

define("REGISTERPAGE","#");
define("HOMEPAGE","home.php");
define("APPJS","../view/assets/myjavascript/appjs.js");
define("CSSLOC","../view/assets/mycss/mycss.css");
define("PAGETITLE","IPMC STUDENT APP PROFILE PAGE");

$retrievedemail = $_REQUEST["useremail"] ;

$SavedStudentVar  = new SavedStudents();
$SavedStudentVar-> openDB();
$SavedStudentVar-> querryAllStudent();
$studentArray =  $SavedStudentVar-> querryAllStudent();



$blockedStatus = $SavedStudentVar->blockStudent($retrievedemail) ;

// $unblockedStatus = $SavedStudentVar->unblockStudent($retrievedemail) ;

echo $blockedStatus ;

$jsArray = json_encode($studentArray);
// echo $jsArray ;

// $myJSON = json_encode($resFmDN) ;

include "../view/header.php";
include "../view/nav.php";
include "../view/body.php";
include "../view/admin.php";
include "../view/footer.php";


?>