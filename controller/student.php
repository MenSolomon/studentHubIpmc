<?php
// how to import class
require_once "../model/StudentDb.php";

session_start();


class studentObj{

  private $studentFisrtname;
  private $studentSurname;
  private $studentdob;
  private $studentEmail;
  private $password;
  private $imgloadedname;
  private static $sortedEmail;
  private  $SavedStudentVar;

  function __construct(){
    $this->SavedStudentVar  = new SavedStudents();
  }
  private static function checkImageLoad($inputimgElmnt){
      $value="";
      switch($inputimgElmnt){
        case 4:
        $value = 4;
        break;
        case 5:
        $value = 5;
        default:
      }
      return $value ;
  }// end checkImageLoad

  private static function sortEmail($userEmail){
    $symbolstoFind = array("@",".");
    $noOfsymbolstoFind = count($symbolstoFind);
    for($x=0; $x < $noOfsymbolstoFind; $x++){
      $sortedEmail = str_replace($symbolstoFind[$x],"",$userEmail);
    }
    return $sortedEmail;
  }

  private static function saveLoadedFile($usrEmail,$imgloadedloc){
    $Ok = false;
    $loadednewfileloc = "../view/assets/loadedfiles/";
    $loadednewfileloc = $loadednewfileloc.$usrEmail.".png";
    if(move_uploaded_file($imgloadedloc,$loadednewfileloc)){
      $Ok=true;
    }
    $imgstatue["imglog"]=$loadednewfileloc;
    $imgstatue["Ok"]=$Ok;
    return $imgstatue;
  }

  public static function getStudentDetails($submittedDetails){

    $imgloadedname = $submittedDetails["fileupload"]["name"];
    $imgloadedloc = $submittedDetails["fileupload"]["tmp_name"];

    if(strlen($submittedDetails["password"]) < 3){
     $submittedDetails["passwordError"] ="<span style='color:white'>*</span>";
     return $submittedDetails;
   }elseif(self::checkImageLoad($submittedDetails["fileupload"]["error"]) == 4){
     $submittedDetails["imgError"] = "<span style='color:white'>*</span>";
     return $submittedDetails;
   }elseif(self::checkImageLoad($submittedDetails["fileupload"]["type"]) == 5){
     $submittedDetails["imgError"] = "<span style='color:white'> *type* </span>";
     return $submittedDetails;
   }else{
      $sortedEmail =self::sortEmail($submittedDetails["studentEmail"]);
      $saveStatus = self::saveLoadedFile($sortedEmail,$imgloadedloc);
      $submittedDetails["imglog"] = $saveStatus["imglog"];
      if($saveStatus["Ok"]){
        //yet to be implement save to dabase
          $SavedStudentVar  = new SavedStudents();
          $SavedStudentVar-> openDB();
          if($SavedStudentVar->ConOk){
              $SavedStudentVar->InsertNewStudent($submittedDetails);
              if($SavedStudentVar->ConOk){
                $_SESSION["savedprofile"] = $submittedDetails ;
                // Redirecting
                      header("Location: "."profile.php");  
              }else{
                $registrationDetails["Dberror"]=$SavedStudentVar->Dberr;
              }
              //$registrationDetails["Dberror"]="Inserted";
              //self::getTemplate();

           }else{
            $registrationDetails["Dberror"]=$SavedStudentVar->Dberr;
          }

      }else{
          return $submittedDetails;
      }

   }

  }//end of function getStudentDetails

 public static function chkButtonAction(){
   if(isset($_POST["btnSend"])){

     $registrationDetails["studentFisrtname"] = htmlspecialchars($_POST["txtFN"]);
     $registrationDetails["studentSurname"] = htmlspecialchars($_POST["txtSN"]);
     $registrationDetails["studentcourse"] = htmlspecialchars($_POST["selectedCourse"]);
     $registrationDetails["studentEmail"]= htmlspecialchars($_POST["txtEmail"]);
     $registrationDetails["password"] = htmlspecialchars($_POST["txtPassword"]);
     $registrationDetails["fileupload"] = $_FILES["fileld"];

      $GLOBALS['registrationDetails'] = studentObj::getStudentDetails($registrationDetails);
      //$registrationDetails = studentObj::getStudentDetails($registrationDetails);

   }
 }//end of button action

 public static function getTemplate(){
   if($_SERVER["PHP_SELF"] == "/ipmc/controller/student.php"){

     define("REGISTERPAGE","student.php");
     define("HOMEPAGE","home.php");
     define("APPJS","../view/assets/myjavascript/appjs.js");
     define("CSSLOC","../view/assets/mycss/mycss.css");
     define("PAGETITLE","Registration page");
     include "../view/header.php";
     include "../view/nav.php";
     include "../view/body.php";
     include "../view/register.php";
     include "../view/footer.php";
     }
 }
   //echo static::$sortedEmail =
}//end of student class

studentObj::chkButtonAction();
studentObj::getTemplate();

/*
  define("CSSLOC","../view/assets/mycss/mycss.css");
  define("REGISTERPAGE","student.php");
  define("HOMEPAGE","home.php");
  include "../view/header.php";
  include "../view/nav.php";
  include "../view/body.php";
  include "../view/register.php";
  include "../view/footer.php";
*/

?>
