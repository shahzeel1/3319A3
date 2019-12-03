<!-- Lists the docs with no patients --> 
<!DOCTYPE html>
<html>
<head>
	<title>Doctor's with no patients</title>
	<link rel="stylesheet" type="text/css" href="doctordb.css">
</head>
<body>
<?php
include 'connecttodb.php';// connect to the db
?>
<h1>These are the doctors with no patients:</h1>
<ul>
<?php
    // query gets the first, last name of the doc and the patient they "treat" is NULL aks they don't have any patients
   $query = 'SELECT doctor.firstName, doctor.lastName, treats.ohip FROM treats RIGHT JOIN doctor ON doctor.docLicNum=treats.docLicNum WHERE treats.ohip IS NULL;';
    $result=mysqli_query($connection,$query);
    if (!$result) {
         die("Database query failed.");
     }
    // list all the doc's first and last name
    while ($row=mysqli_fetch_assoc($result)) {
        echo "<li>";
        echo "<b>Doctor Name: </b>" . " " . $row["doctor.firstName"] . " " . $row["doctor.lastName"] . "</li>";
     }
     mysqli_free_result($result);
?>
</ul>
<?php
   mysqli_close($connection);// close connection to db
?>
</body>
</html>