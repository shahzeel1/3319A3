<!DOCTYPE html>
<html>
<head>
	<title>Doctor's Database</title>
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
<script src="js.js"></script>
<?php
include 'connecttodb.php';
?>
<h1>Doctor's Information:</h1>
<ol>
<?php
   $doctorLicenseNum= $_POST["doctors"];
    echo "<li>The value of doctorLicenseNum is".$doctorLicenseNum."/li>";
   $query = 'SELECT * FROM doctor, hospital WHERE doctor.hospID=hospital.hospCode AND doctor.licenseNum="' . $doctorLicenseNum. '"';
    $result=mysqli_query($connection,$query);
    if (!$result) {
         die("Database query failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
        echo "<li>";
        echo "<b>Name: </b>" . $row["firstName"] . " " . $row["lastName"] ." " .  "<b>License Number: </b>" . " " . $row["licenseNum"] . " " . "<b>Specialtiy: </b>" . " " .  $row["specialty"] . " " .  "<b>License Date: </b>" . " " .  $row[licenseDate] . " " .  "<b>Hospital: </b>" . " " .  $row["hospName"] . "</li>";
	echo '<img src="'.$row["docPicture"].'" height="60" width="60">';     
}
     mysqli_free_result($result);
?>
</ol>
<?php
   mysqli_close($connection);
?>
</body>
</html>