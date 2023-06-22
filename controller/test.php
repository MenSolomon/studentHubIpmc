

<?php 

require_once "../model/StudentDb.php";

// $newpassword  =  $_REQUEST["userpassword"] ;
// $email =  $_REQUEST["useremail"]  ;
$resFmDN ;

$SavedStudentVar  = new SavedStudents();
$SavedStudentVar-> openDB();
$SavedStudentVar-> querryAllStudent();
$studentArray =  $SavedStudentVar-> querryAllStudent();

$resFmDN["ok"] = "success";
$resFmDN['nwpwd'] =   "TEST" ;

$myJSON = json_encode($studentArray) ;
echo $myJSON ;


// $data = array('name' => 'John', 'age' => 30);
// $json_data = json_encode($data);

// echo $json_data;
// echo $newpassword . " ". $email  ;


// $SavedStudentVar  = new SavedStudents();
// $SavedStudentVar-> openDB();
// if($SavedStudentVar->ConOk){

//   $savedpassword =   $SavedStudentVar->UpdatePwd($email,$newpassword) ;
//     if($SavedStudentVar->ConOk){

//         $resFmDN["ok"] = "success";
//         $resFmDN['nwpwd'] =   $savedpassword ;
            
//             // echo  $savedpassword;

//     }else{
//         // $savedpassword->Dberr;
//         $resFmDN["err"]  = $SavedStudentVar ->Dberr;
//     }

//         //what does this do
//     $myJSON = json_encode($resFmDN) ;
//     echo $myJSON ;
// }

// echo $_REQUEST["userpassword"]; 


?>