<!-- This page displays the information of the doctor selected -->
<!DOCTYPE html>
<html>
<head>
	<title>Doctor's Info</title>
	<link rel="stylesheet" type="text/css" href="doctordb.css">
</head>
    
<body>
<?php
include 'connecttodb.php';//connect to the db 
?>
<h1>Doctor's Information:</h1>
<ul>
<?php
   $docLicNum= $_POST["doctors"];
   $query = ' SELECT * FROM doctor, hospital WHERE doctor.hosWorksAt=hospital.hosCode AND doctor.docLicNum="' . $docLicNum. '"'; //get's info of the doctor specified by the user
    $result=mysqli_query($connection,$query);// send query into the db
   // if there was no result there was an error
    if (!$result) {
         die("Database query failed.");
     }
    // display the doc info
    $row=mysqli_fetch_assoc($result);
        
        echo "<li>";
        echo "<b>Name: </b>" . $row["firstName"] . " " . $row["lastName"] ."</li>"; // name
        echo "<li>";
        echo "<b>License Number: </b>" . " " . $row["docLicNum"] . "</li>";// license num
        echo "<li>";
        echo "<b>Speciality: </b>" . " " .  $row["speciality"] . "</li> ";//speciality
        echo "<li>";
        echo  "<b>License Date: </b>" . " " .  $row[licenseDate] . "</li>";// lic date
        echo "<li>";
        echo  "<b>Hospital: </b>" . " " .  $row["hosWorksAt"] . "</li>";   // hospital the work at

     mysqli_free_result($result);// clear memory that result took up
?>
</ul>
<?php
   mysqli_close($connection);// close the connection to the db
?>
</body>
</html>