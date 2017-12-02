<?php
  $url = $_GET["userurl"];

  //connection settings
  $connectionInfo = array("UID" => "srajah19", "pwd" => "Peteisnice2017", "Database" => "LinkedUs");
  $serverName = "linkedus.database.windows.net";
  $conn = sqlsrv_connect($serverName, $connectionInfo) or die("<qryn>".print_r(sqlsrv_errors(), TRUE)."</qryn>");
  
  //Query to get data from Person table
  $sql1 = "SELECT * FROM Person WHERE Url = '".$url."'";
  $going = sqlsrv_query($conn, $sql1) or die("<p>".print_r(sqlsrv_errors(), TRUE)."</p>");
  while ($row1 = sqlsrv_fetch_array($going)){
    $pid = $row1['Pid'];
  }

  foreach ($row1 as $key => $val){}
  var_dump($row1);
  
  /*
  //Remaining queries
  $sql2 = "SELECT * FROM Experience WHERE Pid = $pid";
  $sql3 = "SELECT * FROM Projects WHERE Pid = $pid";
  $sql4 = "SELECT * FROM Skills WHERE Pid = $pid";
  */

  echo $url."c";
?>
