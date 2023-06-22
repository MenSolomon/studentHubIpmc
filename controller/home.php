<?php

if($_SERVER["PHP_SELF"] == "/ipmc/index.php"){
  define("REGISTERPAGE","controller/student.php");
  define("HOMEPAGE","controller/home.php");
  define("APPJS","./view/assets/myjavascript/appjs.js");
  define("CSSLOC","./view/assets/mycss/mycss.css");
  define("PAGETITLE","IPMC STUDENT APP");

  include "./view/header.php";
  include "./view/nav.php";
  include "./view/body.php";
  include "./view/homepage.php";
  include "./view/footer.php";

}elseif ($_SERVER["PHP_SELF"] == "/ipmc/controller/home.php") {
  define("REGISTERPAGE","student.php");
  define("HOMEPAGE","home.php");
  define("APPJS","../view/assets/myjavascript/appjs.js");
  define("CSSLOC","../view/assets/mycss/mycss.css");
  define("PAGETITLE","IPMC STUDENT APP");
  include "../view/header.php";
  include "../view/nav.php";
  include "../view/body.php";
  include "../view/homepage.php";
  include "../view/footer.php";
}


#
#


/*  echo "<h1>". strlen($_SERVER['PHP_SELF']) ." : ". $_SERVER['PHP_SELF']."</h1>";
  echo "<h1>". str_word_count("Hello Php")." : ".$_SERVER['SERVER_NAME']."</h1>";
  echo "<h1>". strrev($_SERVER['HTTP_HOST'])."</h1>";
  echo "<h1>". strpos("Radio Gold","Gold")."</h1>";
  echo "<h1>". str_replace("Radio","FM","Gold Radio")."</h1>";
  echo "<h1>". $_SERVER['HTTP_REFERER']."</h1>";
  echo "<h1>". $_SERVER['SERVER_ADDR']."</h1>";
  echo "<h1>". $_SERVER['SERVER_SOFTWARE']."</h1>";
  echo "<h1>". $_SERVER['SERVER_PROTOCOL']."</h1>";
  echo "<h1>". $_SERVER['REQUEST_METHOD']."</h1>";
  echo "<h1>". $_SERVER['REMOTE_ADDR']."</h1>";*/
?>
