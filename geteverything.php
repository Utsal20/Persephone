<?php
  $url = $_GET["userurl"];

  //Head portion
  echo '<html><head><title>Persephone</title><link rel="Storcut Icon" href="Images/star.png" /><link rel="Stylesheet" href="styles.css" />';
  echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>';
  echo '<script src="https://code.jquery.com/jquery-1.10.2.js"></script>';
  echo '<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script></head>';

  //connection settings
  $connectionInfo = array("UID" => "srajah19", "pwd" => "Peteisnice2017", "Database" => "LinkedUs");
  $serverName = "linkedus.database.windows.net";
  $conn = sqlsrv_connect($serverName, $connectionInfo) or die("<qryn>".print_r(sqlsrv_errors(), TRUE)."</qryn>");
  
  //Query to get data from Person table
  $sql1 = "SELECT * FROM Person WHERE Url = '".$url."'";
  $going = sqlsrv_query($conn, $sql1) or die("<p>".print_r(sqlsrv_errors(), TRUE)."</p>");
  $pid = 0;
  while ($row1 = sqlsrv_fetch_array($going)){
    $pid = $row1['Pid'];
    echo '<body><div class="nameDiv"><h1>'.$row1['Name'].'</h1>';
    echo '<div class="gitHubBubbleContainer"><a href="'.$row1['Github'].'" target="blank"><div class="gitHubBubble"></div></a></div>';
    echo '<div class="emailBubbleContainer"><a href="mailto:'.$row1['Email'].'"><div class="emailBubble"></div></a></div>';
    
    echo '<div class="basicInfoDiv"><div class="phoneNumberDiv"><h2 class="textAlignRight">Phone #</h2>';
    echo '<h3 class="textAlignRight">'.$row1['Phone'].'</h3></div>';
    echo '<div class="addressDiv"><h2 class="textAlignLeft">Address</h2><h3 class="textAlignLeft">'.$row1['Address'].'</h3></div></div></div>';
  }

  //Remaining queries</a></div>
  $sql2 = "SELECT * FROM Experience WHERE Pid = ".$pid;
  $going = sqlsrv_query($conn, $sql2) or die("<p>".print_r(sqlsrv_errors(), TRUE)."</p>");
  while ($row2 = sqlsrv_fetch_array($going)){
    echo 'Success';
  }

  $sql3 = "SELECT * FROM Projects WHERE Pid = ".$pid;
  $sql4 = "SELECT * FROM Skills WHERE Pid = ".$pid;

?>
