<!DOCTYPE html>
<html>
<head>
	<title>Doctor's License Page</title>
	<link rel="stylesheet" type="text/css" href="doctordb.css">
	<link href="https://fonts.google.com/specimen/Fjalla+One" rel-"stylesheet">
	<script src="doctors.js"></script>
</head>
<body>
<?php
   include 'connecttodb.php';
?>
<h1>Doctors Before Date Entered:</h1>
<ol>
<?php
   $licDate= $_POST["licdate"];
   $query1= 'SELECT * FROM doctor WHERE licenseDate < "' .$licDate. '"';
   $result=mysqli_query($connection,$query1);
   if (!$result) {
          die("Query failed.");
   }
    while ($row=mysqli_fetch_assoc($result)) {
        echo '<li>';
        echo "<b>Name: </b>" . $row["firstName"] . " " . $row["lastName"] ." " .  "<b>License Number: </b>" . " " . $row["licenseNum"] . " " . "<b>Specialty: </b>" . " " . $row["specialty"] . "</li>"; 
     }
   mysqli_close($connection);
?>
</ol>
</body>
</html>