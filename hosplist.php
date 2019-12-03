<!-- Get the List of Hospitals-->
<!DOCTYPE html>
<html>
<head>
	<title>Hospital Info</title>
	<link rel="stylesheet" type="text/css" href="doctordb.css">
</head>
<body>

<?php
include 'connecttodb.php';// connect to db
?>
<h1><u> All Hospital Info</u></h1>
<ul>
<?php
   $query = 'SELECT * FROM doctor, hospital WHERE  doctor.docLicNum=hospital.headDoc ORDER BY hospital.name ASC';// get the hospital and also info about the head doc that works there
    $result=mysqli_query($connection,$query);
    if (!$result) {
         die("Databse query failed.");
     }
    // for each row print info
    while ($row=mysqli_fetch_assoc($result)) {
        echo "<li>";
        echo "<b>Hospital Name: </b>" . " " . $row["name"] . " " . "<b>Doctor Name: </b>" . $row["firstName"] . " " . $row["lastName"] ." " .  "<b>Start Date </b>" . " " . $row[headDocStartDate] . " " . "<b>Speciality: </b>" . " " .  $row["speciality"] . " " .  "<b>License Date: </b>" . " " .  $row[licenseDate] . " " . "</li>";
     }
     mysqli_free_result($result);// dree results
?>
</ul>
<?php
   mysqli_close($connection);// close connection
?>
</body>
</html>
