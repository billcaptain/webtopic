<html><head>
    <meta charset="UTF-8">
<title>&#x66F4;&#x65B0;&#x6210;&#x529F;</title>
<span style="font-size:18px;"> </span><span style="font-size:24px;"><meta http-equiv="refresh" content="3;URL=http://localhost/phptest/searchrg1.php"> </span> 
<span style="font-size:24px;"></span> 
</head><body>
<?
$ID=$_GET["ID"];
$Height=$_GET["Height"];
$Weight=$_GET["Weight"];

?>

</body></html>


<?php
$ID=$_GET["ID"];
$Height=$_GET["Height"];
$Weight=$_GET["Weight"];

$conn = mysqli_connect('localhost','root','')or die ('Not connected : ' . mysql_error());
mysqli_select_db($conn,'test') or die ('Not connected : ' . mysql_error());

$sql1="update grade set Height=$Height,Weight=$Weight where ID=$ID";
mysqli_query($conn,$sql1);

echo "&#x66F4;&#x65B0;&#x6210;&#x529F;&#xFF08;3&#x79D2;&#x5F8C;&#x81EA;&#x52D5;&#x8FD4;&#x56DE;&#xFF0C;&#x9EDE;&#x64CA;&#x53F3;&#x65B9;&#x6309;&#x9215;&#x7ACB;&#x5373;&#x8FD4;&#x56DE;&#xFF09;";
?>