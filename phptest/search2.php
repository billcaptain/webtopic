<html><head>
<title>查詢結果</title>
</head><body>
<?
$number=$_GET["number"];
?>

</body></html>

<?php
$number=$_GET["number"];
 //echo $_GET["number"];
 $lnk = mysqli_connect('localhost','root','')
       or die ('Not connected : ' . mysql_error());
  mysqli_select_db($lnk,'test');
  $sql1 = "select * from grade where ID = ".$_GET["number"];
  $result = mysqli_query($lnk,$sql1) or die('MySQL query error');
  while($row = mysqli_fetch_array($result))
  {
   	echo $row['ID']."  ";
	echo $row['DATE']."  ";
	echo $row['Diastolic']."  ";
	echo $row['Systolic']."  ";
	echo $row['Weight']."  ";
	echo $row['Height']."  ";
	echo $row['BMI']."<br><hr>";

  }
?>