<!DOCTYPE html>
<html>
<head>
	<title>Hospital Info</title>
	<link rel="stylesheet" type="text/css" href="doctordb.css">
	<link href="https://fonts.google.com/specimen/Fjalla+One" rel-"stylesheet">
	<script src="doctors.js"></script>
</head>
<body>

<?php
include 'connecttodb.php';
?>
<h1><u> All Hospital Info</u></h1>
<ul>
<?php
   $query = 'SELECT * FROM doctor, hospital WHERE doctor.hosWorksAt=hospital.hosCode AND doctor.docLicNum=hospital.headDoc ORDER BY hospital.name ASC';
    $result=mysqli_query($connection,$query);
    if (!$result) {
         die("Databse query failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
        echo "<li>";
        echo "<b>Hospital Name: </b>" . " " . $row["hospital.name"] . " " . "<b>Doctor Name: </b>" . $row["firstName"] . " " . $row["lastName"] ." " .  "<b>Start Date </b>" . " " . $row[headDocStartDate] . " " . "<b>Speciality: </b>" . " " .  $row["speciality"] . " " .  "<b>License Date: </b>" . " " .  $row[licenseDate] . " " . "</li>";
     }
     mysqli_free_result($result);
?>
</ul>
<?php
   mysqli_close($connection);
?>
</body>
</html>
