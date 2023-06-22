
<?php 

session_start();
//sessions stores temp value .. what is caching // what is a cookie 

// Array ( [studentFisrtname] => Dennis [studentSurname] => Offei [studentcourse] => [studentEmail] => deniss@gmail.com [password] => soloolsol [fileupload] => Array ( [name] => AYAD.jpg [full_path] => AYAD.jpg [type] => image/jpeg [tmp_name] => C:\xampp\tmp\php73.tmp [error] => 0 [size] => 41099 ) [imglog] => ../view/assets/loadedfiles/deniss@gmailcom.png )
// if(isset($_POST)){
//     $data = file_get_contents("php://input");
//     $user=  json_decode($data,true);
//     echo $user ;
// }


    // if (isset($_POST['userpassword'])) {
    //     $userpwd = $_POST['userpassword'];
    //     // Process the received data as needed
    //     // Example: Update user password in the database
    //     // $userId = $_SESSION['user_id'];
    //     // $sql = "UPDATE users SET password = '$userpwd' WHERE id = '$userId'";
    //     // ... Execute the SQL query ...
    //     // Example: Return a response
    //     echo "Password updated successfully!";
    // } else {
    //     echo "Error: User password not received.";
    // }





if(isset($_SESSION["savedprofile"])){
    define("REGISTERPAGE","#");
define("HOMEPAGE","home.php");
define("APPJS","../view/assets/myjavascript/appjs.js");
define("CSSLOC","../view/assets/mycss/mycss.css");
define("PAGETITLE","IPMC STUDENT APP PROFILE PAGE");

$savedDetails = $_SESSION["savedprofile"] ;
$savedstudentname = $savedDetails["studentFisrtname"]. $savedDetails["studentSurname"] ;
$savedstudentpwd = $savedDetails["password"]  ;
$imageloc =   $savedDetails["imglog"] ;
$savedEmail = $savedDetails["studentEmail"];



print_r($_SESSION["savedprofile"] );

include "../view/header.php";
include "../view/nav.php";
include "../view/body.php";
include "../view/profileview.php";
include "../view/footer.php";

}else{

    header("Location: "."student.php");
}





?>