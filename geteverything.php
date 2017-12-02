<?php
  $url = $_GET["userurl"];
  //connection settings
  $connectionInfo = array("UID" => "srajah19", "pwd" => "Peteisnice2017", "Database" => "LinkedUs")
  $serverName = "linkedus.database.windows.net";
  $conn = sqlsrv_connect($serverName, $connectionInfo);
  
  //Query to get data from Person table
  $sql1 = "SELECT * FROM Person WHERE url = $url";
  $going = sqlsrv_query($conn, $sql1);
  $row1 = sqlsrv_fetch_array($going);
  $pid = $row['Pid'];
  
  //Remaining queries
  $sql2 = "SELECT * FROM Experience WHERE Pid = $pid";
  $sql3 = "SELECT * FROM Projects WHERE Pid = $pid";
  $sql4 = "SELECT * FROM Skills WHERE Pid = $pid";
  
  echo $pid;
  echo $row1;
  
?>
