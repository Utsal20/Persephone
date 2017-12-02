<?php
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phonenumber"];
  $address = $_POST["address"];
  $github = $_POST["github"];

  if ($name == ""  || $email=="" || $phone=="" || $address=="" || $github=="")
    echo "One or more required fields left empty. Please go back and fill them up.<br>";

  $etitle = $_POST["Etitle"];
  $ecompany = $_POST["Ecompany"];
  $edate = $_POST["Edate"];
  $edescription = $_POST["Edescription"];

  $ptitle = $_POST["Ptitle"];
  $plink = $_POST["Plink"];
  $pdescription = $_POST["Pdescription"];

  $skill = $_POST["skill"];
?>
