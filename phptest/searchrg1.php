<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/my.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">


<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>


<title>血壓圖標數據</title>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
                <a class="navbar-brand" href="./main.html">
                    <img src="../pic/websys.jpg" width="30" height="30" class="d-inline-block align-top">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="./paper.html">醫療文獻 <span class="sr-only">(current)</span></a></li>
                    <li class="dropdown"><a href="./main.html">返回 <span class="sr-only">(current)</span></a></li>
                        <ul class="dropdown-menu">
                            <li><a href="./picture.html">圖標數據</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="./sug.html">文字建議</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="./medicine.html">藥品查詢</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="./index.html">登出</a></li>
                </ul>
            </div>
        </div>

<?php

$conn = mysqli_connect('localhost','root','')or die ('Not connected : ' . mysql_error());
mysqli_select_db($conn,'test') or die ('Not connected : ' . mysql_error());


$sql="select * from grade";
$query=mysqli_query($conn,$sql);
$sql3="LOAD DATA LOCAL INFILE 'D:/study/datatest.txt'
IGNORE INTO TABLE test.grade FIELDS TERMINATED BY ','";
$query3=mysqli_query($conn,$sql3);
$sql1="select Weight,Height as BMI from grade";
$query1=mysqli_query($conn,$sql1);
$sql2="update grade set BMI = Weight/(Height*Height)";
$query2=mysqli_query($conn,$sql2);

$sql4="select * from (select * from grade order by ID desc limit 15) as A order by ID asc";
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

<link rel="stylesheet" href="./css/my.css">
</head>
<body>
        <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!--文章開始-->
                <div class="main">
                    <div class="row">
                        <div class="col-md-12">
                        </div>
                    </div>

                    <div class="row row_item">
                        <div class="col-md-4">
                 
                            <p>
    <br><br>
    
    <div style="border:3px #cccccc solid;" cellpadding="10" border='1'><br>
    <form action="searchrg2.php" method="GET">
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#x8D77;&#x59CB;日期:
     <input type="date" size="10" name="first" /><br>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#x7D42;&#x6B62;日期:
     <input type="date" size="10" name="final" /><br><br>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="Submit"/>&nbsp;&nbsp;<input type="reset"></form>
    </div>
    <br><br><br>
    <div style="border:3px #cccccc solid;" cellpadding="10" border='1'><br>
    <form action="update.php" method="GET">
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#x8F38;&#x5165;ＩＤ: 
    <input type="Int" name="ID"/><br>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#x8F38;&#x5165;身高:
    <input type="Float" name="Height"/><br>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#x8F38;&#x5165;體重:
    <input type="Float" name="Weight"/><br><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="Submit"/>&nbsp;&nbsp;<input type="reset">
    </form></div>
                                <div id="output" class="output"></div>
                            </p>
                        </div>
                        <div class="col-md-8">
                            <div class="text-md-center">
 <div id="container" style="width: 750px; height: 400px; margin: 0 auto"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row row_item">
                        <div class="col-md-12">
                            <div class="text-md-center">
                                <br><br><br><br><br><br>
                            <?php

$conn = mysqli_connect('localhost','root','')or die ('Not connected : ' . mysql_error());
mysqli_select_db($conn,'test') or die ('Not connected : ' . mysql_error());


$sql="select * from (select * from grade order by ID desc limit 15) as A order by ID asc";
$query=mysqli_query($conn,$sql);
$sql3="LOAD DATA LOCAL INFILE 'E:/WampServer/wamp64/www/phptest/datatest.txt'
IGNORE INTO TABLE test.grade FIELDS TERMINATED BY ','";
$query3=mysqli_query($conn,$sql3);
$sql1="select Weight,Height as BMI from grade";
$query1=mysqli_query($conn,$sql1);
$sql2="update grade set BMI = Weight/(Height*Height)";
$query2=mysqli_query($conn,$sql2);


echo "ID"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "DATE"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "Diastolic Pressure(mmHg)"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "Systolic Pressure(mmHg)"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "Weight(kg)"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "Height(m)"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "BMI"."  <hr>";
while ($row=mysqli_fetch_array($query)){
	echo $row['ID']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo $row['DATE']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo $row['Diastolic']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo $row['Systolic']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo $row['Weight']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo $row['Height']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo $row['BMI']."<br><hr>";
};


?>
                            </div>
                        </div>
                    </div>

                </div>
                <!--文章結束-->
            </div>
        </div>
    </div>





   <!--  <form action="searchrg2.php" method="GET">
     &#x8D77;&#x59CB;DATE:
    <input type="date" size="10" name="first" /><br>
     &#x7D42;&#x6B62;DATE:
     <input type="date" size="10" name="final" /><br>
    <input type="Submit"/><input type="reset"></form>
    <br>
    <form action="update.php" method="GET">
     &#x8F38;&#x5165;&#x6307;&#x5B9A;&#x4FEE;&#x6539;&#x8CC7;&#x6599;&#x7684;ID:
    <input type="Int" name="ID"/><br>
     &#x8F38;&#x5165;Height:
    <input type="Float" name="Height"/><br>
     &#x8F38;&#x5165;Weight:
    <input type="Float" name="Weight"/><br>
    <input type="Submit"/><input type="reset">
    </form> -->



<script language="JavaScript">
$(document).ready(function() {
   var title = {
       text: 'Blood Pressure'
   };
   var subtitle = {
        text: 'Source: runoob.com'
   };
   var xAxis ={
       categories: <?php
        echo $DATE; ?>
   };
   var yAxis = {
      title: {
         text: 'Blood Pressure (\mmHg)'
      },
      plotLines: [{
         value: 0,
         width: 1,
         color: '#808080'
      }]
   };

   var tooltip = {
      valueSuffix: '\mmHg'
   }

   var legend = {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle',
      borderWidth: 0
   };

   var series =[
    <?php
     echo $Diastolic.",".$Systolic;
      ?>
   ];

   var json = {};

   json.title = title;
   json.subtitle = subtitle;
   json.xAxis = xAxis;
   json.yAxis = yAxis;
   json.tooltip = tooltip;
   json.legend = legend;
   json.series = series;

   $('#container').highcharts(json);
});
</script>



<div class="container" style="padding: 40px 0;color: #999;text-align: center;background-color: #f9f9f9;border-top: 1px solid #e5e5e5;">
    &copy;billcaptain
</div>


    </body>
</html>



