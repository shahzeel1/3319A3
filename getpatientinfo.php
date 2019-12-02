<!DOCTYPE html>
<html>
<head>
	<title>Patient Info</title>
	<link rel="stylesheet" type="text/css" href="doctordb.css">
	<link href="https://fonts.google.com/specimen/Fjalla+One" rel-"stylesheet">
	<script src="doctors.js"></script>
</head>
<body>

<?php
   include 'connecttodb.php';
?>
<h1>Patient Information:</h1>
<ul>
<?php
   $ohip= $_POST["ohip"];
   $ohipint= (int)$ohip    
try 
{
   echo $ohip;
   $query= 'SELECT patient.firstname AS p_fname, patient.lastname AS p_lname, patient.ohip AS p_OHIP, doctor.firstName AS d_fname, doctor.lastName AS d_lname  FROM patient,treats,doctor  WHERE patient.ohip='.$ohipint. 'AND treats.ohip='.$ohipint.'AND treats.docLicNum=doctor.docLicNum;';
   $result=mysqli_query($connection,$query);
   if (!$result) {
          die("Database query failed.");
   }
   if (mysqli_num_rows($result)==0) {
          die("Patient Does Not Exist");
   }
    while ($row=mysqli_fetch_assoc($result)) {
        
        echo "<li>";
        echo "<b>Patient Name: </b>" . $row["p_fname"] . " " . $row["p_lname"] ."</li>";
        echo "<li>";
        echo "<b>Ohip Number: </b>" . " " . $row["p_OHIP"] . "</li>";
        echo "<li>";
        echo "<b>Doctor Name: </b>" . " " .  $row["d_fname"] . " ". $row["d_lname"]." "."</li> ";
        
     }
} catch (Exception $e) {
     echo 'Patient does not exist.';
}
   mysqli_close($connection);
?>
</ul>
</body>
</html>