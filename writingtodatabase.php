<html>
<head></head>
<body>
<?php
  //getting all form data using post and making it ready to insert to the database
  $name = "'".$_POST["name"]."'";
  $email = "'".$_POST["email"]."'";
  $phone = "'".$_POST["phonenumber"]."'";
  $address = "'".$_POST["address"]."'";
  $github = "'".$_POST["github"]."'";
  $userid = "'".$_POST["userid"]."'";

  //checking if required fields are left empty
  if ($name=="''"  || $email=="''" || $phone=="''" || $address=="''" || $github=="''")
    die("One or more required fields left empty. Please go back and fill them up.<br>");

  $etitle = "'".$_POST["Etitle"]."'";
  $ecompany = "'".$_POST["Ecompany"]."'";
  $edate = "'".$_POST["Edate"]."'";
  $edescription = "'".$_POST["Edescription"]."'";

  if (($etitle=="''" || $ecompany=="''") && ($edate != "''" || $edescription != "''"))
    die("One or more required fields left empty. Please go back and fill them up.<br>");

  $ptitle = "'".$_POST["Ptitle"]."'";
  $plink = "'".$_POST["Plink"]."'";
  $pdescription = "'".$_POST["Pdescription"]."'";
  if (($ptitle =="''") && ($pdescription != "''" || $plink != "''"))
    die("One or more required fields left empty. Please go back and fill them up.<br>");

  $skill = $_POST["skill"];

  //connection details
  $connectionInfo = array("UID" => "srajah19", "pwd" => "Peteisnice2017", "Database" => "LinkedUs");
  $serverName = "linkedus.database.windows.net";
  $conn = sqlsrv_connect($serverName, $connectionInfo) or die("<qryn>".print_r(sqlsrv_errors(), TRUE)."</qryn>");

  //query to get the last Pid from Person table
  $sql = "SELECT Pid, Url FROM Person";
  $going = sqlsrv_query($conn, $sql) or die("<p>".print_r(sqlsrv_errors(), TRUE)."</p>");
  $pid = 0;
  //gets the last Pid; also checks if the userId already exists
  while ($row1 = sqlsrv_fetch_array($going)){
    $pid = $row1['Pid'];
    if ($userid == ("'".$row1['Url']."'"))
      die("UserId already exists! Try another one.<br>");
  }
  $pid++; //creating a new pid for new user

  //query to insert into the Person table
  $sql1 = "INSERT INTO Person VALUES ($pid, $name, $github, $address, $phone, $email, $userid);";
  sqlsrv_query($conn, $sql1) or die("<qryn>".print_r(sqlsrv_errors(), TRUE)."</qryn>");

  //query to insert into the Experience table
  $sql2 = "INSERT INTO Experience VALUES ($pid, $etitle, $ecompany, $edate, $edescription);";
  sqlsrv_query($conn, $sql2) or die("<qryn>".print_r(sqlsrv_errors(), TRUE)."</qryn>");

  //query to insert into the Projects table
  $sql3 = "INSERT INTO Projects VALUES ($pid, $ptitle, $pdescription, $plink);";
  sqlsrv_query($conn, $sql3) or die("<qryn>".print_r(sqlsrv_errors(), TRUE)."</qryn>");
  
  //query to insert into the Skills table
  $skill = "'".$skill."'";
  $sql4 = "INSERT INTO Skills (Pid, Skills) VALUES ($pid, $skill);";
  sqlsrv_query($conn, $sql4) or die("<qryn>".print_r(sqlsrv_errors(), TRUE)."</qryn>");
 
  //Display userid after successful insertion to the database
  echo "Added! Your UserId is: ".$userid."<br>";
  //Freeing resources
  sqlsrv_close($conn);
?>
</body>
</html>
