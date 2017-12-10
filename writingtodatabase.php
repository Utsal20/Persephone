<html>
<head></head>
<body>
<?php
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phonenumber"];
  $address = $_POST["address"];
  $github = $_POST["github"];
  $userid = $_POST["userid"];

  if ($name==""  || $email=="" || $phone=="" || $address=="" || $github=="")
    die("One or more required fields left empty. Please go back and fill them up.<br>");

  $etitle = $_POST["Etitle"];
  $ecompany = $_POST["Ecompany"];
  $edate = $_POST["Edate"];
  $edescription = $_POST["Edescription"];

  if (($etitle=="" || $ecompany=="") && ($edate != "" || $edescription != ""))
    die("One or more required fields left empty. Please go back and fill them up.<br>");

  $ptitle = $_POST["Ptitle"];
  $plink = $_POST["Plink"];
  $pdescription = $_POST["Pdescription"];
  if (($ptitle =="") && ($pdescription != "" || $plink != ""))
    die("One or more required fields left empty. Please go back and fill them up.<br>");

  $skill = $_POST["skill"];

  $connectionInfo = array("UID" => "srajah19", "pwd" => "Peteisnice2017", "Database" => "LinkedUs");
  $serverName = "linkedus.database.windows.net";
  $conn = sqlsrv_connect($serverName, $connectionInfo) or die("<qryn>".print_r(sqlsrv_errors(), TRUE)."</qryn>");

  $sql = "SELECT MAX(Pid) FROM Person";
  $going = sqlsrv_query($conn, $sql) or die("<p>".print_r(sqlsrv_errors(), TRUE)."</p>");
  $pid = 0;
  while ($row1 = sqlsrv_fetch_array($going)){
    $pid = $row1['Pid'];
  }
  $pid++; //creating a new pid for new user

  $sql1 = "INSERT INTO Person VALUES ($pid, $name, $github, $address, $phone, $email, $userid);"
  sqlsrv_query($conn, $sql1);

  $sql2 = "INSERT INTO Experience VALUES ($pid, $etitle, $ecompany, $edate, $edescription);"
  sqlsrv_query($conn, $sql2);

  $sql3 = "INSERT INTO Projects VALUES ($pid, $ptitle, $description, $link);"
  sqlsrv_query($conn, $sql3);

  $sql4 = "INSERT INTO Skills VALUES ($pid, $skill);"
  sqlsrv_query($conn, $sql4);

  echo "Added! Your UserId is: ".$userid."<br>";
?>
