<?php
$first=$_GET["first"];
$final=$_GET["final"];

  $conn = mysqli_connect('localhost','root','')or die ('Not connected : ' . mysql_error());
  mysqli_select_db($conn,'test') or die ('Not connected : ' . mysql_error());
  $sql1 = "select * from grade where DATE between '$first' and '$final' order by ID asc";
  $query = mysqli_query($conn,$sql1) or die('MySQL query error');

echo "ID"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "DATE"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "Diastolic Pressure(mmHg)"."&nbsp;&nbsp;&nbsp;";
echo "Systolic Pressure(mmHg)"."&nbsp;&nbsp;&nbsp;";
echo "Weight(kg)"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "Height(m)"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "BMI"."  <hr>";
  while($row = mysqli_fetch_array($query))
  {
	echo $row['ID']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo $row['DATE']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo $row['Diastolic']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo $row['Systolic']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo $row['Weight']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo $row['Height']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo $row['BMI']."<br><hr>";
  }

$sql4="select * from grade where DATE between '$first' and '$final' order by ID asc";
$query4=mysqli_query($conn,$sql4);
while ($row=mysqli_fetch_array($query4)){
	$ID[]=$row['ID'];
	$DATE[]=$row['DATE'];
	$Weight[]=floatval($row['Weight']);
	$Diastolic[]=floatval($row['Diastolic']);
	$Systolic[]=floatval($row['Systolic']);
}
$ID=json_encode($ID);
$DATE=json_encode($DATE);
$Weight = array("name"=>"Weight","data"=>$Weight);
$Weight = json_encode($Weight);
$Diastolic = array("name"=>"Diastolic","data"=>$Diastolic);
$Systolic = array("name"=>"Systolic","data"=>$Systolic);
$Diastolic = json_encode($Diastolic);
$Systolic = json_encode($Systolic);
?>




<div id="container" style="width: 550px; height: 400px; margin: 0 auto"></div>