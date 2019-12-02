<!-- This page gets the information of the doctor's who were licensed before the input date -->
<!DOCTYPE html>
<html>
<head>
	<title>Doctor's License Page</title>
	<link rel="stylesheet" type="text/css" href="doctordb.css">
</head>
<body>
<?php
   include 'connecttodb.php';// connect to the db
?>
    <ul>
<?php

        $licDate= $_POST["licdate"]; // get the license date the user entered 

echo"<h1>Doctor's Licensed Before ".$licDate."</h1>";
$valid = validateDate($licDate); // make sure thr date is valid 
        
   if($valid) // if valid then proceed to outputting the info
   {
   
   $query= 'SELECT * FROM doctor WHERE licenseDate < "' .$licDate. '"';// get the query 
   $result=mysqli_query($connection,$query);// send the query into the db
   // if there is no result it means the query failed
    if (!$result) {

          die("Query failed.");
   }
    while ($row=mysqli_fetch_assoc($result)) { // output all the doctors' first name, last name, license num, and speciality and iicense date 
        echo '<li>';
        echo "<b>Name: </b>" . $row["firstName"] . " " . $row["lastName"] ." " .  "<b>License No.: </b>" . " " . $row["docLicNum"] . " ". "<b>License Date: </b>" . " " . $row["licenseDate"] . " " . "<b>Speciality: </b>" . " " . $row["speciality"] . "</li>"; 
     }
   mysqli_close($connection); // clsoe the connection to the db

   }
else // date was not the right format
{
echo "Invalid Date Entry";
}    
        // fucntion checks if the date format is correct
    function validateDate($date, $format='Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    
    return $d && $d->format($format) == $date;
}
?>
</ul>
</body>
</html>
