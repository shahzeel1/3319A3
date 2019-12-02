<!DOCTYPE html>
<html>
<head>
	<title>Doctor's Database</title>
	<link rel="stylesheet" type="text/css" href="doctordb.css">
	<link href="https://fonts.google.com/specimen/Fjalla+One" rel-"stylesheet">
	<script src="doctors.js"></script>
</head>
<body>
<?php
include 'connecttodb.php';
?>
<h1>These are the doctors with no patients:</h1>
<ul>
<?php
   $query = 'SELECT doctor.firstName AS d_fname, doctor.lastName AS d_lname, treats.ohip FROM treats RIGHT JOIN doctor ON doctor.docLicNum=treats.doctorID WHERE treats.ohip IS NULL';
    $result=mysqli_query($connection,$query);
    if (!$result) {
         die("Database query failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
        echo "<li>";
        echo "<b>Doctor Name: </b>" . " " . $row["d_fname"] . " " . $row["d_lname"] . "</li>";
     }
     mysqli_free_result($result);
?>
</ul>
<?php
   mysqli_close($connection);
?>
</body>
</html>