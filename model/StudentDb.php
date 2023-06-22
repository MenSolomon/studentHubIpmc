<?php

class SavedStudents{

   private $studentName;
   private $studentimg;
   private $course;
   private $email;
   private $pwd;
   private $conObj;
   public $ConOk = false;
   public $Dberr;
   

   public function openDB(){

     if(!defined("DBSERVER")){
       define("DBSERVER","localhost");
       define("DBNAME","ipmcstudent");
       define("USER","ipmc");
       define("PWD","ipmc");
       try{
         $this->conObj =  new PDO("mysql:host=".DBSERVER.";dbname=".DBNAME."",USER,PWD);
         $this->ConOk = true;
       }catch(PDOException $pdoerror){
        $this->Dberr = $pdoerror;
       }
     }
     return $this->conObj;
   }//end of openDB

   public function InsertNewStudent($studentDetails){
    $name =$studentDetails["studentFisrtname"]." ".$studentDetails["studentSurname"];
    $sqlquery = "Insert into student values(".
    "'".$name."','".$studentDetails["studentcourse"]."','".$studentDetails["studentEmail"]."',".
    "'".$studentDetails["imglog"]."','".$studentDetails["password"]."')";

    try{
      $this->conObj->query($sqlquery);
      $this->ConOk = true;
    }catch(PDOException $pdoerror){
        $this->ConOk = false;
        $this->Dberr = $pdoerror;
    }

  }//end of InsertNewStudent

  public function UpdatePwd($email,$newpassword){
    //setting an exception / error display
    $this->conObj->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION) ;

   
    try{

      // $this->ConOk = true  ;
      // $sqlquery = "Update student set password = '".$newpassword."' where email = '".$email;

          $sqlquery = "Update student set password = :newPwd where email = :newEmail " ;

          $sqlstatment =  $this->conObj->prepare($sqlquery) ;

          // getting the values for :newEmail
          // the binding was only one : not  two :: 
          $sqlstatment->bindParam(":newPwd",$newpassword);
          $sqlstatment->bindParam(":newEmail",$email);

      //executing the statment against the database
      $sqlstatment->execute();
      $this->ConOk = true;

      return $newpassword ;


    }catch(PDOException $pdoerror){
        // we dont pass the session online 
      $this->Dberr = $pdoerror;
      

    } // end of updatePassword

  }




  public function querryAllStudent(){

    $sqlquery = "Select * from student" ;
    try{
      
      $sqlstatment =  $this->conObj->prepare($sqlquery) ;
      $this->conObj->query($sqlquery);
      $sqlstatment->execute();
      $this->ConOk = true;
      // Retrieving the sql data as an array
      $students = $sqlstatment->fetchAll(PDO::FETCH_ASSOC);
      // print_r($students);

      return $students ;

    }catch(PDOException $pdoerror){
        $this->ConOk = false;
        $this->Dberr = $pdoerror;
    }

  }//end of querryStudent


  public function blockStudent($stuemail){
   
    $this->conObj->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION) ;
 
    try{
      $sqlquery = "Update student set blockedStatus = 0 where email = :newEmail " ;

      $sqlstatment =  $this->conObj->prepare($sqlquery) ;

      $sqlstatment->bindParam(":newEmail",$stuemail);
      $sqlstatment->execute();
      $this->ConOk = true;

      return "0" ;

    }catch(PDOException $pdoerror){
        $this->ConOk = false;
        $this->Dberr = $pdoerror;

        // return "11";
    }

  }


  public function unblockStudent($stuemail){
   
    $this->conObj->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION) ;
 
    try{
      $sqlquery = "Update student set blockedStatus = 1 where email = :newEmail " ;

      $sqlstatment =  $this->conObj->prepare($sqlquery) ;

      $sqlstatment->bindParam(":newEmail",$stuemail);
      $sqlstatment->execute();
      $this->ConOk = true;

      return "0" ;

    }catch(PDOException $pdoerror){
        $this->ConOk = false;
        $this->Dberr = $pdoerror;

        // return "11";
    }

  }

}







?>
