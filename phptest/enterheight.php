<?php
 $conn = mysqli_connect('localhost','root','')or die ('Not connected : ' . mysql_error());
  mysqli_select_db($conn,'test') or die ('Not connected : ' . mysql_error());
$Height=$_GET["Height1"];
$sql1="update grade set Height='$Height' where ID>0";
mysqli_query($conn,$sql1);

?>
succeed