<!DOCTYPE html>
<html>
<head>
	<title>Doctor's Info</title>
	<link rel="stylesheet" type="text/css" href="doctordb.css">
	<link href="https://fonts.google.com/specimen/Fjalla+One" rel-"stylesheet">
	<script src="doctors.js"></script>
</head>
<body>
<?php
include 'connecttodb.php';
?>
<h1>Doctor's Information:</h1>
<ol>
<?php
   $doctorLicenseNum= $_POST["doctors"];
   $query = ' SELECT * FROM doctor, hospital WHERE doctor.hosWorksAt=hospital.hosCode AND doctor.docLicNum="' . $doctorLicenseNum. '"';
    $result=mysqli_query($connection,$query);
    if (!$result) {
         die("Database query failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
        echo "<li>";
        echo "<b>Name: </b>" . $row["firstName"] . " " . $row["lastName"] ."</li>";
        echo "<li>";
        echo "<b>License Number: </b>" . " " . $row["licenseNum"] . "</li>";
        echo "<li>";
        echo "<b>Specialtiy: </b>" . " " .  $row["specialty"] . "</li> ";
        echo "<li>";
        echo  "<b>License Date: </b>" . " " .  $row[licenseDate] . "</li>";
        echo "<li>";
        echo  "<b>Hospital: </b>" . " " .  $row["hospName"] . "</li>";
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