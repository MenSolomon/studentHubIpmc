<!--this is the start of nav area-->
<nav style="background-color:#F9A1A1;color:purple;width:18%;
position:relative;float:left;margin-left:2%;margin-top:100px;z-index:0">
<ul>
<li><a href="<?php echo HOMEPAGE ;?>">HOME</a></li>

<?php 
if (isset($_SESSION["savedprofile"])) {
    echo '<li><a href="logout.php">Log Out</a></li>';
}else{
    echo '<li><a href="'  . REGISTERPAGE . '">REGISTRATION</a></li>';
}
?>


<li><a href="pages/database.html">DATABASE</a></li>
<li><a href="pages/software.html">SOFTWARE</a></li>
<li><a href="pages/downloadpage.html">DOWNLOAD PAGE</a></li>
</ul>

</nav>
